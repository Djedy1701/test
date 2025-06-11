<?php

class SessionsController
{
    public function start($testId, $externalUid)
    {
        $config = include __DIR__ . '/../../config/config.php';
        $apiClient = new ApiClient($config['apiEndpoint'], $config['bearerToken']);
        $session = $apiClient->startSession($testId, $externalUid);
        $testingUrl = $session['testingUrl'];
        header("Location: $testingUrl");
    }

    public function active()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $apiClient = new ApiClient($config['apiEndpoint'], $config['bearerToken']);
        $sessions = $apiClient->getActiveSessions();

        include __DIR__ . '\..\views\SessionList.php';
    }
}
?>