<?php
    class RPS
    {
        public $player1;
        public $player2;
        public $winner;

        function __construct($player1, $player2)
        {
            $this->player1 = $player1;
            $this->player2 = $player2;
        }

        function getWinner()
        {
            return $this->winner;
        }

        function playGame()
        {
            $player1 = $this->player1;
            $player2 = $this->player2;

//=========================Player1===============================
            if (($player1 === "rock") && ($player2 === "scissors"))
            {
                return "Player 1";
            }
            if (($player1 === "paper") && ($player2 === "rock"))
            {
                return "Player 1";
            }
            if (($player1 === "scissors") && ($player2 === "paper"))
            {
                return "Player 1";
            }
//=========================Player2===============================
            if (($player2 === "rock") && ($player1 === "scissors"))
            {
                return "Player 2";
            }
            if (($player2 === "paper") && ($player1 === "rock"))
            {
                return "Player 2";
            }
            if (($player2 === "scissors") && ($player1 === "paper"))
            {
                return "Player 2";
            }
//===========================Draw===================================
            if ($player1 === $player2)
            {
                return "Draw!";
            }
        }

    }
 ?>
