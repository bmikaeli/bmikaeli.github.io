<?php
require_once __DIR__.'/../vendor/autoload.php';


$app = new Silex\Application();
$app['debug'] = true;

new \Silex\Provider\TwigServiceProvider();

$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$contact = $app['controllers_factory'];
$contact->get('/', function () use ($app){
    return $app['twig']->render('contact.twig', array(
        'tab' => 'contact',
    ));
});

$skills = $app['controllers_factory'];
$skills->get('/', function () use ($app){
    return $app['twig']->render('skills.twig', array(
        'tab' => 'skills',
    ));
});

$app->get('/', function () use ($app){
    return $app['twig']->render('index.twig', array(
        'tab' => 'index',
    ));
});

$app->mount('/contact', $contact);
$app->mount('/skills', $skills);
$app->run();
?>
