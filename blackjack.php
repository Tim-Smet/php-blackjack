<?php

class Blackjack {
    //score will keep track of the score at all times.
    public $score = 0;

    public function firstHand(){
        $card1 = mt_rand(1, 11);
        $card2 = mt_rand(1, 11);
        $this->score = $card1 + $card2;
        return [$card1, $card2];
    }
    //hit function will add a randomly generated card between 1-11
    public function hit($currentScore){
        $randomCard = mt_rand(1, 11);
        $this->score = $randomCard + $currentScore;
        return $randomCard;
    }

    //End player turn and start dealer's turn
    public function stand(){
        echo 'It is the dealers turn <br>';
     }

     //Give up (Dealer wins)
     public function surrender(){
        echo 'You gave up, LOSER! Dealer has won!';
     }
}

