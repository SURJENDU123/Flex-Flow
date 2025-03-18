<?php
include 'Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT US - Flex & Flow</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="container">
        <form method="POST" onsubmit="handleSubmit(event)"> 
            <h1>Contact us</h1>
            <input type="text" id="firstName" placeholder="First Name" name="f_name" required>
            <input type="text" id="lastName" placeholder="Last Name" name="l_name" required>
            <input type="email" id="email" placeholder="Email" name="email" required>
            <input type="tel" id="mobile" placeholder="Mobile" name="number" required>
            <h4>Type Your Message Here...</h4>
            <textarea name="message" required></textarea>
            <button type="submit" id="button" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php

if (isset($_POST['submit'])){
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact`(first_name,last_name,email,phone_number,message) 
        VALUES('$f_name','$l_name', '$email','$number','$message')";
    $insert = mysqli_query($conn, $sql);

    if ($insert) {
        echo "<script>
                alert('Successful! Thanks for submitting the form.');
                window.location.href = 'contact.php';
              </script>";
    } 

}
?>