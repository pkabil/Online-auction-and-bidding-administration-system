<?php
include_once("header.php");
require("utilities.php");
require("database.php");

$has_session = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
$user_id = $_SESSION['user_id'];

if (!$has_session) {
    echo ('<div class="text-center">Please Login.</div>');
    header("location: login.php");
    exit;
}

$connection = db_connect();
$query = "SELECT * FROM users WHERE user_id='$user_id'";
$result = db_query($connection, $query);
confirm_result_set($result);
$user = db_fetch_single($result);
db_free_result($result);
db_disconnect($connection);



function updateUserField($field, $new_value, $user_id) {
    $connection = db_connect();

    $update_query = "UPDATE users SET $field = '$new_value' WHERE user_id = '$user_id'";
    $stmt = db_query($connection, $update_query);

    confirm_result_set($stmt);

    db_free_result($stmt);
    db_disconnect($connection);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];

    if (isset($_POST['new_first_name']) && $_POST['new_first_name'] != '') {
        updateUserField('first_name', $_POST['new_first_name'], $user_id);
    } 

    if (isset($_POST['new_last_name']) && $_POST['new_last_name'] != '') {
        updateUserField('last_name', $_POST['new_last_name'], $user_id);
    } 

    if (isset($_POST['new_email']) && $_POST['new_email'] != '') {
        updateUserField('email', $_POST['new_email'], $user_id);
    } 

    if (isset($_POST['new_password']) && $_POST['new_password'] != '') {
        updateUserField('password', $_POST['new_password'], $user_id);
    }

}
?>



<style>
    .animated-container {
        background: linear-gradient(145deg, #f0f0f3, #cacaca);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
        transition: transform 0.5s ease, box-shadow 0.5s ease;
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .animated-container:hover {
        transform: rotateY(3deg) rotateX(3deg);
        box-shadow: 10px 10px 30px #b0b0b0, -10px -10px 30px #ffffff;
    }

    .animated-container h3 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .animated-container table {
        width: 100%;
    }

    .animated-container th {
        text-align: left;
        color: #666;
        padding-right: 10px;
    }

    .animated-container input[type="text"],
    .animated-container input[type="submit"] {
        width: 100%;
        padding: 8px;
        border-radius: 8px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .animated-container input[type="text"]:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 10px rgba(108, 99, 255, 0.3);
        outline: none;
    }

    .animated-container input[type="submit"] {
        background-color: #6c63ff;
        color: #fff;
        margin-top: 20px;
        cursor: pointer;
    }

    .animated-container input[type="submit"]:hover {
        background-color: #594ee2;
    }
</style>

<div class="container mt-5 animated-container">
    <h3>Update Profile Information</h3>
    <form method="post" action="">
        <table>
            <tr>
                <th>First Name</th>
                <td><?php echo $user['first_name']?></td>
                <td>
                    <input type="text" name="new_first_name" placeholder="Change First Name">
                </td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $user['last_name']?></td>
                <td>
                    <input type="text" name="new_last_name" placeholder="Change Last Name">
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $user['email']?></td>
                <td>
                    <input type="text" name="new_email" placeholder="Change Email">
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $user['password']?></td>
                <td>
                    <input type="text" name="new_password" placeholder="Change Password">
                </td>
            </tr>
        </table>
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</div>
