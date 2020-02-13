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

    //Initiate class in player variable
    $player = new Blackjack();
    $_SESSION['player'] = $player;

    //Trying to call hit function twice and display the outcome.
    $firstCard = $player->hit();
    $secondCard = $player->hit();


    $startingHand = $firstCard + $secondCard;

    echo $startingHand;

    //Initiate class in dealer variable
    $dealer = new Blackjack();
    $_SESSION['dealer'] = $dealer;

    ?>

    <form method="post">
        <button name="start" type="submit" class="btn btn-primary">HIT</button>
        <button name="start" type="submit" class="btn btn-primary">STAND</button>
        <button name="start" type="submit" class="btn btn-primary">SURENDER</button>
    </form>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

