<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Movies - Track your collection of your favorite Movies</h1>

<table style="text-align: center; border: solid 1px; padding: 10px;">
    <th style="border: solid 1px">Name</th>
    <th style="border: solid 1px">Genre</th>
    <th style="border: solid 1px">Description</th>
    <th style="border: solid 1px">Update</th>
    <?php foreach ($cards as $card) : ?>
        <tr>
            <td style="border-bottom: solid 1px;"><?= $card['name'] ?></td>
            <td style="border-bottom: solid 1px;"><?= $card['genre'] ?></td>
            <td style="border-bottom: solid 1px;"><?= $card['description'] ?></td>
            <td style="border-bottom: solid 1px;"><a href="<?= "?id={$card['id']}&action=update"?>">Update</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="index.php?action=create">Create new movie</a>

<?php pre($_GET);?>
</body>
</html>