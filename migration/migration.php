<?php
require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../app/config/env.php';

$dbname= DB_NAME;
$dbuser=DB_USER;
$dbpassword=DB_PASSWORD;
$webroute=WEB_ROUTE;
try{ 
    //connexion server
    $pdo= new \PDO("pgsql:host=" . WEB_ROUTE . ";port=5432;dbname=postgres",$dbuser,$dbpassword);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    //connexion base de donnees
    $pdo->exec("DROP DATABASE IF EXISTS $dbname");
    $pdo->exec("CREATE DATABASE $dbname");
    echo"Base de données '$dbname' créee.\n";
    //reconnexion
    $pdo= new \PDO("pgsql:host=" . WEB_ROUTE . ";port=5432;dbname=postgres",$dbuser,$dbpassword);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
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
    INSERT INTO TypeUser VALUES
    (1,'client');





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
INSERT INTO users (nom, prenom, numeroTelephone, login, password, numeroCarteIdentite, photorecto, photoverso, idTypeUser) VALUES
('faye', 'ndeye', '777571251', 'ndeye', '123', '2031009384432', 'recto.jpg', 'verso.jpg', 1),
('faye', 'fatou', '770002211', 'fatou', '1234', '2031009385452', 'recto2.jpg', 'verso2.jpg', 1),
('faye', 'yacine', '772225533', 'yacine', '12345', '2031009384444', 'recto3.jpg', 'verso3.jpg', 1);


CREATE TABLE IF NOT EXISTS Compte(
  id SERIAL PRIMARY KEY ,
  dateCreation VARCHAR NOT NULL,
  solde FLOAT NULL,
  numero INTEGER NOT NULL,
  typeCompte TypeCompte NOT NULL ,
  idUser INTEGER,
  Foreign Key (idUser) REFERENCES users(id)
);
INSERT INTO Compte (dateCreation, solde, numero, typeCompte, idUser) VALUES
('2025-07-01', 150000.00, 1001, 'principal', 1),
('2025-07-02', 150000.00, 1002, 'secondaire', 1),
('2025-07-03', 800000.00, 1003, 'principal', 1);


CREATE TABLE IF NOT EXISTS Transaction(
  id SERIAL PRIMARY KEY,
  montant FLOAT NOT NULL,
  dateTransaction VARCHAR ,
  typeTransaction TypeTransaction NOT NULL ,
  statutTransaction StatutTransaction NOT NULL,
  idCompte INTEGER ,
  Foreign Key (idCompte) REFERENCES Compte(id)
);
INSERT INTO Transaction (montant, dateTransaction, typeTransaction, statutTransaction,idCompte) VALUES
(10000.00, '2025-07-04', 'depot', 'Echec',1),
(5000.00, '2025-07-05', 'paiement','Annuler', 1),
(2000.00, '2025-07-06', 'retrait','Reussi', 1);

SQL;

    // Exécution
    $pdo->exec($sql);
    echo "Tables et types créés avec succès.\n";

} catch (PDOException $e) {
    echo " Erreur : " . $e->getMessage() . "\n";
    exit(1);
}
