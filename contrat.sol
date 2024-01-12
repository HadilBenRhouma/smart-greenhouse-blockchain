pragma solidity ^0.8.0;

contract SerreIntelligente {
    // Structure de données pour stocker les données des capteurs
    struct Capteurs {
        uint temperature;
        uint humiditeAir;
        uint humiditeSol;
    }
    
    // Tableau pour stocker les données des capteurs
    Capteurs[] public capteursData;
    
    // Fonction pour ajouter des données de capteurs à la structure de données
    function ajouterDonneesCapteurs(uint _temperature, uint _humiditeAir, uint _humiditeSol) public {
        capteursData.push(Capteurs(_temperature, _humiditeAir, _humiditeSol));
    }
    
    // Fonction pour récupérer les dernières données de capteurs stockées dans la structure de données
    function dernieresDonneesCapteurs() public view returns (uint temperature, uint humiditeAir, uint humiditeSol) {
        require(capteursData.length > 0, "Aucune donnée de capteurs trouvée");
        Capteurs storage dernieresDonnees = capteursData[capteursData.length - 1];
        temperature = dernieresDonnees.temperature;
        humiditeAir = dernieresDonnees.humiditeAir;
        humiditeSol = dernieresDonnees.humiditeSol;
    }
}
