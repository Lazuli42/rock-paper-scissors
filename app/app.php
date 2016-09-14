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
    //======================Two Players:================================
    $app->get("/two_players", function() use($app) {
        $whose_turn = "player 1";
        return $app["twig"]->render("two_players.html.twig", array("whose_turn" => $whose_turn));
    });

    $app->get("/p1_selected", function() use($app) {
        $whose_turn = "player 2";
        $rps = new RPS($_GET["p1Selection"], "");
        $rps->save();
        return $app["twig"]->render("two_players.html.twig", array("whose_turn" => $whose_turn));
    });

    $app->get("/p2_selected", function() use($app) {
        $whose_turn = "finished";
        $rps = RPS::getSelections();
        $rps->setPlayer2($_GET["p2Selection"]);
        $rps->playGame();
        return $app["twig"]->render("two_players.html.twig", array("rps" => $rps, "whose_turn" => $whose_turn));
    });
//======================One Player:================================
    $app->get("/one_player", function() use($app) {
        return $app["twig"]->render("one_player.html.twig");
    });

    $app->get("/one_player_selection", function() use($app) {
        $whose_turn = "player 2";
        $rps = new RPS($_GET["p1Selection"], "");
        $rps->setRandomPlayer2();
        $rps->playGame();
        return $app["twig"]->render("one_player.html.twig", array("rps" => $rps, "whose_turn" => $whose_turn));
    });


    return $app;
 ?>
