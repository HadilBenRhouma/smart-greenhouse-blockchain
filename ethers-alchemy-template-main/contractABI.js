const CONTRACT={
    address:"0x60846BbbA7f210b101cF2C1FB11EE3718d6201eA",//put address after deployment
    ABI:[
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_temperature",
                    "type": "uint256"
                },
                {
                    "internalType": "uint256",
                    "name": "_humiditeAir",
                    "type": "uint256"
                },
                {
                    "internalType": "uint256",
                    "name": "_humiditeSol",
                    "type": "uint256"
                }
            ],
            "name": "ajouterDonneesCapteurs",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "name": "capteursData",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "temperature",
                    "type": "uint256"
                },
                {
                    "internalType": "uint256",
                    "name": "humiditeAir",
                    "type": "uint256"
                },
                {
                    "internalType": "uint256",
                    "name": "humiditeSol",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "dernieresDonneesCapteurs",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "temperature",
                    "type": "uint256"
                },
                {
                    "internalType": "uint256",
                    "name": "humiditeAir",
                    "type": "uint256"
                },
                {
                    "internalType": "uint256",
                    "name": "humiditeSol",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        }
    ]
}
export default CONTRACT