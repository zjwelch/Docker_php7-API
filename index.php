<?php
    //namespace ccf\foolingaround;

    //use \Psr\Http\Message\ServerRequestInterface as Request;
    //use \Psr\Http\Message\ResponseInterface as Response;

    //Uses Composer's autoloader. Alternatly a custom PSR-4 autoloader.
    require ("vendor/autoload.php");

    // Instantiates a Slim application, () for Default. Alternately pass an associative array of setting names and values into the application constructor.
    $config = ['settings' => [
        'addContentLengthHeader' => false,
    ]];
    $app = new Slim\App($config);

    // Here we define Slim application routes. Second argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete` is anonymous.
    $app->get('/', function ($request, $response, $args) {
        $response->write("Welcome to Slim3!");
        return $response;
    });
    $app->get('/hello[/{name}]', function ($request, $response, $args) {
        $response->write("Hello, " . $args['name']);
        return $response;
    })->setArgument('name', 'World!');

    // * This executes the Slim application and returns the HTTP response to the HTTP client.
    $app->run();