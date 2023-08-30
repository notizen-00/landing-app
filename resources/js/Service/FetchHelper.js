// apiHelper.js

import axios from 'axios';

const apiKey = '415cc2b6174d7b09feeb6315f0456495'; // Ganti dengan API Key yang sesuai

export const api_helper = axios.create({
  baseURL: window.location.origin,
  headers: {
    'X-API-Public-Key': apiKey,
  },
});


