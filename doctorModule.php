<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Hospital_Management");


$userid = $_SESSION['ID'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Medic Management System</title>


    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="plugins/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-select.min.css">

    <link href="css/style.css" rel="stylesheet">
    <style>


    </style>
</head>


<body>
<div class="page-wrapper">

    <!--Header Upper-->
    <section class="header-uper">
        <div class="container clearfix">
            <div class="logo">
                <figure>
                    <a href="index.html">
                        <img src="images/logo.png" alt="" width="130">
                    </a>
                </figure>
            </div>
            <div class="right-side">
                <ul class="contact-info">
                    <li class="item">
                        <div class="icon-box">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <strong>Email</strong>
                        <br>
                        <a href="#">
                            <span>info@medic.com</span>
                        </a>
                    </li>
                    <li class="item">
                        <div class="icon-box">
                            <i class="fa fa-phone"></i>
                        </div>
                        <strong>Call Now</strong>
                        <br>
                        <span>+ (88017) - 123 - 4567</span>
                    </li>
                </ul>
                <div class="link-btn">
                    <a href="index.html" class="btn-style-one" id="logoutbtn">Logout</a>

                    <script>
                        document.getElementById("logoutbtn").onclick = function () {
                            alert('Logout Successfully!');
                        };
                    </script>
                </div>
            </div>
        </div>
    </section>
    <!--Header Upper-->

    <!--Main Header-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="doctorDash.php">Profile</a>
                    </li>
                    <li class="active">
                        <a href="doctorModule.php">Doctor Menu</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    <!--End Main Header -->

    <div class="row">
        <div class="col-md-4" style="max-width:25%;margin-top: 3%;margin-left: 20px;margin-bottom: 3%;">
            <div class="list-group" id="list-tab" role="tablist">

                <a class="list-group-item list-group-item-action active" href="#show_appointment"
                   id="list-show_appointment-list" role="tab"
                   aria-controls="home" data-toggle="list">Show Appointment</a>
                <a class="list-group-item list-group-item-action " href="#list-createDisease"
                   id="list-createDisease-list" role="tab"
                   aria-controls="home" data-toggle="list">Add Disease</a>


            </div>
            <br>
        </div>
        <div class="col-md-8" style="margin-top: 3%;">
            <div class="tab-content" id="nav-tabContent" style="width: 950px;">

                <!--<!-                     show appointment-->
                <div class="tab-pane fade show active" id="show_appointment" role="tabpanel"
                     aria-labelledby="list-showAppointment-list">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Appointment Time</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                        $query = "SELECT * FROM APPOINTMENT WHERE APPOINTMENT.DOCTOR_ID ='$userid';";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $patientID = $row['USER_ID'];
                            $appointmentDate = $row['APPOINTMENT_DATE'];
                            $appointmentTime = $row['APPOINTMENT_TIME'];

                            echo "<tr>
            <td>$patientID</td>
            <td>$appointmentDate</td>
            <td>$appointmentTime</td>
            
           

            </tr>";

                        }


                        ?>

                        </tbody>
                    </table>
                    <br>
                </div>

                <!--                Disease n-->
                <div class="tab-pane fade " id="list-createDisease" role="tabpanel"
                     aria-labelledby="list-patientInfo-list">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Disease Name</th>
                            <th scope="col">Disease Type</th>
                            <th scope="col">Disease Description</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                        $query = "SELECT * FROM DISEASE";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $diseaseName = $row['DISEASE_NAME'];
                            $diseaseDesc = $row['DISEASE_DESC'];
                            $diseaseType = $row['DISEASE_TYPE'];

                            echo "<tr>
            <td>$diseaseName</td>
            <td>$diseaseDesc</td>
            <td>$diseaseType</td>
           
            </tr>";

                        }

                        ?>

                        </tbody>
                    </table>
                    <form class="form-group" method="post" action="backend.php">

                        <div class="row">

                            <input type="hidden" value="<?php echo $userid ?>" name="doctorUID" id="doctorUID">

                            <div class="group input-group">
                                <label class="col-md-4" for="diseaseName"> Disease Name (Eg. Infectious disease)</label>
                                <input class="col-md-8 form-control" type="text" placeholder=""
                                       name="diseaseName"
                                >
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="diseaseDesc">Disease Description</label>
                                <input class="col-md-8 form-control" type="text"
                                       placeholder="" name="diseaseDesc"
                                >
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="diseaseType">Disease Type</label>
                                <input class="col-md-8 form-control" type="text"
                                       placeholder="Disease Type (e.g. Diabetes)"
                                       name="diseaseType" id="diseaseType">
                            </div>


                        </div>

                        <input type="submit" name="newDiseaseBtn" value="Create Disease" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px;">
                    </form>
                </div>


            </div>
        </div>


    </div>


    <!--footer-main-->
    <footer class="footer-main">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="about-widget">
                            <div class="footer-logo">
                                <figure>
                                    <a href="index.html">
                                        <img src="images/logo-2.png" alt="">
                                    </a>
                                </figure>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, temporibus?</p>
                            <ul class="location-link">
                                <li class="item">
                                    <i class="fa fa-map-marker"></i>
                                    <p>Modamba, NY 80021, United States</p>
                                </li>
                                <li class="item">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <a href="#">
                                        <p>Support@medic.com</p>
                                    </a>
                                </li>
                                <li class="item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p>(88017) +123 4567</p>
                                </li>
                            </ul>
                            <ul class="list-inline social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h6>Services</h6>
                        <ul class="menu-link">
                            <li>
                                <a href="#">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>Orthopadic Liabilities</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>Dental Clinic</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>Dormamu Clinic</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>Psycological Clinic</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>Gynaecological Clinic</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="social-links">
                            <h6>Recent Posts</h6>
                            <ul>
                                <li class="item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/blog/post-thumb-small.jpg"
                                                     alt="post-thumb">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">Post Title</a></h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolorem.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/blog/post-thumb-small.jpg"
                                                     alt="post-thumb">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="#">Post Title</a>
                                            </h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolorem.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container clearfix">
                <div class="copyright-text">
                    <p>&copy; Copyright 2018. All Rights Reserved by
                        <a href="index.html">Medic</a>
                    </p>
                </div>
                <ul class="footer-bottom-link">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!--End footer-main-->

    <!--End pagewrapper-->
    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>


    <script>
        function generateDoctorID() {
            var doctorID = "";
            var possible = "0123456789";

            for (var i = 0; i < 3; i++)
                doctorID += possible.charAt(Math.floor(Math.random() * possible.length));

            document.getElementById("doctorID").value = "D" + doctorID;
        }

        function generateRoomID() {
            var roomID = "";
            var possible = "0123456789";

            for (var i = 0; i < 3; i++)
                roomID += possible.charAt(Math.floor(Math.random() * possible.length));

            document.getElementById("roomID").value = "R" + roomID;
        }

        document.getElementById("foreigner").addEventListener("change", function () {
            if (this.value === "YES") {
                document.getElementById("passportNo").style.display = "flex";
            } else {
                document.getElementById("passportNo").style.display = "none";
            }
        });

    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick/slick.min.js"></script>
    <!-- FancyBox -->
    <script src="plugins/fancybox/jquery.fancybox.min.js"></script>
    <!-- Google Map -->

    <script src="plugins/validate.js"></script>
    <script src="plugins/wow.js"></script>
    <script src="plugins/jquery-ui.js"></script>
    <script src="plugins/timePicker.js"></script>
    <script src="js/script.js"></script>
</body>

</html>