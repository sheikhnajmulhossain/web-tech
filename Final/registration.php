<?php
$email = $password = $confirm = $fullname = $contact = $address = "";
$emailErr = $passErr = $confirmErr = $nameErr = $contactErr = $addrErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm  = $_POST["confirm"];
    $fullname = trim($_POST["fullname"]);
    $contact  = trim($_POST["contact"]);
    $address  = trim($_POST["address"]);


    if ($email == "") {
        $emailErr = "Email is required.";
    } else if (strpos($email, "@") === false) {
        $emailErr = "Email is not valid.";
    }

    if ($password == "") {
        $passErr = "Password is required.";
    } else if (strlen($password) < 8) {
        $passErr = "Password must be at least 8 characters.";
    }


    if ($confirm != $password) {
        $confirmErr = "Passwords do not match.";
    }

    if ($fullname == "") {
        $nameErr = "Full name is required.";
    }


    if ($contact == "") {
        $contactErr = "Contact is required.";
    } else if (!is_numeric($contact) || strlen($contact) != 11) {
        $contactErr = "Contact must be 11 digits.";
    }

  
    if ($address == "") {
        $addrErr = "Address is required.";
    }

 
    if (
        $emailErr == "" && $passErr == "" && $confirmErr == "" &&
        $nameErr == "" && $contactErr == "" && $addrErr == ""
    ) {
        $success = "Registration successful!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration</title>
<style>
    body{
        font-family:Arial,sans-serif;
        background:#e0f7ff;
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
    }
    .card{
        background:#fff;
        width:360px;
        padding:20px;
        border-radius:10px;
        box-shadow:0 8px 20px rgba(0,0,0,.15);
    }
    h2{text-align:center;margin-bottom:10px}
    label{display:block;margin-top:10px;font-size:14px}
    input,textarea{
        width:100%;
        padding:8px;
        margin-top:3px;
        border:1px solid #d1d5db;
        border-radius:6px;
    }
    button{
        width:100%;
        margin-top:14px;
        padding:9px;
        border:none;
        border-radius:20px;
        background:#22c55e;
        color:#fff;
        font-weight:bold;
        cursor:pointer;
    }
    .error{font-size:12px;color:red}
    .success{text-align:center;color:green;margin-bottom:8px}
    .link{text-align:center;font-size:13px;margin-top:8px}
</style>
</head>
<body>
<div class="card">
    <h2>Register</h2>

    <?php if ($success != "") { ?>
        <p class="success"><?php echo $success; ?></p>
    <?php } ?>

    <form method="post">
        <label>Email</label>
        <input name="email" value="<?php echo htmlspecialchars($email); ?>">
        <div class="error"><?php echo $emailErr; ?></div>

        <label>Password</label>
        <input type="password" name="password">
        <div class="error"><?php echo $passErr; ?></div>

        <label>Confirm Password</label>
        <input type="password" name="confirm">
        <div class="error"><?php echo $confirmErr; ?></div>

        <label>Full Name</label>
        <input name="fullname" value="<?php echo htmlspecialchars($fullname); ?>">
        <div class="error"><?php echo $nameErr; ?></div>

        <label>Contact Number</label>
        <input name="contact" value="<?php echo htmlspecialchars($contact); ?>">
        <div class="error"><?php echo $contactErr; ?></div>

        <label>Address</label>
        <textarea name="address" rows="2"><?php echo htmlspecialchars($address); ?></textarea>
        <div class="error"><?php echo $addrErr; ?></div>

        <button type="submit">Create Account</button>
    </form>

    <p class="link">
        Already registered?
        <a href="login.html">Login</a>
    </p>
</div>
</body>
</html>
