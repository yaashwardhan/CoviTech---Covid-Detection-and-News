<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CoviTech - Covid Detection and News </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/meanmenu.css">

    <style>
    .center {
      margin: auto;
      width: 90%;
    }
    .rcorners2 {
      border-radius: 12px;
      border: 1px solid #73AD21;
      padding: 10px;
      width: 150px;
      height: 35px;
    }
    </style>
</head>

<body>

    <!-- header begin -->
    <header>
        <div class="top-bar d-none d-md-block">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-6 offset-xl-1 col-lg-6 offset-lg-1 col-md-7 offset-md-1">
                        <div class="header-info">
                            <span>"Let's Fight this Pandemic Together! Make sure you get vaccinated."</span>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-4">
                        <div class="header-top-right-btn f-right">
                            <a href="vacc.php" class="btn">Get Vaccinated!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- menu-area -->
        <div class="header-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-5 d-flex align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="header__menu f-right">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="index.html">About</a>
                                    </li>
                                    <li><a href="news.html">News</a>
                                    </li>
                                    <li><a href="resources.html">Resources</a>
                                    </li>
                                    <li><a href="modelpage.php">Model</a>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- </main> -->
      <?php
    // define variables and set to empty values
    $fnameErr = $lnameErr = $emailErr = $teleErr = $centreErr = $doseErr = $slotErr = $dateErr = $typeErr = "";
    $fname = $lname = $email = $centre = $date = $tele = $dose = $slot = $type = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $fnameErr = "Required field. Please fill";
        } else {
            $fname = $_POST["fname"];
        }

        if (empty($_POST["lname"])) {
            $lnameErr = "Required field. Please fill";
        } else {
            $lname = $_POST["lname"];
        }

        if (empty($_POST["email"])) {
            $emailErr = "Required field. Please fill";
        } else {
            $email = $_POST["email"];
        }

        if (empty($_POST["tele"])) {
            $teleErr = "Required field. Please fill";
        } else {
            $tele = $_POST["tele"];
        }

        if (empty($_POST["centre"])) {
            $centreErr = "Required field. Please fill";
        } else {
            $centre = $_POST["centre"];
        }

        if (empty($_POST["dose"])) {
            $doseErr = "Required field. Please fill";
        } else {
            $dose = $_POST["dose"];
        }

        if (empty($_POST["type"])) {
            $typeErr = "Required field. Please fill";
        } else {
            $type = $_POST["type"];
        }

        if (empty($_POST["date"])) {
            $dateErr = "Required field. Please fill";
        } else {
            $date = $_POST["date"];
        }

        if(empty($_POST['slot'])) {
            $slotErr = "Required field. Please fill";
        } else {
            $slot = $_POST['slot'];
        }
    }
    ?>

    <?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'college');

    // Try connecting to the Database
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //Check the connection
    if ($conn == false) {

    } else {

    }
    $fname = $lname = $email = $centre = $date = $tele = $dose = $slot = $type = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $tele = $_POST["tele"];
        $centre = $_POST["centre"];
        $dose = $_POST["dose"];
        $slot = $_POST["slot"];
        $date = $_POST["date"];
        $type = $_POST["type"];
    }

    $sql = "INSERT INTO vaccination (fname, lname, email, tele, centre, dose, slot, date, type)
    VALUES ('$fname', '$lname', '$email', $tele, '$centre', '$dose', '$slot', '$date', '$type')";

    if ($conn->query($sql) === TRUE) {
        echo "Successfull! Your Booking is confirmed!";
    } else {
        echo "Successfull! Your Booking is confirmed!";
    }

    $conn->close();
    ?>
    <main role="main" class="servcies-area gray-bg pt-10 pb-0">
        <div class="center" style="padding-top: 60px; padding-bottom: 20px;">

            <div class="row" style="padding-top: 40px; padding-bottom: 20px; padding-left: 40px; padding-right: 40px">
                <form method="post">
                <br>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>First Name</h6>
                            <span class="error"><?php echo $fnameErr; ?></span>
                            <input type="text" class="rcorners2" name="fname" pattern = "[A-zÀ-ú\s]+" required>
                            <br><br>
                            <h6>Last Name</h6>
                            <span class="error"><?php echo $lnameErr; ?></span>
                            <input type="text" class="rcorners2" name="lname" pattern = "[A-zÀ-ú\s]+" required>
                            <br><br>
                            <h6>Email</h6>
                            <span class="error"><?php echo $emailErr; ?></span>
                            <input type="text" class="rcorners2" name="email" pattern = "^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" required>
                            <br><br>
                            <h6>Phone No.</h6>
                            <span class="error"><?php echo $teleErr; ?></span>
                            <input type="tel" class="rcorners2" name="tele" pattern = "[0-9]{10}" required>
                            <br><br>
                        </div>
                        <div class="col-md-4">
                            <h6>Vaccination Center</h6>
                            <span class="error"> <?php echo $centreErr; ?></span>
                            <input type="radio" name="centre" value="Andheri">Andheri
                            <input type="radio" name="centre" value="Bandra">Bandra
                            <input type="radio" name="centre" value="Colaba">Colaba
                            <br><br>
                            <h6>Vaccination Dose</h6>
                            <span class="error"> <?php echo $doseErr; ?></span>
                            <input type="radio" name="dose" value="1">1st
                            <input type="radio" name="dose" value="2">2nd
                            <br><br>


                        <h6>Vaccination Type</h6>
                        <span class="error"> <?php echo $typeErr; ?></span>
                        <input type="radio" name="type" value="Covaxin">Covaxin
                        <input type="radio" name="type" value="CoviShield">CoviShield
                        <br><br>
                        </div>
                        <div class="col-md-4">
                            <h6>Date To Book</h6>
                            <span class="error"> <?php echo $dateErr; ?></span>
                            <input type = "date" class="rcorners2" name = "date" class="datetime">
                            <br><br>

                            <h6>Vaccination Slot</h6>
                            <span class="error"> <?php echo $slotErr; ?></span>
                            <input type="radio" name="slot" value="slot1">8 AM
                            <input type="radio" name="slot" value="slot2">11:30 AM
                            <input type="radio" name="slot" value="slot3">3 PM
                            <input type="radio" name="slot" value="slot4">6:30 PM
                            <br><br>
                        </form></center>                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                <center><input type="submit" class="btn btn-primary" name="submit" value="Book" type="file"></center>
                <br><br>
            </div>
        </div>
    </div>
</div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
        <script src="predict.js"></script >



        <footer>
            <div class="footer-top primary-bg pt-115 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 offset-xl-1 col-lg-3 d-md-none d-lg-block">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h3>Quick Links</h3>
                                </div>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="news.html">News</a></li>
                                        <li><a href="resources.html">Resources</a></li>
                                        <li><a href="modelpage.php">Model</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 offset-xl-1 col-lg-3 col-md-4">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h3><i class="fa fa-envelope"></i> Contact Us</h3>
                                </div>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="mailto:contact@covitech.org">contact@covitech.org</a></li>
                                        <li><a>Computer Engineering Department,<br>MPSTME, Mumbai</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-25 pb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copyright text-center">
                                <p class="white-color">Web Programming Project, 2021</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
