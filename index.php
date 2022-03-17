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
        update($cardRepository);
        break;
    case 'delete':
        delete($cardRepository);
        break;
    case 'show':
        show($cardRepository);
        break;
    default:
        // overview();
        require 'overview.php';
        pre($_GET);
        break;
}

function overview(): void
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create($cardRepository): void
{
    // Provide the create logic
    if (!empty($_GET['movieName']) && !empty($_GET['genre']) && !empty($_GET['description'])){
        $cardRepository->create();
    }
}

function update($cardRepository): void
{
    $fetch = $cardRepository->find();
    require 'update.php';
    if (!empty($_GET['movieName'])){
        $cardRepository->update();
    }
}

function delete($cardRepository): void
{
    $fetch = $cardRepository->find();
    require 'delete.php';
    if (!empty($_GET['deleteCheck'])){
        $cardRepository->delete();
    }
}

function show($cardRepository): void
{
    $fetch = $cardRepository->find();
    require 'show.php';
}