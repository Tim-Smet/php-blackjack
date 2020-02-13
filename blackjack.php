<?php

class Blackjack {
    //score will keep track of the score at all times.
    public $score = 0;

    //hit function will add a randomly generated card between 1-11
    public function hit(){
        return mt_rand(1, 11);
    }

    //End player turn and start dealer's turn
    public function stand(){


     }

     //Give up (Dealer wins)
     public function surrender(){

     }
}

