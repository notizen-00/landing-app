import axios from 'axios';
import crypto from 'crypto';

const secretKey = 'dipta-ganteng'; // Ganti dengan kunci rahasia yang sama antara pengirim dan penerima

const hmacService = {
  async getWithHMAC(url) {
    // Buat signature kosong untuk metode GET
    const signature = crypto.createHmac('sha256', secretKey)
                            .update('')
                            .digest('hex');

    // Konfigurasi header dengan tanda tangan HMAC
    const headers = {
      'X-Signature': signature
    };

    try {
      const response = await axios.get(url, { headers });
      return response.data;
    } catch (error) {
      throw error;
    }
  },

  async postWithHMAC(url, data) {
    // Menghitung tanda tangan HMAC
    const signature = crypto.createHmac('sha256', secretKey)
                            .update(JSON.stringify(data))
                            .digest('hex');

    // Konfigurasi header dengan tanda tangan HMAC
    const headers = {
      'X-Signature': signature
    };

    try {
      const response = await axios.post(url, data, { headers });
      return response.data;
    } catch (error) {
      throw error;
    }
  }
};

export default hmacService;
