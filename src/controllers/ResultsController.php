<?php

class ResultsController
{
    public function index()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $apiClient = new ApiClient($config['apiEndpoint'], $config['bearerToken']);
        $results = $apiClient->getResults();

        include __DIR__ . '\..\views\ResultList.php';
    }
}
?>