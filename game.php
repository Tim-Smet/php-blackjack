<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>

    <?php
    //Require the blackjack file for access to class
    require 'blackjack.php';
    //Start session for storage of variables
    session_start();

    //Create object player
    $player = new Blackjack();
    //Create object player
    $dealer = new Blackjack();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //if button on home page is pushed
        if (isset($_POST['start'])){
            //Players first two cards
            //Array of two cards is stored in firstHand.
            $firstHand = $player->firstHand();
            echo '<p>You have ' . $firstHand[0] . ' and a ' . $firstHand[1] . '</p>';
            $_SESSION['playerScore'] = $player->score;
            echo 'Your score is: ' . $player->score . '<br>';
            //Dealers first two cards
            $dealerFirstHand = $dealer->firstHand();
            $_SESSION['dealerScore'] = $dealer->score;
        }

        //If player presses hit button
        if (isset($_POST['hit'])){
            //In hit we create random card. Store it in hitPlayer.
            $hitPlayer = $player->hit();
            echo 'Your card is ' . $hitPlayer . '<br>';
            $_SESSION['playerScore'] += $hitPlayer;
            echo 'Your score is: ' . $_SESSION['playerScore'];
            //Check if player has more then 21
            if ($_SESSION['playerScore'] > 21){
                echo 'You lose!';
            }

        }

        //If player presses stands
        if (isset($_POST['stand'])){
            $player->stand();
            echo 'Dealer has ' . $_SESSION['dealerScore'] . '<br>';
            //if player presses stand, check if dealer has less then 15.
            while ($_SESSION['dealerScore'] <= 15){
                $hitDealer = $dealer->hit();
                $_SESSION['dealerScore'] += $hitDealer;
                echo 'The dealer hit ' . $hitDealer . ' And has now ' . $_SESSION['dealerScore'] . '<br>';
            }

            //Check if dealer wins
            if ($_SESSION['dealerScore'] < 22 && $_SESSION['dealerScore'] >= $_SESSION['playerScore']){
                echo 'Dealer wins! you lost';
            }

            //Check if dealer lost
            if ($_SESSION['dealerScore'] > 21){
                echo 'Dealer lost';
            }


            //In the case that dealer has more then 15 but still less then 21 and less then player.
            while ($_SESSION['dealerScore'] < 21 && $_SESSION['dealerScore'] < $_SESSION['playerScore']){
                $hitDealer = $dealer->hit();
                $_SESSION['dealerScore'] += $hitDealer;
                echo 'Dealer hit ' . $hitDealer . ' and has now ' . $_SESSION['dealerScore'] . '<br>';
                if ($_SESSION['dealerScore'] > 21){
                    echo 'The dealer lost';
                } else {
                    echo 'The dealer won!';
                }
            }
        }

        //If player surrenders
        if (isset($_POST['surrender'])){
            $player->surrender();
        }
    }

    ?>

    <p>Player score is: <?php echo $_SESSION['playerScore'] ?></p>

    <form method="POST">
        <button name="hit" type="submit" class="btn btn-primary">HIT</button>
        <button name="stand" type="submit" class="btn btn-primary">STAND</button>
        <button name="surrender" type="submit" class="btn btn-primary">SURRENDER</button>
    </form>

    <form method="post" action="index.php">
        <button name="home" type="submit" class="btn btn-primary">HOME</button>
    </form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

