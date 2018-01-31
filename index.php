<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31-Jan-18
 * Time: 19:52
 */

require_once 'vendor/autoload.php';

$gameplay = new \Emagia\Gameplay\Gameplay();

try {
    $gameplay->initialize();
    $gameplay->startBattle();
} catch (\Exception $exception) {
    logException($exception);
} catch (\Error $error) {
    logError($error);
}

function logException(\Exception $exception)
{
    echo "EXCEPTION THROWN!" . PHP_EOL;
    echo "File: " . $exception->getFile() . PHP_EOL;
    echo "Message: " . $exception->getMessage();
}

function logError(\Error $error)
{
    echo "ERROR OCCURED!" . PHP_EOL;
    echo "File: " . $error->getFile() . PHP_EOL;
    echo "Message: " . $error->getMessage();
}
