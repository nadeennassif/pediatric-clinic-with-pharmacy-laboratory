<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php?add=no_login");
    exit();
}
if($_SESSION['user']['role']!='admin'){
    header("Location: index.php?add=unauthorized");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="main">
        <!-- Existing code -->
        <div class="form">
            <div id="Popup" class="popup" style="display: block;">
                <div class="popup-content">
                    <span class="close" onclick="closeSignupPopup()">&times;</span>
                    <h2>Add product</h2>
                    <form action="pages/add_product.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="pname" placeholder="Enter product name">
                        <input type="number" name="quan" placeholder="Enter product quantity">
                        <input type="number" step="0.1" name="price" placeholder="Enter product price">
                        <input type="date" name="exp_date" placeholder="Enter expire date">
                        <input type="file" name="img" >
                        <h3>material:description:packaging/...</h3>
                        <textarea name="info" cols="30" rows="10"></textarea>
                        <h3>specifications</h3>
                        <input type="text" name="hpis" placeholder="HPIS CODE">
                        <label for="care">HEALTHCARE PROVIDERS ONLY</label>
                        <select id="care" name="healthcare">
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                        <label for="care">LATEX FREE</label>
                        <select id="care" name="latex">
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                        <input type="text" name="route" placeholder="Medication Route">
                        <button class="btnn" type="submit" onclick="redirectToIndex()">Add</button>
                    </form>
                </div>
            </div>

            <!-- Existing code -->

        </div>
    </div>
    <script>
        function openPopup() {
            var signupPopup = document.getElementById("Popup");
            signupPopup.style.display = "block";
        }

        function closePopup() {
            var signupPopup = document.getElementById("Popup");
            signupPopup.style.display = "none";
        }

    </script>
</body>
</html>