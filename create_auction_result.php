<?php include_once("header.php") ?>
<?php include_once("database.php") ?>

<div class="container my-5">
<?php

$connection = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['auctionTitle']) || empty($_POST['itemName']) || 
        empty($_POST['auctionEndDate']) || empty($_POST['itemCondition']) ||
        empty($_POST['auctionStartPrice']) || empty($_FILES["image"]["name"])) {
        
        $errorMessage = "Error: Required fields are empty.<br>";
        if (empty($_POST['auctionTitle'])) $errorMessage .= "- Auction Title<br>";
        if (empty($_POST['itemName'])) $errorMessage .= "- Item Name<br>";
        if (empty($_POST['auctionEndDate'])) $errorMessage .= "- Auction End Date<br>";
        if (empty($_POST['itemCondition'])) $errorMessage .= "- Item Condition<br>";
        if (empty($_POST['auctionStartPrice'])) $errorMessage .= "- Start Price<br>";
        if (empty($_FILES["image"]["name"])) $errorMessage .= "- Image<br>";

        echo '<div class="alert alert-danger mt-3" role="alert">' . $errorMessage . '</div>';
        db_disconnect($connection);
        exit();
    }

    date_default_timezone_set('Asia/Kolkata'); // Set your timezone
    $today = date("Y-m-d H:i:s");
    if ($_POST['auctionEndDate'] < $today) {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: End date cannot be before today.</div>';
        db_disconnect($connection);
        exit();
    }

    // Upload image
    $targetDirectory = "photos/"; // relative to project root
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: File is not an image.</div>';
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: File too large.</div>';
        $uploadOk = 0;
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: Only JPG, JPEG, PNG allowed.</div>';
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo '<div class="alert alert-danger mt-3" role="alert">Image upload failed.</div>';
        db_disconnect($connection);
        exit();
    } else {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo '<div class="alert alert-danger mt-3" role="alert">Error uploading file.</div>';
            db_disconnect($connection);
            exit();
        }
    }

    // Assign variables
    $name = mysqli_real_escape_string($connection, $_POST['itemName']);
    $description = !empty($_POST['auctionDetails']) ? mysqli_real_escape_string($connection, $_POST['auctionDetails']) : NULL;
    $category = !empty($_POST['auctionCategory']) ? mysqli_real_escape_string($connection, $_POST['auctionCategory']) : "Other";
    $colour = !empty($_POST['itemColour']) ? mysqli_real_escape_string($connection, $_POST['itemColour']) : "Other";
    $condition = mysqli_real_escape_string($connection, $_POST['itemCondition']);
    $start_time = date("Y-m-d H:i:s");
    $end_time = $_POST['auctionEndDate'];
    $auction_title = mysqli_real_escape_string($connection, $_POST['auctionTitle']);
    $reserve_price = (!empty($_POST['auctionReservePrice']) && is_numeric($_POST['auctionReservePrice'])) ? $_POST['auctionReservePrice'] : "NULL";
    $starting_price = $_POST['auctionStartPrice'];
    $user_id = $_SESSION['user_id'];
    $filePath = $targetFile;

    // Insert item
    $item_query = "INSERT INTO Item (name, description, category, colour, `condition`, photo)
                   VALUES ('$name', " . ($description ? "'$description'" : "NULL") . ", '$category', '$colour', '$condition', '$filePath')";
    
    $item_result = db_query($connection, $item_query);

    if ($item_result) {
        $item_id = mysqli_insert_id($connection);

        $auction_query = "INSERT INTO Auction (user_id, item_id, start_time, end_time, auction_title, reserve_price, starting_price)
                          VALUES ('$user_id', '$item_id', '$start_time', '$end_time', '$auction_title', $reserve_price, '$starting_price')";

        $auction_result = db_query($connection, $auction_query);

        if ($auction_result) {
            $listingLink = "listing.php?item_id=$item_id";
            echo '<div class="text-center">Auction successfully created! <a href="' . $listingLink . '">View your new listing.</a></div>';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error inserting auction.</div>';
        }
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error inserting item.</div>';
    }

    db_disconnect($connection);
}
?>

</div>

<?php include_once("footer.php") ?>
