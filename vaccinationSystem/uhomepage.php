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
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->



<!-- Start your project here-->

<div id="preview" class="preview">
    <div style="display: none;"></div>
    <div>
        <div data-draggable="true" style="position: relative;">
            <!---->
            <!---->
            <section draggable="false" class="container pt-5" data-v-271253ee="">
                <section class="mb-10">
                    <!-- Background image -->
                    <div class="p-5 text-center bg-image"
                        style="background-image: url(&quot;https://images.unsplash.com/photo-1615631648086-325025c9e51e?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=Mnw5NjI0M3wwfDF8c2VhcmNofDV8fHZhY2NpbmF0ZXxlbnwwfHx8fDE2NjEyNTMxMDI&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&quot;); height: 500px; background-size: cover; background-position: 50% 50%;"
                        aria-controls="#picker-editor">
                    </div> <!-- Background image -->
                    <div class="card mx-4 mx-md-5 text-center shadow-5-strong"
                        style=" margin-top: -170px; background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(30px); ">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h1 class="display-3 fw-bold ls-tight mb-4">
                                <span>GET</span> <br> <span class="text-warning">VACCINATED</span>
                            </h1>
                            <a class="btn   btn-warning btn-lg py-3 px-5 mb-2 me-2" href="getVaccine.php"
                                role="button" aria-controls="#picker-editor">Get Vaccine</a>
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