<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/env.php';


try {
    $dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT;
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Insertion de fausses données...\n";

    // typeuser
    $stmt = $pdo->prepare("
    INSERT INTO TypeUser (libelle) VALUES
    (?);
    ");
    $stmt->execute(['client']);
    //users
    $stmt = $pdo->prepare(" 
    INSERT INTO users (nom, prenom, numeroTelephone, login, password, numeroCarteIdentite, photorecto, photoverso, idTypeUser) VALUES
    (?, ?, ?, ?,?, ?, ?, ?, ?)
    " );
    $stmt->execute(['faye', 'ndeye', '777571251', 'ndeye', '123', '2031009384432', 'recto.jpg', 'verso.jpg', 1]);
    $stmt->execute(['faye', 'fatou', '770002211', 'fatou', '1234', '2031009385452', 'recto2.jpg', 'verso2.jpg', 1]);

//compte
$stmt = $pdo->prepare("
    INSERT INTO Compte (dateCreation, solde, numero, typeCompte, idUser) VALUES
    (?,?,?,?,?)

");
$stmt->execute(['2025-05-01', 150000.00, 1001, 'principal', 1]);

$stmt->execute(['2025-06-02', 150000.00, 1002, 'secondaire', 1]);

//transaction
$stmt = $pdo->prepare("
      INSERT INTO Transaction (montant, dateTransaction, typeTransaction, statutTransaction,idCompte) VALUES
      (?,?,?,?,?)

");
$stmt->execute([10000.00, '2025-07-04', 'depot', 'Echec',1]);
$stmt->execute([2000.00, '2025-07-06', 'retrait','Reussi', 1]);

echo "Données insérées avec succès.\n";

} catch (PDOException $e) {
    echo "Erreur lors du seeding : " . $e->getMessage() . "\n";
    exit(1);
}

