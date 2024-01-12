import contract from "./contract.js";
import express from 'express';
import cors from 'cors';  // Importez le module cors

const app = express();
const port = 3000;

// Utilisez le middleware cors
app.use(cors());

app.use(express.json());

app.post('/add', (req, res) => {
    contract.ajouterDonneesCapteurs(req.body.temperature, req.body.humiditeAir, req.body.humiditeSol).then((result) => res.send("success"));
});

app.get('/', (req, res) => {
    contract.dernieresDonneesCapteurs().then((result) =>
        res.send({
            temperature: result.temperature.toNumber(),
            humiditeAir: result.humiditeAir.toNumber(),
            humiditeSol: result.humiditeSol.toNumber()
        })
    );
});

app.listen(port, () => {
    console.log(`listening on port ${port}`);
});
