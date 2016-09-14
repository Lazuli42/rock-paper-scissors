<?php
    require_once "src/RPS.php";

    class test_RPS extends PHPUnit_Framework_TestCase
    {

        function test_rock_scissors()
        {
            //Arrange
          $player1 = "rock";
          $player2 = "scissors";
          $test_RPS = new RPS($player1, $player2);

          //Act
          $result = $test_RPS->playGame();

          //Assert
          $this->assertEquals("Player 1", $result);
        }

        function test_paper_rock()
        {
            //Arrange
          $player1 = "rock";
          $player2 = "paper";
          $test_RPS = new RPS($player1, $player2);

          //Act
          $result = $test_RPS->playGame();

          //Assert
          $this->assertEquals("Player 2", $result);
        }

        function test_scissors_paper()
        {
            //Arrange
          $player1 = "scissors";
          $player2 = "paper";
          $test_RPS = new RPS($player1, $player2);

          //Act
          $result = $test_RPS->playGame();

          //Assert
          $this->assertEquals("Player 1", $result);
        }

        function test_draw()
        {
            //Arrange
          $player1 = "rock";
          $player2 = "rock";
          $test_RPS = new RPS($player1, $player2);

          //Act
          $result = $test_RPS->playGame();

          //Assert
          $this->assertEquals("Draw!", $result);
        }
    }
 ?>
