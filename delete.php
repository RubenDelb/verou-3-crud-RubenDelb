<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Are you sure you want to delete the movie: "<?=$fetch['name']?>" ?</h3>
    <button><a href="?action=delete&deleteCheck=true">Yes, I am sure about this!</a></button>
    <br><br>
    <h4>Or maybe you wanted to update some information about the movie instead?<button><a href="?action=update">Update</a></button> </h4>
    <button><a href="index.php">No, take me back to the homepage please!</a></button>
</body>
</html>