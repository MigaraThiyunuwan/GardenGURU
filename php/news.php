<?php
// Backend PHP functions to fetch "Top Stories" and "Latest Stories" data
/* function getTopStories()
{ */
    // Fetch top stories from the database (e.g., ORDER BY popularity, date, etc.)
    // Replace the SQL query with your actual query to fetch "Top Stories" data
    // Example:
    // $query = "SELECT * FROM news_articles ORDER BY popularity DESC LIMIT 5";

    // Execute the query and fetch the data into an array
    // $topStories = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_ASSOC);

    // For now, let's assume we have some sample data
   /*  $topStories = array(
        array('id' => 1, 'title' => 'Top Story 1', 'description' => 'Description 1', 'image' => 'image1.jpg'),
        array('id' => 2, 'title' => 'Top Story 2', 'description' => 'Description 2', 'image' => 'image2.jpg'),
        array('id' => 3, 'title' => 'Top Story 3', 'description' => 'Description 3', 'image' => 'image3.jpg'),
    );

    return $topStories;
}
 */
/* function getLatestStories()
{ */
    // Fetch latest stories from the database (e.g., ORDER BY date, etc.)
    // Replace the SQL query with your actual query to fetch "Latest Stories" data
    // Example:
    // $query = "SELECT * FROM news_articles ORDER BY date DESC LIMIT 10";

    // Execute the query and fetch the data into an array
    // $latestStories = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_ASSOC);

    // For now, let's assume we have some sample data
    /* $latestStories = array(
        array('id' => 4, 'title' => 'Latest Story 1', 'description' => 'Description 1', 'image' => 'image4.jpg'),
        array('id' => 5, 'title' => 'Latest Story 2', 'description' => 'Description 2', 'image' => 'image5.jpg'),
        array('id' => 6, 'title' => 'Latest Story 3', 'description' => 'Description 3', 'image' => 'image6.jpg'),
    );

    return $latestStories;
} */
?>

<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName ="newsdb";

$connect = mysqli_connect($dbServerName,$dbUsername,$dbPassword,$dbName);

?>