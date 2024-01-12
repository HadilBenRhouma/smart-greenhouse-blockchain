pragma solidity ^0.8.0;

interface IMysqlDatabase {
    function selectUint(string memory sql, uint id) external view returns (uint, uint);
    function selectString(string memory sql, uint id) external view returns (uint, string memory);
    function execute(string memory sql, uint timestamp, uint temperature, uint humidityAir, uint humiditySoil) external;
}


contract DataStorage is IMysqlDatabase {
    
    struct SensorData {
        uint humidityAir;
        uint humiditySoil;
        uint temperature;
    }
    
    mapping (uint => SensorData) private dataMap;
    
    function storeData(uint id) public {
        // Récupère les données de la base de données existante
        uint humidityAir = getHumidityAir(id);
        uint humiditySoil = getHumiditySoil(id);
        uint temperature = getTemperature(id);
        
        // Stocke les données sur la blockchain
        SensorData memory sensorData = SensorData(humidityAir, humiditySoil, temperature);
        dataMap[id] = sensorData;
    }
    
    function getData(uint id) public view returns (uint, uint, uint) {
        SensorData memory sensorData = dataMap[id];
        return (sensorData.humidityAir, sensorData.humiditySoil, sensorData.temperature);
    }
    
    // Fonctions pour récupérer les données de la base de données existante
    
   function getHumidityAir(uint id) private view returns (uint) {
    // Connexion à la base de données MySQL
    string memory host = "localhost";
    string memory username = "root";
    string memory password = "";
    string memory database = "auction1";
    string memory port = "3306";
    
    string memory connectionString = string(abi.encodePacked(
        username, ":", password, "@tcp(", host, ":", port, ")/", database));
    bytes memory connStringBytes = bytes(connectionString);
    
    bytes memory query = bytes(string(abi.encodePacked(
        "SELECT humidityAir FROM SensorData WHERE id = ", uintToString(id))));
        
    // Exécute la requête sur la base de données
    uint humidityAir;
    bytes32 result;
    bool success;
    assembly {
        let conn := open("mysql", connStringBytes)
        let queryLen := mload(query)
        let queryPtr := add(query, 32)
        success := call(5000, 1, 0, queryPtr, queryLen, result, 32)
        humidityAir := mload(result)
        close(conn)
    }
    
    require(success, "Error: Failed to execute MySQL query.");
    
    return humidityAir;
}

// Fonction utilitaire pour convertir un entier en chaîne de caractères
function uintToString(uint v) private pure returns (string memory) {
    if (v == 0) {
        return "0";
    }
    uint len = 0;
    uint temp = v;
    while (temp > 0) {
        len++;
        temp /= 10;
    }
    bytes memory result = new bytes(len);
    uint index = len - 1;
    while (v > 0) {
        result[index--] = byte(uint8(48 + v % 10));
        v /= 10;
    }
    return string(result);
}

    
   function getHumiditySoil(uint id) private view returns (uint) {
    // Connexion à la base de données MySQL
    string memory host = "localhost";
    string memory username = "root";
    string memory password = "password";
    string memory database = "auction1";
    string memory port = "3306";
    
    string memory connectionString = string(abi.encodePacked(
        username, ":", password, "@tcp(", host, ":", port, ")/", database));
    
    // Initialise la connexion à la base de données
    bytes32 result;
    bool success;
    assembly {
        let query := "SELECT humidity_soil FROM SensorData WHERE id = ?"
        let queryLen := mload(query)
        let queryPtr := add(query, 32)
        let connStringLen := mload(connectionString)
        let connStringPtr := add(connectionString, 32)
        let stmt := 0
        
        // Ouvre la connexion à la base de données
        let conn := open("mysql", connStringPtr, connStringLen)
        // Prépare la requête
        success := prepare(stmt, conn, queryPtr, queryLen) > 0
        // Exécute la requête avec le paramètre ?
        success := success && execute(stmt, 1, id) > 0
        // Récupère le résultat de la requête
        success := success && fetch(stmt, 0, result, 32) > 0
        // Ferme la connexion à la base de données
        close(conn)
    }
    
    require(success, "Error: Failed to execute MySQL query.");
    
    uint humiditySoil = mload(result);
    
    return humiditySoil;
}

    
    function getTemperature(uint id) private view returns (uint) {
    // Connexion à la base de données PostgreSQL
    string memory host = "localhost";
    string memory username = "root";
    string memory password = "";
    string memory database = "auction1";
    string memory port = "3306";
    
    string memory connectionString = string(abi.encodePacked(
        "postgresql://", username, ":", password, "@", host, ":", port, "/", database));
    
    // Initialise la connexion à la base de données
    bytes32 result;
    bool success;
    assembly {
        let query := "SELECT temperature FROM SensorData WHERE id = $1"
        let queryLen := mload(query)
        let queryPtr := add(query, 32)
        let connStringLen := mload(connectionString)
        let connStringPtr := add(connectionString, 32)
        let stmt := 0
        
        // Ouvre la connexion à la base de données
        let conn := open("pgx", connStringPtr, connStringLen)
        // Prépare la requête
        success := prepare(stmt, conn, queryPtr, queryLen) > 0
        // Exécute la requête avec le paramètre $1
        success := success && execute(stmt, 1, id) > 0
        // Récupère le résultat de la requête
        success := success && fetch(stmt, 0, result, 32) > 0
        // Ferme la connexion à la base de données
        close(conn)
    }
    
    require(success, "Error: Failed to execute PostgreSQL query.");
    
    uint temperature = mload(result);
    
    return temperature;
}
}
