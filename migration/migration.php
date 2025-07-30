<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/config/env.php';

$dbname = DB_NAME;
$dbuser = DB_USER;
$dbpassword = DB_PASSWORD;
$webroute = WEB_ROUTE;
$dbport = DB_PORT;

try {
    // Connexion à la base postgres par défaut pour pouvoir supprimer/créer la base railway
    $pdo = new \PDO("pgsql:host=" . $webroute . ";port=" . $dbport . ";dbname=postgres", $dbuser, $dbpassword);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
    // Fermer toutes les connexions existantes à la base de données
    $sql = "SELECT pg_terminate_backend(pg_stat_activity.pid)
            FROM pg_stat_activity
            WHERE pg_stat_activity.datname = '$dbname'
            AND pid <> pg_backend_pid()";
    $pdo->exec($sql);
    
    // Maintenant on peut supprimer et recréer la base
    $pdo->exec("DROP DATABASE IF EXISTS $dbname");
    $pdo->exec("CREATE DATABASE $dbname");
    echo "Base de données '$dbname' créée.\n";
    
    // Connexion à la nouvelle base pour créer les tables
    $pdo = new \PDO("pgsql:host=" . $webroute . ";port=" . $dbport . ";dbname=" . $dbname, $dbuser, $dbpassword);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
    //requete sql
    $sql = <<<SQL
    --Enum
    DO \$\$
    BEGIN
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname='TypeCompte')THEN
    CREATE TYPE TypeCompte AS ENUM('principal','secondaire');
    END IF;
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname='TypeTransaction')THEN
    CREATE TYPE TypeTransaction AS ENUM('paiement','depot','retrait');
    END IF;
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname='StatutTransaction')THEN
    CREATE TYPE StatutTransaction AS ENUM('Attente','Annuler','Reussi', 'Echec');
    END IF;

    END
    \$\$;
    --table
    CREATE TABLE IF NOT EXISTS TypeUser(
     id SERIAL PRIMARY KEY,
     libelle VARCHAR(30)
  
    );


  CREATE TABLE IF NOT EXISTS users(
  id SERIAL PRIMARY KEY,
  nom VARCHAR(250),
  prenom VARCHAR(250),
  numeroTelephone  VARCHAR(30) NOT NULL,
  login VARCHAR(250) NOT NULL,
  password  VARCHAR(250) NOT NULL,
  numeroCarteIdentite  VARCHAR(50) NOT NULL,
  photorecto  VARCHAR(40) NOT NULL,
  photoverso  VARCHAR(40) NOT NULL,
  idTypeUser INTEGER,
  Foreign Key (idTypeUser) REFERENCES TypeUser(id)
);


CREATE TABLE IF NOT EXISTS Compte(
  id SERIAL PRIMARY KEY ,
  dateCreation VARCHAR NOT NULL,
  solde FLOAT NULL,
  numero INTEGER NOT NULL,
  typeCompte TypeCompte NOT NULL ,
  idUser INTEGER,
  Foreign Key (idUser) REFERENCES users(id)
);


CREATE TABLE IF NOT EXISTS Transaction(
  id SERIAL PRIMARY KEY,
  montant FLOAT NOT NULL,
  dateTransaction VARCHAR ,
  typeTransaction TypeTransaction NOT NULL ,
  statutTransaction StatutTransaction NOT NULL,
  idCompte INTEGER ,
  Foreign Key (idCompte) REFERENCES Compte(id)
);

SQL;

    // Exécution
    $pdo->exec($sql);
    echo "Tables et types créés avec succès.\n";

} catch (PDOException $e) {
    echo " Erreur : " . $e->getMessage() . "\n";
    exit(1);
}
