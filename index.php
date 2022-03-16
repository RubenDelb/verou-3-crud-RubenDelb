<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(!empty($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
}

function pre($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        require 'create.php';
        create($cardRepository);
        break;
    case 'update':
        update($databaseManager, $cardRepository);
        break;
    default:
        // overview();
        require 'overview.php';
        pre($_GET);
        break;
}

function overview()
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create($cardRepository)
{
    // Provide the create logic
    if (!empty($_GET['movieName']) && !empty($_GET['genre']) && !empty($_GET['description'])){
        $values = "'{$_GET['movieName']}', '{$_GET['genre']}', '{$_GET['description']}'";
        $cardRepository->create($values);
    }
}

function update($databaseManager, $cardRepository): void
{
    // Provide the create logic
    $query = "SELECT * FROM movies WHERE id= '{$_SESSION['id']}'"; // Fetch data from the table movies using id
    $result = $databaseManager->connection->query($query);
    $fetch = $result->fetch(PDO::FETCH_ASSOC);
    pre($fetch);
    // $singleRow = mysqli_fetch_assoc($result);
    pre($_GET);
    require 'update.php';
    if (!empty($_GET['movieName'])){
        $cardRepository->update($fetch);
    }
}