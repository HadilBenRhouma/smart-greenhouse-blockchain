import contractABI from "./contractABI.js"
import { ethers } from 'ethers';
import provider from "./provider.js";

const PRIVATE_KEY = process.env.PRIVATE_KEY

const signer = new ethers.Wallet(PRIVATE_KEY, provider);

const contract = new ethers.Contract(contractABI.address, contractABI.ABI, signer);

export default contract