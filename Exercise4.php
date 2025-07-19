<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f4f4f4;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .dice-container {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        max-width: 500px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        
    }
    .heading {
        text-align: center;
        margin-bottom: 20px;
    }
    .success-title {
        color: green;
        font-weight: bold;
    }
    .success-dice {
        color: blue;
    }
    .error {
        color: red;
        font-weight: bold;
        margin-top: 10px;
    }
    .input-section {
        text-align: center;
    }
    input[type="number"] {
        padding: 8px;
        width: 100px;
        margin: 10px auto;
    }
    button {
        padding: 10px 20px;
        background-color: #444;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <div class="dice-container">
        <div class="heading">
            <h2 class="dice-title">Dicey Mania</h2>
            <p>
                Welcome to the game of Romance, Spicy Rolls. 
            </p>
            <p>
                Rolls can turn to luck & luck can turn to grace 
            </p>
        </div>

        <div class="input-section">
            <p>Choose between 4 or 10 dice to roll</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <input type="number" name="generate" id="gen">
                <button>Create your Dice</button>
            </form>
        </div>
        
    </div>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Collect your Inputs
            $gen = htmlspecialchars($_REQUEST["generate"]);

            // Check for errors
            $error = false;
            if(empty($gen)){
                echo "<p class='error'>Do not test me. Enter the correct number</p>";
                $error = true;
            }

            else if(!is_numeric($gen)){
                echo "<p class='error'>Are you Blind!. Enter the correct number not letter</p>";
                $error = true;
            }

            else if($gen != 4 && $gen != 10){
                echo "<p class='error'>Yep, you are Blind!!!! . Sorry there is no audio to hear either 4 or 10</p>";
                $error = true;
            }

            


            // result 

            function rollDice($gen) {
                if ($gen == 4) {
                    echo "<p class='success-title'>Congrats on picking a 4-sided dice</p>";
                    echo "<p class='success-title'>Let us see what you get</p>";

                    $singleDice = rand(1, 4);
                    echo generateMessage($singleDice);

                } elseif ($gen == 10) {
                    echo "<p class='success-title'>Congrats on picking a 10-sided dice</p>";
                    echo "<p class='success-title'>Let us see what you get</p>";

                    $singleDice = rand(1, 10);
                    echo generateMessage($singleDice);
                }
            }

            function generateMessage($diceValue) {
                switch ($diceValue) {
                    case 1:
                        return "<p class='success-dice'>No wonder you are single. You got 1.</p>";
                    case 2:
                        return "<p class='success-dice'>No wonder you are dating. You got {$diceValue}.</p>";
                    case 3:
                    case 4:
                        return "<p class='success-dice'>No wonder you are polygamous. You got {$diceValue}.</p>";
                    default:
                        return "<p class='success-dice'>You got {$diceValue}. That's something!</p>";
                }
            }

             if(!$error){
                rollDice($gen);                
            }
            
        }
    ?>

</body>
</html>