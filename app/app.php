<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RPS.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"));

    $app->get("/", function() use($app) {
        return $app["twig"]->render("game.html.twig");
    });

    $app->get("/two_players", function() use($app) {
        return $app["twig"]->render("two_players.html.twig");
    });

    $app->get("/p1_select", function() use($app) {
        $rps = new RPS($_GET["p1Selection"]);
        
        return $app["twig"]->render("two_players.html.twig");
    });

    return $app;
 ?>
