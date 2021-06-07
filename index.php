<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>result football</title>
</head>


<body>
    <div class="atm">
        <form action="./post.php" method="POST" id="form">
            <div class="block__nominal">
                <label for="nominal">Введите название команды<br>
                    <input type="text" class="nameteam" name="nameteam" style=" padding: 10px;
    border: 1px solid #000;">
                </label>
            </div>
            <input type="submit" class="button" name="button">

        </form>
    </div>

    <div id="message">

    </div>
    <script src="./js/script.js"></script>
</body>

</html>