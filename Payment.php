<?php
include 'Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Section</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <header>
        <div class="container">
       
        <form method="POST">
            <!-- Left Section -->
            <div class="left">
                <h2>Payment Details</h2>
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter Name">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter Email">
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter Address">
                <label>Phone Number</label>
                <input type="number" name="phone" placeholder="Enter Number">
                <label>City</label>
                <input type="text" name="city" placeholder="Enter City">
                <div id="zip">
                    <label>State</label>
                    <select name="state">
                        <option>Choose State...</option>
                        <option>Uttar Pradesh</option>
                        <option>Maharashtra</option>
                        <option>Bihar</option>
                        <option>West Bengal</option>
                        <option>Madhya Pradesh</option>
                    </select>
                    <label>Zip code</label>
                    <input type="number" name="zip" placeholder="Zip code">
                </div>
            </div>

            <!-- Right Section -->
            <div class="right">
                <h2>Payment</h2>
                <p>Accepted here:</p>
                <img src="Visa.jpg" width="50" alt="Visa">
                <img src="master_card.jpg" width="50" alt="MasterCard">
                <a href="scanner2.jpg"><img src="google-pay.jpg" width="50" alt="Google Pay"></a>
                <br><br>
                <label>Credit card number</label>
                <input type="number" name="card" placeholder="Enter card number">
                <label>Exp month</label>
                <input type="text" name="exp_month" placeholder="Enter month">
                <div id="zip">
                    <label>Exp year</label>
                    <select name="exp_year">
                        <option>Choose Year...</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                        <option>2028</option>
                        <option>2029</option>
                        <option>2030</option>
                        <option>2031</option>
                        <option>2032</option>
                        <option>2033</option>
                        <option>2034</option>
                        <option>2035</option>
                        <option>2036</option>
                        <option>2037</option>
                        <option>2038</option>
                        <option>2039</option>
                        <option>2040</option>
                    </select>
                    <label>CVV</label>
                    <input type="number" name="cvv" placeholder="CVV">
                </div>
                <input type="submit" value="Proceed to checkout" name="submit">
            </div>
        </form>
        </div>
    </header>
</body>
</html>
<?php
if (isset($_POST['submit'])){
    include 'Connection.php'; // Ensure connection file is included inside PHP processing section

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $card = $_POST['card'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    $sql = "INSERT INTO `payment` (name, email, address, phone_number, city, state, zip_code, card_number, exp_month, exp_year, cvv) 
            VALUES ('$name', '$email', '$address', '$phone', '$city', '$state', '$zip', '$card', '$exp_month', '$exp_year', '$cvv')";
    
    $insert = mysqli_query($conn, $sql);

    if ($insert) {
        echo "<script>
                alert('Payment Successful !!');
                window.location.href = 'Payment.php';
              </script>";
    } else {
        echo "<script>
                alert('Payment Failed: " . mysqli_error($conn) . "');
              </script>";
    }
}
?>
