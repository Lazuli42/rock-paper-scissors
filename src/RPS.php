<?php
    class RPS
    {
        private $player1;
        private $player2;
        private $winner;

        function __construct($player1, $player2)
        {
            $this->player1 = $player1;
            $this->player2 = $player2;
        }

        function setPlayer2($new_player2)
        {
            $this->player2 = (string) $new_player2;
        }

        function getWinner()
        {
            return $this->winner;
        }

        function getPlayer1()
        {
            return $this->player1;
        }

        function getPlayer2()
        {
            return $this->player2;
        }

        function save()
        {
         $_SESSION["selections"] = $this;
        }

        static function getSelections()
        {
          return $_SESSION["selections"];
        }

        function setRandomPlayer2()
        {
            $random_number = rand(1, 3);

            if ($random_number == 1)
            {
                $this->player2 = "Rock";
            }
            if ($random_number == 2)
            {
                $this->player2 = "Paper";
            }
            if ($random_number == 3)
            {
                $this->player2 = "Scissors";
            }
        }

        function playGame()
        {
            $player1 = $this->player1;
            $player2 = $this->player2;

//=========================Player1===============================
            if (($player1 === "Rock") && ($player2 === "Scissors"))
            {
                $this->winner = "Player 1";
                return "Player 1";
            }
            if (($player1 === "Paper") && ($player2 === "Rock"))
            {
                $this->winner = "Player 1";
                return "Player 1";
            }
            if (($player1 === "Scissors") && ($player2 === "Paper"))
            {
                $this->winner = "Player 1";
                return "Player 1";
            }
//=========================Player2===============================
            if (($player2 === "Rock") && ($player1 === "Scissors"))
            {
                $this->winner = "Player 2";
                return "Player 2";
            }
            if (($player2 === "Paper") && ($player1 === "Rock"))
            {
                $this->winner = "Player 2";
                return "Player 2";
            }
            if (($player2 === "Scissors") && ($player1 === "Paper"))
            {
                $this->winner = "Player 2";
                return "Player 2";
            }
//===========================Draw===================================
            if ($player1 === $player2)
            {
                $this->winner = "Draw!";
                return "Draw!";
            }
        }

    }
 ?>
