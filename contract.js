const express = require('express');
const Web3 = require('web3');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(bodyParser.json());
app.use(cors());

const web3 = new Web3('http://localhost:7545'); // Assuming you're using a local Ethereum node

// Here, paste the ABI of your contract
const contractAbi = [
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_humidityAir",
				"type": "uint256"
                
			},
			{
				"internalType": "uint256",
				"name": "_humiditySoil",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_temperature",
				"type": "uint256"
			}
		],
		"name": "addMeasurement",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "measurementIndex",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "view",
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
		"name": "measurements",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "humidityAir",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "humiditySoil",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "temperature",
				"type": "uint256"
			}
		]}];

const contractAddress = '0xd7d3874d63e655Ac8EF5a29EAbAad681737da2Ad'; // Replace with your deployed contract address

const contract = new web3.eth.Contract(contractAbi, contractAddress);

app.post('/measurements', async (req, res) => {
    const { humidityAir, humiditySoil, temperature } = req.body;
    const accounts = await web3.eth.getAccounts();

    try {
        const receipt = await contract.methods.addMeasurement(humidityAir, humiditySoil, temperature)
            .send({ from: accounts[0] });
        res.json(receipt);
    } catch (error) {
        res.status(500).send(error.toString());
    }
});

app.get('/measurements/:id', async (req, res) => {
    const id = req.params.id;

    try {
        const measurement = await contract.methods.measurements(id).call();
        res.json(measurement);
    } catch (error) {
        res.status(500).send(error.toString());
    }
});

app.listen(3000, () => console.log('Listening on port 3000'));