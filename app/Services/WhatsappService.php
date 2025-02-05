<?php

namespace App\Services;

use GuzzleHttp\Client;

class WhatsappService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('WABLAS_API_KEY'); // API Key Wablas dari file .env
    }

    /**
     * Mengirim pesan WhatsApp melalui API Wablas.
     *
     * @param string $to Nomor tujuan (misal: 628123456789)
     * @param string $message Pesan yang ingin dikirim
     * @return array Response dari API Wablas
     */
    public function sendMessage($to, $message)
    {
        $url = 'https://wablas.com/api/send-message'; // URL API Wablas untuk mengirim pesan

        $response = $this->client->post($url, [
            'headers' => [
                'Authorization' => $this->apiKey,
            ],
            'form_params' => [
                'phone' => $to, // Nomor tujuan dengan format internasional
                'message' => $message,
                'priority' => false
            ],
        ]);

        return json_decode($response->getBody(), true); // Return response dari API
    }
}