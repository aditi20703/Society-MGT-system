<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>
    <link rel="stylesheet" href="dashstyle.css">
    <link rel="stylesheet" href="responsive .css">
    <script src="https://kit.fontawesome.com/2edfbc5391.js" crossorigin="anonymous"></script>
    <style>
      .content-table {
        border-collapse: collapse;
        margin: 25px 19px;
        margin-left: 13px;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      }
 
      .content-table thead tr {
        background-color: #19B3D3;
        color: #ffffff;
        text-align: left;
        font-weight: 900;
      }

      .content-table th,
      .content-table td {    
        padding: 15px 15px;
      }

      .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
      }

      .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }
    
      .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #82abc7;
      }

      @import url(https://fonts.googleapis.com/css?family=PT+sans);
      * {box-sizing: border-box}
      html {text-align: center}
      #menu {
        list-style: none;
        padding: 0 12px; margin: 0;
        background: #5c8a97;
        margin: 100px auto;
        display: inline-block;
        height: 50px;
        overflow: hidden;
        border-radius: 5px;
        box-shadow: 0px 4px #3b636e, 0px 4px 6px rgba(0, 0, 0, 0.3);
      }

      #menu li{
        margin-left: 10px;
        display: inline-block;
        position: relative;
        bottom: -11px;
      }

      #menu li:first-child {
        margin: 0
      }

      #menu li a{
        background: #a1d0dd;
        display: block;
        border-radius: 3px;
        padding: 0 12px;
        color: black;
        position: relative;
        text-decoration: none;
        height: 27px;
        font: 12px / 27px "PT Sans", Arial, sans-serif;
        box-shadow: 0px 3px #7fafbc, 0px 4px 5px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
      }
      #menu li a:hover {background: #bae0ea}
      #menu li a:active{
        background: #bae0ea;
        bottom: -3px;
      }
    </style>
  </head>
<body>
  <input type="checkbox" id="check">
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
    <!--sidebar start-->
    <div class="sidebar">
      <center style="color:white">
        <img src="Images/download.png" class="profile_image" alt="">
        <h4> <?php echo $_SESSION['username']?> </h4>
      </center>
      <a href="Welcome.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="noticebrd.php" class="active"><i class="fas fa-bullhorn"></i><span>Notice Board</span></a>
      <a href="complaint.php"><i class="fas fa-envelope-open-text"></i><span>Register Complaint</span></a>
      <a href="payment.php"><i class="fas fa-file-invoice-dollar"></i><span>Maintenance Payment</span></a>
      <a href="userphoto.php"><i class="fas fa-camera-retro"></i><span>Photo Gallery</span></a>
      <a href="details.php"><i class="fas fa-solid fa-user"></i><span>Members Details</span></a>
      <a href="bookings.php"><i class="fas fa-regular fa-calendar"></i><span>Amenities Booking</span></a>
      <a href="Agreement.php"><i class="fas fa-solid fa-file"></i><span>Agreements</span></a>
    </div>
    <!--sidebar end--> 
    <div class="content"><br><br><br><br>
    <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'usersregister');

    $query = "SELECT * FROM notices";
    $query_run = mysqli_query($connection, $query);
    ?>
    <table class="content-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Notice Name</th>
          <th>Notice Type</th>
          <th>Date</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody id="records">
        <?php
        if ($query_run) {
          while ($row = mysqli_fetch_array($query_run)) {
            ?>
            <tr>
              <td><?php echo $row['ID']; ?></td>
              <td><?php echo $row['Name']; ?></td>
              <td><?php echo $row['Type']; ?></td>
              <td><?php echo $row['Noticedate']; ?></td>
              <td><?php echo $row['Message']; ?></td>
            </tr>
            <?php
          }
        } else {
          echo "No Record found";
        }
        ?>
      </tbody>
    </table>
    <ul id="menu">
      <li><a id="prevBtn" href="#">prevBtn</a></li>
      <li><a id="nextBtn" href="#">nextBtn</a></li>
    </ul>
  </div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const recordsTableBody = document.getElementById('records');
    const recordsTableRows = recordsTableBody.getElementsByTagName('tr');
    let recordsPerPage = 5;
    let pageNumber = 1;
    const totalRecords = recordsTableRows.length;
    const totalPages = Math.ceil(totalRecords / recordsPerPage);

    function generatePage() {
      const prevBtn = `<li class="page-item ${pageNumber === 1 ? 'disabled' : ''}" onclick="prevPage()"><a class="page-link" href="#">Previous</a></li>`;
      const nextBtn = `<li class="page-item ${pageNumber === totalPages ? 'disabled' : ''}" onclick="nextPage()"><a class="page-link" href="#">Next</a></li>`;
      let buttons = '';

      for (let i = 1; i <= totalPages; i++) {
        buttons += `<li class="page-item ${i === pageNumber ? 'active' : ''}" onclick="goToPage(${i})"><a class="page-link" href="#">${i}</a></li>`;
      }

      document.getElementById('menu').innerHTML = prevBtn + buttons + nextBtn;
    }

    function displayRecords() {
      const startIndex = (pageNumber - 1) * recordsPerPage;
      const endIndex = Math.min(startIndex + recordsPerPage, totalRecords);

      for (let i = 0; i < totalRecords; i++) {
        recordsTableRows[i].style.display = i >= startIndex && i < endIndex ? '' : 'none';
      }

      generatePage();
    }

    window.prevPage = function () {
      if (pageNumber > 1) {
        pageNumber--;
        displayRecords();
      }
    }

    window.nextPage = function () {
      if (pageNumber < totalPages) {
        pageNumber++;
        displayRecords();
      }
    }

    window.goToPage = function (page) {
      pageNumber = page;
      displayRecords();
    }

    displayRecords();
  });
</script>
</body>
</html>
