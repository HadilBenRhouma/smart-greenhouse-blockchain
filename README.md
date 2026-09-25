# Smart Greenhouse on Blockchain 🌱⛓️

School project (ENIS, 2023–2024): greenhouse sensor readings — air humidity, soil humidity and temperature — are stored in a smart contract so they can't be altered after the fact, and exposed through a farm marketplace web app.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![Solidity](https://img.shields.io/badge/Solidity-363636?style=flat-square&logo=solidity&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![ethers.js](https://img.shields.io/badge/ethers.js-2535a0?style=flat-square&logo=ethereum&logoColor=white)
![Web3.js](https://img.shields.io/badge/Web3.js-F16822?style=flat-square&logo=web3dotjs&logoColor=white)

## How it works

```
 Sensors ──► MySQL (measurements) ──► contract.php / ethers.js ──► Smart contract (Sepolia testnet)
                                                                      │
                     Farm marketplace (PHP) ◄──── getData(id) ────────┘
```

1. Sensor measurements (air humidity, soil humidity, temperature) are saved in the `measurements` table.
2. `contract.php` and the scripts in `ethers-alchemy-template-main/` read them and push them to the contract.
3. The contracts (`contrat.sol` → `SerreIntelligente`, `ContratIntelligent.sol` → `DataStorage`) keep every reading on-chain, so the history is tamper-proof.
4. The web app shows the data to farmers and buyers.

## Project structure

| Path | Content |
|---|---|
| `contrat.sol`, `ContratIntelligent.sol` | Solidity smart contracts |
| `SensorData.json` | Compiled contract ABI |
| `contract.php`, `ethers-alchemy-template-main/` | Bridge between the database and the blockchain |
| `admin/`, `farmer/`, `customer/` | Marketplace web app, one folder per role |
| `auction1.sql` | Database schema and sample data |
| `docs/` | Project report (`Rapport.pdf`) and presentation |

## Run locally

Requirements: PHP 8 + MySQL (XAMPP/WAMP works), Node.js.

```bash
# 1. Database
mysql -u root -e "CREATE DATABASE auction1"
mysql -u root auction1 < auction1.sql

# 2. Secrets
cp .env.example .env        # then fill in the values

# 3. Blockchain scripts
npm install
cd ethers-alchemy-template-main && npm install
```

Then serve the folder with Apache (or `php -S localhost:8000`) and open `index.php`.

## Credits

The marketplace part (auctions, farmer / buyer / admin dashboards) is built on top of the open-source
**Farm-Auction** project made for Smart India Hackathon 2020. The blockchain layer, the sensor data flow
and the smart contracts were added for this school project.

## Author

**Hadil Ben Rhouma** — [Portfolio](https://portfilio-gules-three.vercel.app/?utm_source=github) · [LinkedIn](https://www.linkedin.com/in/hadil-benrhouma/)
