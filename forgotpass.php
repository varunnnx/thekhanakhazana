<?php
session_start();
if (isset($_SESSION['first'])) {
    header('location: ./home.php');
}
include('./template-part/header.php');

$connection = mysqli_connect('localhost:3306', 'root', '', 'codeblog');
if ($connection) {
    echo "";
} else {
    die("Database Connection Failed");
}

$query1 = mysqli_query($connection, "select id, img, text from captcha");
$images = array(); // Initialize the $images array

if (mysqli_num_rows($query1) > 0) {
    while ($row = mysqli_fetch_array($query1)) {
        $images[$row['id']] = $row;
    }

    $random_img = array_rand($images);
} else {
    // Handle the case when no rows are returned, e.g., show an error message
    echo "";
}

?>
<!---form section start--->
<!---form area start--->
<section class="main-content">
    <div class="form-area flex align-items-center justify-content-center">
        <form action="includes/forgot_pass.php" method="POST">
            <h2 class="title">Reset Password</h2>
            <div class="input-box">
                <label for="email_address">Enter OTP (Check Your Mail Box)<span>*</span></label>
                <input type="number" name="otp" id="otp" placeholder="Enter your OTP" style="width: 100%" required />
            </div>
            <div class="input-box">
                <label for="email_address">Enter e-mail address <span>*</span></label>
                <input type="email" name="user-email" id="email_address" placeholder="Enter your e-mail" style="width: 100%" required />
            </div>
            <div class "input-box">
                <label for="password">Enter New Password <span>*</span></label>
                <input type="password" name="password" id="password" placeholder="Enter your password" style="width: 100%" required />
            </div>
            <div class="input-box">
                <label for="cpassword">Confirm Your password <span>*</span></label>
                <input name="cuser-password" type="password" placeholder="New password" id="cpassword" style="width: 100%" required />
            </div>

            
            
            <div class="flex justify-content-space-between">
                <input class="primary_btn" type="submit" value="Reset" />
                <button class="primary_btn" type="reset">&circlearrowright;</button>
            </div>
        </form>
    </div>
</section>
<!---form area end--->
<!---form section end--->
<?php include('./template-part/footer.php') ?>
