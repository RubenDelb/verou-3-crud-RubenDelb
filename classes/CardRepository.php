<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create($values): void
    {
        $query = "INSERT IGNORE INTO movies (`name`, genre, `description`) VALUES ($values);";
        $this->databaseManager->connection->query($query);
        header('Location: index.php');
    }

    // Get one
    public function find(): array
    {

    }

    // Get all
    public function get(): PDOStatement
    {
        // TODO: replace dummy data by real one
        $query = "SELECT * FROM movies";
        $result = $this->databaseManager->connection->query($query);
        return $result;
        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function update($array): void
    {
        $query = "UPDATE movies SET `name` = '{$_GET['movieName']}', genre = '{$_GET['genre']}', `description` = '{$_GET['description']}' WHERE id = '{$_SESSION['id']}';";
        $this->databaseManager->connection->query($query);
        header('Location: index.php');
    }

    public function delete(): void
    {

    }

}