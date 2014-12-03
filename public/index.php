<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;
new \Silex\Provider\TwigServiceProvider();
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/', function () use ($app){

    return $app['twig']->render('layout.twig', array());
});

$app->run();
?>
