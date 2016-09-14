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

        function save()
        {
         $_SESSION["selections"] = $this;
        }

        static function getSelections()
        {
          return $_SESSION["selections"];
        }

        function playGame()
        {
            $player1 = $this->player1;
            $player2 = $this->player2;

//=========================Player1===============================
            if (($player1 === "rock") && ($player2 === "scissors"))
            {
                $this->winner = "Player 1";
                return "Player 1";
            }
            if (($player1 === "paper") && ($player2 === "rock"))
            {
                $this->winner = "Player 1";
                return "Player 1";
            }
            if (($player1 === "scissors") && ($player2 === "paper"))
            {
                $this->winner = "Player 1";
                return "Player 1";
            }
//=========================Player2===============================
            if (($player2 === "rock") && ($player1 === "scissors"))
            {
                $this->winner = "Player 2";
                return "Player 2";
            }
            if (($player2 === "paper") && ($player1 === "rock"))
            {
                $this->winner = "Player 2";
                return "Player 2";
            }
            if (($player2 === "scissors") && ($player1 === "paper"))
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
