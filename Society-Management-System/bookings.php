<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amenities Booking</title>
    <style>
        body{
            position: relative;
            top: -1.5rem;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        select {
            height: 40px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: #008000;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }
        .formbook{
            position:relative ;
            top: 20vh;
            z-index: -2;
        }
    </style>
    <link rel="stylesheet" href="dashstyle.css">
    <script src="https://kit.fontawesome.com/2edfbc5391.js" crossorigin="anonymous"></script>

</head>

<body>
    <!--header area start-->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>KAPIL<span>AKHILA</span></h3>
        </div>
        <div class="right_area">
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header area end-->
    <div class="sidebar">
        <center>
            <img src="Images/download.png" class="profile_image" alt="">
            <h4> <?php echo $_SESSION['username'] ?> </h4>
        </center>
        <a href="Welcome.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="noticebrd.php"><i class="fas fa-bullhorn"></i><span>Notice Board</span></a>
        <a href="complaint.php"><i class="fas fa-envelope-open-text"></i><span>Register Complaint</span></a>
        <a href="payment.php"><i class="fas fa-file-invoice-dollar"></i><span>Maintenance Payment</span></a>
        <a href="userphoto.php"><i class="fas fa-camera-retro"></i><span>Photo Gallery</span></a>
        <a href="details.php"><i class="fas fa-solid fa-user"></i><span>Members Details</span></a>
        <a href="bookings.php" class="active"><i class="fas fa-regular fa-calendar"></i></i><span>Amenities Booking</span></a>
        <a href="Agreement.php"><i class="fas fa-solid fa-file"></i><span>Agreements</span></a>
    </div>

    <?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "usersregister";

// Payment gateway configuration (replace with your actual credentials)
$paymentGatewayApiKey = "your_payment_gateway_api_key";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data (you may want to add validation and sanitization)
    $name = $conn->real_escape_string($_POST["name"]);
    $amenity = $conn->real_escape_string($_POST["amenity"]);
    $date = $conn->real_escape_string($_POST["date"]);
    $time = $conn->real_escape_string($_POST["time"]);

    // Save the booking information
    $sql = "INSERT INTO bookings (name, amenity, date, time) VALUES ('$name', '$amenity', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        // Simulate a payment success (replace with actual payment processing)
        $paymentSuccess = true;

        if ($paymentSuccess) {
            echo "<script>alert('Booking and payment successful! Thank you, $name, for booking $amenity on $date at $time.');</script>";
        } else {
            echo "<script>alert('Booking successful, but payment failed.')</script>";
        }
    } else {
        echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
    }
}

// Close the database connection
$conn->close();
?>
<div class="formbook">
<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="amenity">Select Amenity:</label>
    <select name="amenity" required>
        <option value="community_hall">Community Hall</option>
        <option value="swimming_pool">Swimming Pool</option>
        <!-- Add more options as needed -->
    </select><br>

    <label for="date">Select Date:</label>
    <input type="date" name="date" required><br>

    <label for="time">Select Time:</label>
    <input type="time" name="time" required><br>

    <!-- Payment details (replace with your actual payment form) -->
    <label for="card_number">Card Number:</label>
    <input type="text" name="card_number" required><br>

    <label for="expiry_date">Expiry Date:</label>
    <input type="text" name="expiry_date" required><br>

    <label for="cvv">CVV:</label>
    <input type="text" name="cvv" required><br>

    <input type="submit" value="Book Now">
</form>
</div>
<!-- Booking Form with Payment -->


</body>

</html>