<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eexercise 1</title>
    <style>
        h1{
            color: orange;
            font-size: 40px;
            font-weight: bold;
        }

        .error{
            color: red;
            font-size: 16px;
        }

        .success{
            color: black;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <h1>Become a Millionare</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="lastName" placeholder="Last Name">
        <button>Win now</button>
    </form>

    <!-- PHP CODE -->
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Grab all the inputs
            $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Error handlers
            $errors  = false;
            if(empty($firstName) || empty($lastName)){
                echo "<p class='error'>Fill in all fields!</p>";
                $errors = true;
            } 

            if(!is_string($firstName) || !is_string($lastName)){
                echo "<p class='error'>enter your real name!</p>";
                $errors = true;
            }

            // Show result if there are no errors
            if($errors === false){
                echo "<p class='success'>Congratulations $firstName $lastName, you have become a millionare</p>";
            }
        }
    ?>
</body>
</html>