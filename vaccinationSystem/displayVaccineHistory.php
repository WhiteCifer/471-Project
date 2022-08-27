<?php
session_start();
require_once('DBconnect.php');
if(!empty($_SESSION['id']) && $_SESSION['id']>=10){
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $frow = mysqli_fetch_array($result);
    $fname = $frow['fname'];
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Vaccination System</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

    <!--Search Bar-->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/search.css" rel="stylesheet" />

  </head>

  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
      <div class="container">
        <a class="navbar-brand" href="uhomepage.php">
          <p><img src="images/injection.png"> Vaccination System</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="uhomepage.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="uDashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <button onclick="location.href='uDashboard.php'" type="button" class="btn btn-dark ms-3"><- Go Back</button>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->






<!-- Start your project here-->

<?php
{
  $sql = 'select i.vac_name, h.name, h.address, v.fpayment, v.fvaccine, i.date
   FROM vaccine_history v, inventory i, hospital h 
   WHERE i.comb_id = v.comb_id 
   AND i.h_id = h.h_id 
   AND v.id='.$id.'
   ORDER BY i.date DESC';
  $query = mysqli_query($conn, $sql);
}

?>
<div class="s130">
<?php

if(mysqli_num_rows($query) != 0) {


?>
</div>
<div class=container>
  <?php
    echo '<table class="table">
        <thead style="background-color: #fdca3d">
            <tr>
              <th scope="col">Vaccine Name</th>
              <th scope="col">Hospital Name</th>
              <th scope="col">Address</th>
              <th scope="col">Payment status</th>
              <th scope="col">Vaccination Status</th>
              <th scope="col">Date</th>
            </tr>
        </thead>';
    while($row = mysqli_fetch_array($query)){
      echo '<tbody>
      <tr style="vertical-align: middle;">
          <th scope="row">'.$row[0].'</th>
          <td>'.$row[1].'</td>
          <td>'.$row[2].'</td>
          <td>'.$row[3].'</td>
          <td>'.$row[4].'</td>
          <td>'.$row[5].'</td>
      </tr>
      
  </tbody>';
    }
    echo '</table>';
    ?>
</div>
<?php
}
?>


<!-- End your project here-->




    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!--Search Bar-->
    <script src="js/search.js"></script>

  </body>

</html>

<style>
  /* Color of the links BEFORE scroll */
  .navbar-scroll .nav-link,
  .navbar-scroll .navbar-toggler-icon,
  .navbar-scroll .navbar-brand {
    color: #262626;
  }

  /* Color of the navbar BEFORE scroll */
  .navbar-scroll {
    background-color: #fdca3d;
  }

  /* Color of the links AFTER scroll */
  .navbar-scrolled .nav-link,
  .navbar-scrolled .navbar-toggler-icon,
  .navbar-scroll .navbar-brand {
    color: #262626;
  }

  /* Color of the navbar AFTER scroll */
  .navbar-scrolled {
    background-color: #fff;
  }

  /* An optional height of the navbar AFTER scroll */
  .navbar.navbar-scroll.navbar-scrolled {
    padding-top: auto;
    padding-bottom: auto;
  }

  .navbar-brand {
    font-size: 30px;
    height: 3.5rem;
  }
</style>
<?php
	}
	else{
		header("Location: accessDenied.php");
	}

?>