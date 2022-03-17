<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="index.php">
        <label for="movieName">Enter the name of the movie:</label>
        <input type="text" id="movieName" name="movieName"><br><br>
        <label for="genre">What's the genre?</label>
        <input type="text" id="genre" name="genre"><br><br>
        <label for="description">Description of the movie:</label>
        <input type="text" id="description" name="description"><br><br>
        <label for="action">What do you want to do?</label>
        <input type="submit" name="action" value="create">
    </form>
</body>
</html>