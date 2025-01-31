<?php
namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class MicroServiceDgtt
{
    private HttpClientInterface $httpClient;
    private  $apiUrl;
    private  $apiKey;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->apiUrl = getenv('DGTT_API_URL');
        $this->apiKey = getenv('DGTT_API_KEY');
    }

    public function isShortCodeValid(string $shortCode): bool
    {
        try {
            // Effectuer une requête POST vers l'API externe
            $response = $this->httpClient->request('POST', $_ENV['DGTT_API_URL'], [
                'headers' => [
                    'Authorization' =>$_ENV['DGTT_API_KEY'], // Ajout de 'Bearer' si nécessaire
                    'Content-Type' => 'application/json', // Définit le type de contenu attendu par l'API
                ],
                'json' => [ // Utilisation de 'json' au lieu de 'body' pour envoyer des données JSON
                    'short_code' => $shortCode,
                ],
            ]);
            // Vérifier la réponse
            $data = $response->toArray();
            // dd($data);
            return isset($data['SUCCESS']) && $data['SUCCESS'] === true;
        } catch (\Exception $e) {
            //Gérer les erreurs de requête
            return false;
        }
    }
}












