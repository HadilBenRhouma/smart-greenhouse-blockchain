<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auction1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer le measurementId
    $query = "SELECT id FROM measurements";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Vérifier si des résultats sont retournés
    if ($stmt->rowCount() > 0) {
        // Récupérer la valeur de measurementId
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $measurementId = $row['id'];

        // Requête SQL pour récupérer les données de la table "sensordata"
        $sql = "SELECT humidity_air, humidity_soil, temperature FROM measurements WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $measurementId);
        $stmt->execute();

        // Vérifier si des résultats sont retournés
        if ($stmt->rowCount() > 0) {
            // Récupérer les données de la première ligne du résultat
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $humidityAir = $row["humidity_air"];
            $humiditySoil = $row["humidity_soil"];
            $temperature = $row["temperature"];

            // Fermer la connexion à la base de données
            $conn = null;

            // Construire les données à inclure dans la requête
            $data = array(
                'humidityAir' => $humidityAir,
                'humiditySoil' => $humiditySoil,
                'temperature' => $temperature
            );

            $url = 'http://localhost:3000/measurements/' . $measurementId;

            $options = array(
                'http' => array(
                    'header' => "Content-type: application/json",
                    'method' => 'POST',
                    'content' => json_encode($data)
                )
            );

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            if ($result === FALSE) {
                // Gestion des erreurs
                die('Erreur lors de l\'envoi de la requête.');
            }

            $response = json_decode($result, true);
            // Gestion de la réponse du microservice JavaScript

        } else {
            echo "Aucune donnée trouvée dans la table measurements";
        }
    } else {
        echo "Aucun enregistrement trouvé dans la table measurements";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
