<?php
include 'Connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="Flex & Flow.webp">
    <title>Flex & Flow</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <h1><b>Flex & Flow</b></h1>
    </header>
    <div class="section">
        <div class="form-box">
            <div class="button_box">
                <div id="btn" style="left: 0%;"></div> <!-- Ensure it starts at login position -->
                <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group"  method="POST" style="display: block;">
                <input type="text" class="input-field" name="email" placeholder="Enter email id" required>
                <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                <div class="check_box">
                    <input type="checkbox" id="remember"><label for="remember">Remember Password</label>
                </div>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <form id="register" class="input-group"  method="POST" style="display: none;">
                <input type="text" name="Name" class="input-field" placeholder="Enter Your Name" required>
                <input type="email" name="email" class="input-field" placeholder="Enter Your Valid Email" required>
                <input type="tel" name="Number" class="input-field" placeholder="Enter Your Phone Number" required>
                <input type="password" name="password" class="input-field" placeholder="Set A New Password" required>
                <div class="check_box">
                    <input type="checkbox" id="terms" required><label for="terms">I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="submit-btn" name="Register">Register</button>
            </form>
        </div>
    </div>

<script>
    function register() {
        document.getElementById("login").style.display = "none";
        document.getElementById("register").style.display = "block";
        document.getElementById("btn").style.transform = "translateX(100%)"; // Smooth slide to right
    }
    
    function login() {
        document.getElementById("login").style.display = "block";
        document.getElementById("register").style.display = "none";
        document.getElementById("btn").style.transform = "translateX(0%)"; // Slide back to left
    }
    
    // Ensure login is the default
    window.onload = function () {
        login();
    };
    
</script>
</body>
</html>
<?php
session_start();
include 'Connection.php';

// Registration Part
if (isset($_POST['Register'])) {
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $number = $_POST['Number'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `registration`(`name`, `email`, `number`, `password`) VALUES ('$name', '$email', '$number', '$password')";
    $insert = mysqli_query($conn, $sql);

    if ($insert) {
        echo "<script>alert('Registration Successful!');</script>";
    } else {
        echo "<script>alert('Error in Registration!');</script>";
    }
}

// Login part
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, email,name, password FROM `registration` WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordFromDB = $row['password'];

        // Verify the entered password
        if ($password=== $passwordFromDB) {
            // Store user information in the session
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            // Show gym & yoga page options instead of redirecting
            echo "
            <script>
                document.body.innerHTML = `
                    <div id=Selection style='text-align: center; margin-top: 50px; background-color: transparate;backdrop-filter: blur(10px); color:white;height:200px; border-radius:30px;'>
                        <h3 style='margin-top:35px;'>Welcome, ".$_SESSION['name']."!</h3>
                        <p>Select your desired page:</p>
                        <button onclick=\"window.location.href='Gympage.php'\" style='padding: 10px 20px; margin: 10px; font-size: 16px; border-radius:30px;background-color:black; color: white; box-shadow:1px 1px 5px 1px white; cursor:pointer; '>Go to Gym Page</button>
                        <button onclick=\"window.location.href='Yogapage.php'\" style='padding: 10px 20px; margin: 10px; font-size: 16px;border-radius:30px;background-color:black; color: white; box-shadow:1px 1px 5px 1px white; cursor:pointer; '>Go to Yoga Page</button>
                    </div>
                `;
            </script>
            ";
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('Invalid email!');</script>";
    }
}

$conn->close();
?>

