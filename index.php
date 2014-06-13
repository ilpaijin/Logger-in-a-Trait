<?php

require_once "vendor/autoload.php";

define("LOG", true);

$app = new App\App();


/**
 * Case echo not logged
 */
$app->DoSomethingNotLogged();

/**
 * Case echo logged
 */
try{
    $app->LoggerLogDoSomething();
} catch( Exception $e)
{
    echo $e->getMessage();
}


/**
 * Case Exception logged
 */
try{
    $app->LoggerLogDoSomethingThrowsException();
} catch( Exception $e)
{
    echo $e->getMessage();
}

/**
 * Case return logged
 */
try{    
    $app->LoggerLogDoSomethingElseWithArgs("Hi I'm val1", "Oh ciao! I'm val2.");
} catch( Exception $e)
{
    echo $e->getMessage();
}

/**
 * Case 2nd class not logged
 */
$webapp = new App\WebApp();

$webapp->DoSomething();