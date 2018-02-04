<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31-Jan-18
 * Time: 19:52
 */

require_once 'vendor/autoload.php';

$gameplay = new \Emagia\Gameplay\Gameplay();
$gameplay->initialize();
$gameplay->startBattle();
