<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RPS.php";

    session_start();
    if (empty($_SESSION["selections"])) {
      $_SESSION["selections"] = "";
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"));

    $app->get("/", function() use($app) {
        return $app["twig"]->render("game.html.twig");
    });

    $app->get("/two_players", function() use($app) {
        return $app["twig"]->render("two_players.html.twig");
    });

    $app->get("/p1_select", function() use($app) {
        $rps = new RPS($_GET["p1Selection"], "");
        $rps->save();
        return $app["twig"]->render("two_players.html.twig");
    });

    $app->get("/p2_select", function() use($app) {
        $rps = RPS::getSelections();
        $rps->setPlayer2($_GET["p2Selection"]);
        $rps->playGame();
        return $app["twig"]->render("two_players.html.twig", array("rps" => $rps));
    });

    return $app;
 ?>
