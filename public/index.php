<?php
require_once __DIR__.'/../vendor/autoload.php';


$app = new Silex\Application();
$app['debug'] = true;

new \Silex\Provider\TwigServiceProvider();

$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\SwiftmailerServiceProvider());


$contact = $app['controllers_factory'];
$contact->get('/', function () use ($app){
    return $app['twig']->render('contact.twig', array(
        'tab' => 'contact',
    ));
});

$contact->post('/', function (\Symfony\Component\HttpFoundation\Request $request) use ($app){
    $prenom = $request->get('prenom');
    $message = $request->get('message');
    $email = $request->get('email');
    $sujet = $request->get('sujet');
    $nom = $request->get('nom');

    $transport = Swift_SmtpTransport::newInstance(
        //smtp configuration here
    );

    $mailer = Swift_Mailer::newInstance($transport);

    $mail = \Swift_Message::newInstance()
        ->setSubject($sujet)
        ->setFrom(array('noreply@yoursite.com' => $prenom . " ". $nom))
        ->setTo(array('baptiste.mikaelian@gmail.com'))
        ->setBody($message);

    $result = $mailer->send($mail, $echec);

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
