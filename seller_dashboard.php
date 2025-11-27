<?php
$user = $_SESSION['user'];
$user_id = $_SESSION['user_id'];

$connection = db_connect();
$stmt = "SELECT total_ratings, average_rating FROM users WHERE user_id = '$user_id'";
$rating_call = db_query($connection, $stmt);
confirm_result_set($rating_call);

$rating = db_fetch_single($rating_call);
$totalRatings = $rating["total_ratings"];
$userRating = $rating["average_rating"];

db_free_result($rating_call);
db_disconnect($connection);
?>

<div class="container mt-5" style="display:center;">
    <h2 class="my-3">Welcome, <?php echo $user['first_name']; ?>!</h2>
    <p>What would you like to do today?</p>

    <h3>Selling Activites</h3>
    <li><a href="browse.php">Browse Listings</a></li>
    <li><a href="mylistings.php">See My Current Listings</a></li>
    <li><a href="create_auction.php">Create a New Auction</a></li>
    <br>
    <h3>Your Current Rating is </h3>
    <?php
        if ($totalRatings == 0) {
            echo "You haven't been rated yet";
        } else {
            echo $userRating;
        }
    ?>
    <br><br>
</div>
