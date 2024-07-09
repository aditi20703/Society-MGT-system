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
    <link rel="stylesheet" href="dashstyle.css">
    <script src="https://kit.fontawesome.com/2edfbc5391.js" crossorigin="anonymous"></script>
    <style>
        body {
            position: relative;
            top: -1.5rem;
        }

        .details {
            position: relative;
            top: 80px;
            max-width: 50%;
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: -1;
        }

        .member-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .member-photo {
            max-width: 100px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .member-details {
            display: flex;
            align-items: center;
        }

        .member-info {
            flex-grow: 1;
        }

        h2 {
            color: #333;
        }

        p {
            margin: 0;
        }
    </style>
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
        <a href="Welcome.php" ><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="noticebrd.php"><i class="fas fa-bullhorn"></i><span>Notice Board</span></a>
        <a href="complaint.php"><i class="fas fa-envelope-open-text"></i><span>Register Complaint</span></a>
        <a href="payment.php"><i class="fas fa-file-invoice-dollar"></i><span>Maintenance Payment</span></a>
        <a href="userphoto.php"><i class="fas fa-camera-retro"></i><span>Photo Gallery</span></a>
        <a href="details.php" class="active"><i class="fas fa-solid fa-user"></i><span>Members Details</span></a>
        <a href="bookings.php"><i class="fas fa-regular fa-calendar"></i></i><span>Amenities Booking</span></a>
        <a href="Agreement.php"><i class="fas fa-solid fa-file"></i><span>Agreements</span></a>
    </div>
    <div class="details">
        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 1" class="member-photo"> -->
                <div class="member-info">
                    <h2>MR.DINESH KOTHAWADE</h2>
                    <p>Position: CHAIRMAN</p>
                    <p>Contact: 9833155801</p>
                    <p>Flat no: A-1004</p>
                    <p>Intercom number : 5004</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 2" class="member-photo"> -->
                <div class="member-info">
                    <h2>MR. NITIN GHURYE</h2>
                    <p>Position: SECRETARY</p>
                    <p>Contact: 9963507262</p>
                    <p>Flat no: C-601</p>
                    <p>Intercom number : 4601</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 3" class="member-photo"> -->
                <div class="member-info">
                    <h2>MR.RAJ TEJWANEY</h2>
                    <p>Position: TREASURER</p>
                    <p>Contact: 9820523330</p>
                    <p>Flat no : C-1002</p>
                    <p>Intercom number : 7002</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 3" class="member-photo"> -->
                <div class="member-info">
                    <h2>MR. IBRAHIM SHAIKH</h2>
                    <p>Position: PART TIME SOCIETY MANAGER</p>
                    <p>Timing :9AM TO 11.30 AM AND 7PM TO 9PM (Wednesday weekly off)</p>
                    <p>Contact: 9075786560/020-46009001</p>
                    <p>Intercom number : 9001</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 4" class="member-photo"> -->
                <div class="member-info">
                    <h2>MR.RAVINDRA MARATHE</h2>
                    <p>Position: COMMITTEE MEMBER</p>
                    <p>Contact: 1234567890</p>
                    <p>Email-ID: xyz.zyx@example.com</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 5   " class="member-photo"> -->
                <div class="member-info">
                    <h2>MR.ANUP YEOLEKAR</h2>
                    <p>Position: COMMITTEE MEMBER</p>
                    <p>Contact: 1234567890</p>
                    <p>Email-ID: xyz.zyx@example.com</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 5   " class="member-photo"> -->
                <div class="member-info">
                    <h2>MR.SIDDHARTH GODBOLE</h2>
                    <p>Position: COMMITTEE MEMBER</p>
                    <p>Contact: 1234567890</p>
                    <p>Email-ID: xyz.zyx@example.com</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 5   " class="member-photo"> -->
                <div class="member-info">
                    <h2>MRS. SHOBHA SHENDE</h2>
                    <p>Position: COMMITTEE MEMBER</p>
                    <p>Contact: 1234567890</p>
                    <p>Email-ID: xyz.zyx@example.com</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 5   " class="member-photo"> -->
                <div class="member-info">
                    <h2>MRS.MANGALA CHAUDHARI</h2>
                    <p>Position: COMMITTEE MEMBER</p>
                    <p>Contact: 1234567890</p>
                    <p>Email-ID: xyz.zyx@example.com</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 5   " class="member-photo"> -->
                <div class="member-info">
                    <h2>MR.NIMISH GORAY</h2>
                    <p>Position: COMMITTEE MEMBER</p>
                    <p>Contact: 1234567890</p>
                    <p>Email-ID: xyz.zyx@example.com</p>
                </div>
            </div>
        </div>

        <div class="member-card">
            <div class="member-details">
                <!-- <img src="Images\userphoto.jpg" alt="Member 5   " class="member-photo"> -->
                <div class="member-info">
                    <h2>MR.ANNA SAKEGAONKAR</h2>
                    <p>Position: COMMITTEE MEMBER</p>
                    <p>Contact: 1234567890</p>
                    <p>Email-ID: xyz.zyx@example.com</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>