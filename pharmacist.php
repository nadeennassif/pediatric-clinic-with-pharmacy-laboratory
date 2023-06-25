<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: index.php?login=multiple");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="main">
        <!-- Existing code -->
        <div class="form">
            <h2>Login Here</h2>
            <form action="pages/login.php" method="POST">
                <input type="email" name="email" placeholder="Enter email here">
                <input type="password" name="password" placeholder="Enter password here">
                <button class="btnn" type="submit">Login</button>
            </form>

            <p class="link"> Don't have an account<br>
                <a href="#" onclick="openSignupPopup(); ">Sign up</a> here
            </p>
            
            <!-- Existing code -->

            <div id="signupPopup" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closeSignupPopup()">&times;</span>
                    <h2>Sign up Here</h2>
                    <form action="pages/signup.php" method="POST">
                        <input type="text" name="fname" placeholder="Enter first name">
                        <input type="text" name="lname" placeholder="Enter last name">
                        <input type="email" name="email" placeholder="Enter email">
                        <input type="password" name="password" placeholder="Enter password">
                        <select name="role">
                            <option value="user" selected>user</option>
                            <option value="admin">admin</option>
                            <option value="doctor">doctor</option>
                        </select>
                        <button class="btnn" type="submit" onclick="redirectToIndex()">Sign up</button>
                    </form>
                </div>
            </div>

            <!-- Existing code -->

        </div>
    </div>
    <script>
        function openSignupPopup() {
            var signupPopup = document.getElementById("signupPopup");
            signupPopup.style.display = "block";
        }

        function closeSignupPopup() {
            var signupPopup = document.getElementById("signupPopup");
            signupPopup.style.display = "none";
        }

    </script>
</body>
</html>
