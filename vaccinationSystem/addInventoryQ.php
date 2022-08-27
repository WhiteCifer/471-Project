<?php
session_start();
require_once('DBconnect.php');
$id = $_SESSION['id'];
$access = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '$id'");
if(!empty($_SESSION['id']) && mysqli_num_rows($access) != 0){
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

<?php
$vname = $_GET['vname'];
$hid = $_GET['hid'];


?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
      <div class="container">
        <a class="navbar-brand" href="ahomepage.php">
          <p><img src="images/injection.png"> Vaccination System</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="ahomepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aDashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <form method="post" action='<?php echo "addInventoryV.php?hid=$hid"?>'>
              <button type="submit" class="btn btn-dark ms-3"><- Go Back</button>
            </form>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->


<!-- Start your project here-->

<div id="preview" class="preview" style="padding-top: 250px;">
    <div style="display: none;"></div>
    <div>
        <div data-draggable="true" style="position: relative;">
            <!---->
            <!---->
            <section draggable="false" class="container pt-5" data-v-271253ee="">
                <section class="mb-10">

                    <div class="card mx-4 mx-md-5 text-left shadow-5-strong"
                        style=" margin-top: -170px; background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(30px); ">

                        <div class="card-body px-4 py-5 px-md-5">
                        <form method="post" action="addInventoryQ.php" style="width: 23rem;">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"> Add Date and Quantity</h3>

                            <div class="form-outline mb-4">
                              <input type="text" name="hid" id="text" value = "<?php echo "$hid" ?>"class="form-control form-control-lg" readonly/>
                              <label class="form-label" for="form2Example18">Hospital ID</label>
                            </div>

                            <div class="form-outline mb-4">
                              <input type="text" name="vname" id="text" value = "<?php echo "$vname" ?>"class="form-control form-control-lg" readonly/>
                              <label class="form-label" for="form2Example28">Vaccine Name</label>
                            </div>
                            <div class="form-outline mb-4">
                              <input type="date" name="date" id="text" class="form-control form-control-lg" />
                              <label class="form-label" for="form2Example28">Date</label>
                            </div>
                            <div class="form-outline mb-4">
                              <input type="text" name="quantity" id="text" class="form-control form-control-lg" />
                              <label class="form-label" for="form2Example28">Quantity</label>
                            </div>

                            <div class="pt-1 mb-4">
                              <button type="submit" name="submit" class="btn btn-warning" type="button">Add</button>
                            </div>
                            <div class="pt-1 mb-4">
                            


                            </form>
                            <?php
                              if (isset($_POST['submit']) && isset($_POST['hid']) && isset($_POST['vname']) && isset($_POST['date']) && isset($_POST['quantity'])
                                  && !empty($_POST['hid']) && !empty($_POST['vname']) && !empty($_POST['date']) && !empty($_POST['quantity'])) {
                                $hid = $_POST['hid'];
                                $vname = $_POST['vname'];
                                $date = $_POST['date'];
                                $quantity = $_POST['quantity'];

                                $checker = mysqli_query($conn, "SELECT * FROM inventory WHERE h_id='$hid' AND vac_name='$vname' AND date='$date'");
                                if(mysqli_num_rows($checker) == 0) {

                                  $sql = "INSERT INTO inventory (h_id, vac_name, date, quantity) values ('$hid', '$vname', '$date', '$quantity')";
                                  $query = mysqli_query($conn, $sql);
                                  echo "<script>alert('VACCINATION ADDED TO INVENTORY')</script>";
                                  ?>
                                      <script>
                                        window.location.href = "addInventoryH.php"
                                      </script>
                                  <?php
                                }
                                else {
                                  $sql = "UPDATE inventory SET quantity='$quantity' WHERE h_id='$hid' AND vac_name='$vname' AND date='$date'";
                                  $query = mysqli_query($conn, $sql);
                                  echo "<script>alert('INVENTORY UPDATED')</script>";
                                  ?>
                                      <script>
                                        window.location.href = "addInventoryH.php"
                                      </script>
                                  <?php
                                }
                              }
                              else if (isset($_POST['submit'])){
                                echo "<script>alert('ERROR: FILL OUT ALL SLOTS')</script>";
                                ?>
                                    <script>
                                      window.location.href = "addInventoryH.php"
                                    </script>
                                <?php
                              }
                            ?>
                        </div>
                    </div>
                </section>
            </section>
            <!---->
        </div>
    </div>
</div>
</br>
</br>
</br>

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