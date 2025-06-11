<?php
class TestsController
{
    public function index()
    {
        $config = include __DIR__ . '/../../config/config.php';
        try {
            $apiClient = new ApiClient(
                $config['apiEndpoint'],
                $config['bearerToken']
            );
            $tests = $apiClient->getTests();
            include __DIR__ . '/../views/TestList.php';
        } catch (RuntimeException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}