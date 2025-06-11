<?php

require_once __DIR__ . '/src/ApiClient.php';
require_once __DIR__ . '/src/controllers/TestsController.php';
require_once __DIR__ . '/src/controllers/SessionsController.php';
require_once __DIR__ . '/src/controllers/ResultsController.php';

$action = $_GET['action'] ?? 'tests';

switch ($action)
{
    case 'tests':
        (new TestsController())->index();
        break;
    case 'start_session':
         $testId = $_GET['test_id'] ?? null;
         $externalUid = date("YmdHis") . 0000;
         if ($testId)
         {
            (new SessionsController())->start($testId, $externalUid);
         }
         break;
    case 'sessions':
        (new SessionsController())->active();
        break;
    case 'results':
        (new ResultsController())->index();
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
        break;
}
?>