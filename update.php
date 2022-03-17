<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="">
        <label for="movieName">Change the name of the movie:</label>
        <input type="text" id="movieName" name="movieName" value="<?=$fetch['name']?>"><br><br>
        <label for="genre">Change the genre?</label>
        <input type="text" id="genre" name="genre" value="<?=$fetch['genre']?>"><br><br>
        <label for="description">Change the Description of the movie:</label>
        <input type="text" id="description" name="description" value="<?=$fetch['description']?>"><br><br>
        <input type="submit" name="action" value="update">
    </form>
</body>
</html>