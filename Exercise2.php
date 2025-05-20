<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embata</title>
    <style>
        body{
            background-color: #eeeeee;
            padding: 40px 20px;
        }

        h1{
            font-size: 40px;
            font-weight: 600;
        }

        h4{
            font-size: 20px;
            font-weight: 500;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .url-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        select {
            width: 200px;
            height: 30px;
            border-radius: 4px;
        }

        input {
            width: 400px;
            height: 30px;
            background-color: #f6f6f6;
            border: 1px solid #242424;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 14px;
            margin-bottom: 30px;
        }

        input:focus {
            outline: none;
        }

        button{
            border: 1px solid #242424;
            padding: 10px 21px;
            border-radius: 4px;
            font-weight: 600;
            background-color: transparent;
            width: 130px;
            margin-bottom: 30px;
        }

        button:hover {
            background-color: #242424;
            color: #ffffff;
            cursor: pointer;
        }

        .error {
            color: red;
        }

        a{
            font-weight: 500;
            font-size: 20px;
            color: #242424;
        }

        a:hover{
            color:rgb(95, 53, 53);
        }

    </style>
</head>
<body>
    <h1>Search Url Generator</h1>
    <h4>Get your link for free now</h4>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="url-container">
            <label for="urls">Choose your search URL provider</label>
            <select name="urlSelect" id="">
                <option value="" default>Choose option</option>
                <option value="google">Google</option>
                <option value="bing">Bing</option>
                <option value="youtube">YouTube</option>
            </select>
        </div>
        <input type="text" name="searchWord" placeholder="Search Word">
        <button>Submit Now</button>
    </form>
        
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Grab all inputs
            $url = htmlspecialchars($_REQUEST["urlSelect"]);
            $searchWord = htmlspecialchars($_REQUEST["searchWord"]);

            // Errors
            $error = false;
            if(empty($url) || empty($searchWord)){
                echo "<p class='error'>Please fill in the fields</p>";
                $error = true;
            }

            // Output if no errors
            if(!$error){
                $value = "";
                switch ($url) {
                    case "google":
                        $value = "https://google.com/search?q=". urlencode($searchWord);
                        break;
                    case "bing":
                        $value = "https://bing.com/search?q=". urlencode($searchWord);
                        break;  
                    case "youtube":
                        $value = "https://youtube.com/results?search_query=". urlencode($searchWord);
                        break;
                    default:
                        echo "<p class='error'>Something went wrong</p>";
                }

                echo "<a href='$value' target='_blank'>Search now</a>";
            }
        }
    ?>
</body>
</html>