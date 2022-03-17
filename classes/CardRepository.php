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

    public function create(): void
    {
        $query = "INSERT IGNORE INTO movies (`name`, genre, `description`) VALUES (:movieName, :genre, :movieDescription)";
        $prepare = $this->databaseManager->connection->prepare($query);
        $prepare->execute(array(':movieName' => "{$_GET['movieName']}", ':genre' => "{$_GET['genre']}", ':movieDescription' => "{$_GET['description']}"));
        header('Location: index.php');
    }

    // Get one, Fetch data (1row) from the table 'movies' using  the id
    public function find(): array
    {
        $query = "SELECT * FROM movies WHERE id= '{$_SESSION['id']}'";
        $result = $this->databaseManager->connection->query($query);
        $fetch = $result->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    // Get all
    public function get(): PDOStatement
    {
        $query = "SELECT * FROM movies";
        $result = $this->databaseManager->connection->query($query);
        return $result;
    }

    public function update(): void
    {
        $query = "UPDATE movies SET `name` = :movieName, genre = :genre, `description` = :movieDescription WHERE id = :id;";
        $prepare = $this->databaseManager->connection->prepare($query);
        $prepare->execute(array(':movieName' => "{$_GET['movieName']}", ':genre' => "{$_GET['genre']}", ':movieDescription' => "{$_GET['description']}", ':id' => "{$_SESSION['id']}"));
        header('Location: index.php');
    }

    public function delete(): void
    {
        $query = "DELETE FROM movies WHERE id = :id;";
        $prepare = $this->databaseManager->connection->prepare($query);
        $prepare->execute(array(':id' => "{$_SESSION['id']}"));
        header('Location: index.php');
    }
}