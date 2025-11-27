<?php include_once("header.php") ?>

<style>
    body {
        background: linear-gradient(to right, #e3f2fd, #fff);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 40px 0;
    }

    .container {
        width: 45%;
        margin: 0 auto;
    }

    form {
        background-color: #ffffff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    form:hover {
        transform: rotateY(4deg);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.25);
    }

    nav.navbar {
        display: none !important;
    }

    .text-center {
        margin-top: 20px;
    }

    .btn-primary {
        font-weight: 500;
        font-size: 16px;
        padding: 12px;
    }

    .form-text.text-muted {
        font-size: 13px;
    }
</style>

<div class="container">
    <h2 class="my-3">Register new account</h2>

    <!-- Create auction form -->
    <form method="POST" action="process_registration.php">
        <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label text-right">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                <small id="firstNamelHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label text-right">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                <small id="lastNamelHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="accountType" class="col-sm-2 col-form-label text-right">Registering as a:</label>
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="accountBuyer" value="buyer" checked>
                    <label class="form-check-label" for="accountBuyer">Buyer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="accountSeller" value="seller">
                    <label class="form-check-label" for="accountSeller">Seller</label>
                </div>
                <small id="accountTypeHelp" class="form-text-inline text-muted"><span class="text-danger">* Required.</span></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label text-right">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <small id="passwordHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="passwordConfirmation" class="col-sm-2 col-form-label text-right">Repeat password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordConfirmation" name="passwordConfirmation" placeholder="Enter password again">
                <small id="passwordConfirmationHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-primary form-control" <a href="login.php">Register</a></button>
        </div>
    </form>

    <?php
        $login = 'login.php';
        echo '<div class="text-center">Already have an account? <a href="' . $login . '">Login</a></div>';
    ?>

</div>

<?php include_once("footer.php") ?>
