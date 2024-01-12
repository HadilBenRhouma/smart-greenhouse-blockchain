import { ethers } from 'ethers';

const API_KEY = process.env.ALCHEMY_API_KEY
const alchemyProvider = ethers.getDefaultProvider("sepolia",API_KEY);

export default alchemyProvider