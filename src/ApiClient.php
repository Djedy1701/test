<?php  


class ApiClient {  
    private $apiEndpoint;  
    private $bearerToken;  
    private $timeout = 10;

    public function __construct(string $apiEndpoint, string $bearerToken) {  
        $this->apiEndpoint = rtrim($apiEndpoint, '/');  
        $this->bearerToken = $bearerToken;  
    }  


    public function getTests(): array {  
        return $this->sendRequest('GET', '/tests');  
    }  


    public function startSession(string $testId, string $externalUid): array {  
        $data = [
			'test' => $testId,
			'externalUid' => $externalUid,
		];

		return $this->sendRequest('POST', "/sessions", $data);  
    }  


    public function getActiveSessions(): array {  
        return $this->sendRequest('GET', '/sessions?sort=-percent');  
    }  


    public function getResults(): array {  
        return $this->sendRequest('GET', '/results?sort=respondent');  
    }  


    private function sendRequest(string $method, string $path, array $data = []): array
    {
        $url = $this->apiEndpoint . $path;
        $ch = curl_init();
        
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->bearerToken,
                'Accept: application/json',
                'Content-Type: application/json'
            ],
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_SSL_VERIFYPEER => true, 
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_CAINFO => __DIR__ . '/cacert.pem', 
            CURLOPT_FOLLOWLOCATION => 1
        ]);


        if ($method === 'POST') {  
            curl_setopt($ch, CURLOPT_POST, true);  
            if (!empty($data)) {  
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
            }  
        } elseif ($method !== 'GET') {  
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);  
        }  

        $response = curl_exec($ch);  
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        $error = curl_error($ch);  
        curl_close($ch);  


        if ($error) {  
            throw new RuntimeException("CURL error: " . $error);  
        }  

        $decodedResponse = json_decode($response, true) ?? [];  

        if ($httpCode >= 400) {  
            $errorMsg = $decodedResponse['error'] ?? 'Unknown API error';  
            throw new RuntimeException("API error {$httpCode}: {$errorMsg}");  
        }  

        return $decodedResponse;  
    } 
}  
?>