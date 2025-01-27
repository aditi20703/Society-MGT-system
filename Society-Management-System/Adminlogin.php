<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminlogin</title>
    <script src="https://kit.fontawesome.com/2edfbc5391.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style1.css">
    <style>
        .adminfbtn h1 {
            font-size: 25px;
            margin-bottom:10px;
        }
        .form-container1 .admimg {
            width: 100px;
            height: 80px;
            border-radius: 100px;
            margin-bottom: 10px;
        }

        .col-1 {
            position: relative;
            left: 5px;
            top: -60px;
            width: 50vw;
            height: 400px;
            padding-right: 20px;
            padding-left: 30px;
            border-radius: 40px;
        }

        .col-2 {
            background: #dcdde4;
            width: 300px;
            height: 300px;
            position: relative;
            text-align: center;
            padding: 10px 0;
            margin: auto;
            box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 20px;
            left: 20px;
            bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="page" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
        <div class="navbar">
            <img src="Images/shlogo.jpg" class="logo">
            <h1 style="color: white;font-size:50px; font-weight: 500;">Kapil Akhila</h1>
            <nav>
                <ul>
                    <li><a href="" class="active">Home</a></li>
                    <li><a href="#rules">Rules & Regulations</a></li>
                </ul>
            </nav>
            <a href="login.html" class="btn" style="right:65px; top:20px; font-size: 20px">User Login</a>
        </div>
        <div class="row">
            <div class="col-1">
                <img src="Images/building1.jpg">
            </div>
            <div class="col-2">
                <div class="form-container1">
                    <div class="adminfbtn">
                        <h1>Admin Login</h1>
                    </div>
                    <img src="Images/adminlogin.jpg" class="admimg" alt="">
                    <form action="Adminlogin.php" method="POST">
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="text" placeholder="Admin Code" name="admincode" required>
                        <button type="submit" class="btn-losi" name="logina">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div id="rules" style="background-color:#c5d0d0  ">
            <p style="text-align: center; font-size: 30px; box-shadow:3px 3px 3px 3px;">Rules & Regulations</p>
            <hr>
            <li>Members and residents are required to keep their flats/homes and nearby premises clean and habitable.</li>
            <li>The residents should also maintain proper cleanliness etiquette while using common areas, parking lot, etc. and not throw litter from their balconies and windows.</li>
            <li>Members must regularly pay the maintenance charges and all other dues necessitated by the society.</li>
            <li>Keeping pets is allowed after submitting the required NOC to the society. But if pets like dogs are creating any kind of disturbance to other society members then the pets won’t be allowed.</li>
            <li>Every member of the society should park their vehicles in their respective allotted parking spaces only.</li>
            <li> After using the community hall for any event or function it should be cleaned and no damages should be caused.</li>
            <li>No member can occupy the area near their front doors, corridors, passage for their personal usage.</li>
            <li>Salesmen, vendors or any other sellers are not allowed to enter the premises.</li>
            <li>Wastage and over usage of water is not allowed.</li>
            <li>Smoking in lobbies, passage is not allowed. If any irresponsible person is found smoking in the no smoking zone, he/she shall be charged with penalty.</li>
        </div>
        <!-- footer code -->
        <hr>
        <footer>
            <div class="main-content" style="margin-top:20px">
                <div class="left box">
                    <h2>About Us</h2>
                    <div class="content">
                        <p>
                            SocietyHUB is webapp where society members can get all the updates related to their society. The members also get notified with notices and events held in society and can see information about members in society. Members can also post complaints regarding any issue in society.
                        </p>
                    </div>
                </div>
                <div class="center box adjust">
                    <div class="cen">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="login.html">Home</a></li>
                            <li><a href="#Loginform">Login</a></li>
                            <li><a href="#rules">Rules and Regulations</a></li>
                        </ul>
                    </div>

                </div>
                <div class="right box">
                    <h2>Address</h2>
                    <div class="content">
                        <div class="place">
                            <span class="fas fa-map-marker-alt"></span>
                            <span class="text">Thanekar Parkland,Badlapur(E)</span>
                        </div>
                        <div class="phone">
                            <span class="fas fa-phone-alt"></span>
                            <span class="text">+91 8779635278</span>
                        </div>
                        <div class="email">
                            <span class="fas fa-envelope"></span>
                            <span class="text">societyHUB@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <h3>Copyright @2021|Designed with HTML,CSS,PHP.</h3>
            </div>
        </footer>
    </div>

</body>

</html>
<!-- Php code to admin login -->
<?php
if (isset($_POST['logina'])) {
    $user = $_POST['username'];
    $adcode = $_POST['admincode'];
    if ($user == "Admin" && $adcode == "100") {
        echo "<script>alert('Welcome,You are logged in...!');
        window.location.href ='managemem.php';
        </script>";
    } else {
        echo "<script>alert('Sorry,Please enter valid details.!!');
        </script>";
    }
}
?>