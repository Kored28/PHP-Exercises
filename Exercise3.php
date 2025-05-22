<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: black;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1{
            font-size: 40px;
            font-weight: 600;
        }

        h4 {
            font-size: 18px;
            font-weight: 500;
        }

        .story{
            font-size: 22px;
            font-style: italic;
            font-weight: 400;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        textarea {
            padding: 10px 20px;
            border-radius: 8px;
            resize: none;
        }

        button{
            padding: 10px 0px;
            border-radius: 8px;
        }

        .error{
            color: red;
            font-size: 16px;
        }

        .success {
            margin-top: 30px;
            font-style: italic;
            font-size: 20px;
            width: 600px;
        }

        .author {
            font-size: 18px;
            font-weight: 600;
        }

    </style>
</head>
<body>
    <h1>Make your Story</h1>
    <h4>Create your own reality</h4>

    <p class="story">I was a warrior who fought....</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <textarea rows="10" cols="100" name="story" placeholder="Tell your story">
        </textarea>
        <button>Create your Masterpiece</button>
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Grab your inputs
            $story = htmlspecialchars($_REQUEST["story"]);

            // Check for errors
            $error = false;
            if(empty(trim($story))){
                echo "<p class='error'>You have to write a story first</p>";
                $error = true;
            }

            if(strlen($story) < 20){
                echo "<p class='error'>Too short to be a story!</p>";
                $error = true;
            }

            // Success
            if(!$error) {
                echo "<p class='success'>'$story'</p>";
                echo "<p class='author'>by a Great Sage</p>";
            }
        }
    ?>

</body>
</html>