
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
    $fnameErr = $lnameErr = $emailErr = $teleErr = $genderErr = $streetErr = $locErr = $dobErr = $citytErr = "";
    $fname = $lname = $email = $gender = $loc = $street = $dob = $tele = $city = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $fnameErr = "";
        } else {
            $fname = $_POST["fname"];
        }

        if (empty($_POST["lname"])) {
            $lnameErr = "";
        } else {
            $lname = $_POST["lname"];
        }

        if (empty($_POST["email"])) {
            $emailErr = "";
        } else {
            $email = $_POST["email"];
        }

        if (empty($_POST["tele"])) {
            $teleErr = "";
        } else {
            $tele = $_POST["tele"];
        }

        if (empty($_POST["gender"])) {
            $genderErr = "";
        } else {
            $gender = $_POST["gender"];
        }

        if(!empty($_POST["dob"])) {
            $dob = $_POST["dob"];
        }

        if(!empty($_POST["street"])) {
            $street = $_POST["street"];
        }

        if(!empty($_POST["city"])) {
            $city = $_POST["city"];
        }

        if(empty($_POST['loc'])) {
            $locErr = "";
        } else {
            $loc = $_POST['loc'];
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
        // dir('Error: Cannot connect');
    } else {
        // echo "Connected";
    }
    $fname = $lname = $email = $gender = $loc = $dob = $tele = $street = $city = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $tele = $_POST["tele"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $loc = $_POST["loc"];
    }

    $sql = "INSERT INTO covid (fname, lname, email, tele, dob, gender, street, city, loc)
    VALUES ('$fname', '$lname', '$email', $tele, '$dob', '$gender', '$street', '$city', '$loc')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
    } else {
        // echo "Error: Please fill the form properly";
    }
    $conn->close();
    ?>

    <main role="main" class="servcies-area gray-bg pt-10 pb-0">
        <div class="center" style="padding-top: 60px; padding-bottom: 20px;">
        <center><h1>About</h1></center>
        <div class="about-text">
            <p style="text-align: center;">CHEST X-rays are currently the leading method for diagnosing pneumonia, and hence they play a pivotal role in Radiography and clinical diagnosis.<br>However, detecting pneumonia in chest X-rays is a difficult task that relies on the availability of expert radiologists, and may take long hours. The objective of this project, was to develop a model through a residual neural network, capable of detecting pneumonia from chest X-rays with an acceptable accuracy.</p>
            <p style="text-align: center; color:dimgrey">Note: Please do not completely rely on the model predictions. We highly recommend you consult a doctor/radiologist from our resources page before making any decisions.</p>
                <center>
                    <img src="img/shape/section-title-line.png" alt="">
                </center>
                <br>
        </div>
            <div class="row" style="padding-top: 40px; padding-bottom: 20px; padding-left: 0px; padding-right: 40px">
                <form method="post">
                    <h3 class="textclass" style="color:dimgrey;">Step 1</h4>
                    <br>
                    <div class="row">
                        <div class="column">
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
                            <h6>Gender</h6>
                            <span class="error"><?php echo $genderErr; ?></span>
                            <input type="radio" name="gender" value="Female" required> Female
                            <input type="radio" name="gender" value="Male" required> Male
                            <input type="radio" name="gender" value="Other" required> Other
                        </div>
                        <div class="column">
                            <h6>Date of Birth</h6>
                            <span class="error"><?php echo $dobErr; ?></span>
                            <input type = "date" class="rcorners2" name = "dob" class="datetime" required>
                            <br><br>
                            <h6>Street Address</h6>
                            <span class="error"><?php echo $streetErr; ?></span>
                            <input type="text" class="rcorners2" name="street" required>
                            <br><br>
                            <h6>City</h6>
                            <span class="error"><?php echo $citytErr; ?></span>
                            <input type="text" class="rcorners2" name="city" required>
                        </div>

                        <div class="column" style="padding-left: 90px">
                            <h3 class="textclass" style="color:dimgrey;">Step 2</h3>
                            <br>
                            <label for="image-selector" class="btn">Select Image</label>
                            <input id="image-selector" style="visibility:hidden;" type="file">
                            <br><br>
                            <img id="selected-image" class="textclass" width="150" alt="">
                        </div>

                        <div class="column" style="padding-left: 90px">
                            <h3 class="textclass" style="color:dimgrey;">Step 3</h3>
                            <br>
                            <button type="button" id="predict-button" class="btn btn-primary">Predict</button>
                            <br><br><br>
                            <h4><ol id="prediction-list"></ol></h4>
                            <img id="selected-image" class="textclass" width="150" alt="">
                        </div>
                </div>
            </div><button type='submit' class="btn btn-primary">Save Details</button>
            </form>
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

	<!-- <body style="text-align:center"> -->
		<!-- <main role="main" class="container mt-5">
			<div class="row1">
				<div class="column">
					<input id="image-selector" type="file">
				</div>
				<div class="column">
					<h3 class="textclass">Selected Image</h3>
					<img id="selected-image" class="textclass" width="150" alt="">
				</div>
			</div>
			<div class="row2">
				<br>
				<div class="column">
					<button id="predict-button" class="btn btn-primary float-right">Predict</button>
				</div>
				<div class="column">
					<h3 class="textclass">Predictions</h3>
					<ol id="prediction-list"></ol>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
		<script src="predict.js"></script > -->
	<!-- </body> -->

