<?php
$user = $_SESSION['user'];
?>

<div class="container mt-5" style="display:center;">
    <h2 class="my-3">Welcome, <?php echo $user['first_name']; ?>!</h2>
    <p>What would you like to do today?</p>

    <h3>Buying Activites</h3>
    <li><a href="browse.php">Browse Listings</a></li>
    <li><a href="mybids.php.php">See My Current Bids</a></li>
    <li><a href="watchlist.php">Check Out My Watchlist</a></li>
    <li><a href="recommendations.php">Look At Recommended Items</a></li>
    <li><a href="won_auctions.php">View Won Auctions and Rate Sellers</a></li>
    <br>
</div>
