<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Hospital_Management");

$userid = $_SESSION['ID'];
$name = $_SESSION['NAME'];
$email = $_SESSION['EMAIL'];
$address = $_SESSION['ADDRESS'];
$dob = $_SESSION['DOB'];
$contact = $_SESSION['CONTACT'];
$age = $_SESSION['AGE'];
$gender = $_SESSION['GENDER'];
$ic_num = $_SESSION['IDENTITY NUMBER'];
$foreign = $_SESSION['FOREIGNER'];
$passport_num = $_SESSION['PASSPORT NUMBER'];
$role = $_SESSION['ROLE'];

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


<body onload="showAlert()">
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
                        <a href="dashboard.php">Profile</a>
                    </li>
                    <li class="active">
                        <a href="patientModule.php">Patient Menu</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    <!--End Main Header -->
    <div class="row">
        <div class="col-md-4" style="max-width:25%;margin-top: 3%;margin-left: 20px;margin-bottom: 3%;">
            <div class="list-group" id="list-tab" role="tablist">

                <a class="list-group-item list-group-item-action active" href="#list-patientInfo"
                   id="list-patientInfo-list" role="tab"
                   aria-controls="home" data-toggle="list">Patient Information</a>
                <a class="list-group-item list-group-item-action " href="#list-doc"
                   id="list-doc-list" role="tab"
                   aria-controls="home" data-toggle="list">View Doctors</a>
                <a class="list-group-item list-group-item-action" href="#list-createAppoint"
                   id="list-createAppoint-list" role="tab"
                   data-toggle="list" aria-controls="home">Create Appointment</a>
                <a class="list-group-item list-group-item-action" href="#list-admission" id="list-admission-list"
                   role="tab"
                   data-toggle="list" aria-controls="home">Admission</a>

                <a class="list-group-item list-group-item-action" href="#list-history" id="list-history-list" role="tab"
                   data-toggle="list" aria-controls="home">History</a>


            </div>
            <br>
        </div>
        <div class="col-md-8" style="margin-top: 3%;">
            <div class="tab-content" id="nav-tabContent" style="width: 950px;">

                <!--                Patient information-->
                <div class="tab-pane fade show active" id="list-patientInfo" role="tabpanel"
                     aria-labelledby="list-patientInfo-list">
                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">

                            <input type="hidden" value="<?php echo $userid ?>" name="patientUID" id="patientUID">
                            <input type="hidden" value="<?php echo $gender ?>" name="patientGender" id="patientGender">

                            <div class="group input-group">
                                <label class="col-md-4" for="patientName">Patient Full Name</label>
                                <input class="col-md-8 form-control" type="text" placeholder="<?php echo $name ?>"
                                       name="patientName" value="<?php echo $name ?>"
                                       id="patientName" readonly>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="patientType" class="col-md-4 control-label">
                                    Patient Type: </label>
                                <div class="col-md-8 form-control">
                                <select class=" form-control" name="patientType" id="patientType">
                                    <option value="INPATIENT" selected>INPATIENT</option>
                                    <option value="OUTPATIENT" >OUTPATIENT</option>
                                </select>
                                </div>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="patientIC">Patient IC</label>
                                <input class="col-md-8 form-control" type="text" value="<?php echo $ic_num ?>"
                                       placeholder="<?php echo $ic_num ?>" name="patientIC"
                                       id="patientIC" readonly>
                            </div>
                            <div class="group input-group" id="passportNo">
                                <label class="col-md-4" for="passportNum">Passport Number</label>
                                <input class="col-md-8 form-control" type="text" value="<?php echo $passport_num ?>"
                                       placeholder="<?php echo $passport_num ?>"
                                       name="passportNum" id="passportNum" readonly>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="patientDOB">DOB</label>
                                <input class="col-md-8 form-control" type="date" value="<?php echo $dob ?>"
                                       placeholder="<?php echo $dob ?>"
                                       name="patientDOB" id="patientDOB" readonly>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="address">Address</label>
                                <input class="col-md-8 form-control" type="text" value="<?php echo $address ?>"
                                       placeholder="<?php echo $address ?>" name="address"
                                       id="address" readonly>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="diseaseType">Disease Type</label>
                                <input class="col-md-8 form-control" type="text"
                                       placeholder="Disease Type (e.g. Diabetes)"
                                       name="diseaseType" id="diseaseType">
                            </div>


                        </div>

                        <input type="submit" name="newPatientBtn" value="Create Patient Profile" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px;">
                    </form>
                </div>

                <!--                //Doctor List-->
                <div class="tab-pane fade " id="list-doc" role="tabpanel" aria-labelledby="list-home-list">


                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Doctor ID</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT USER.USER_ID,USER.EMAIL,USER.PHONE_NUM,DOCTOR.NAME,DOCTOR.ROLE,DOCTOR.DEPARTMENT_NAME FROM USER,DOCTOR WHERE USER.USER_ID=DOCTOR.USER_ID;";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $docID = $row['USER_ID'];
                            $docName = $row['NAME'];
                            $role = $row['ROLE'];
                            $deptName = $row['DEPARTMENT_NAME'];
                            $email = $row['EMAIL'];
                            $contact = $row['PHONE_NUM'];
                            echo "<tr>
            <td>$docID</td>
            <td>$docName</td>
            <td>$role</td>
            <td>$deptName</td>
            <td>$email</td>
            <td>$contact</td>
            </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                    <br>
                </div>

                <!--       create appointment          -->
                <div class="tab-pane fade" id="list-createAppoint" role="tabpanel"
                     aria-labelledby="list-createAppoint-list">
                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">


                            <input type="hidden" name="userID" value="<?php echo $userid ?>">

                            <div class="col-md-4"><label for="doctor">Doctors:</label></div>

                            <div class="col-md-8 form-control">
                                <select name="doctor" class="form-control" id="doctor" required="required">
                                    <option value="" disabled selected>Select Doctor</option>
                                    <?php
                                    global $con;
                                    $query = "select * from DOCTOR";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $doctorID = $row['USER_ID'];
                                        $doctorName = $row['NAME'];
                                        $doctorRole = $row['ROLE'];
                                        $deptName = $row['DEPARTMENT_NAME'];
                                        echo "<option value=$row[USER_ID]>$row[NAME]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <br/><br/>


                            <div class="col-md-4"><label>Appointment Date</label></div>
                            <div class="col-md-8 form-control"><input type="date" class="form-control datepicker" name="appDate">
                            </div>
                            <br><br>

                            <div class="col-md-4"><label>Appointment Time</label></div>
                            <div class="col-md-8 form-control">

                                <select name="appTime" class="form-control" id="appTime" required="required">
                                    <option value="" disabled selected>Select Time</option>
                                    <option value="08:00:00">8:00 AM</option>
                                    <option value="10:00:00">10:00 AM</option>
                                    <option value="12:00:00">12:00 PM</option>
                                    <option value="14:00:00">2:00 PM</option>
                                    <option value="16:00:00">4:00 PM</option>
                                </select>

                            </div>
                            <br><br>

                            <div class="col-md-4">
                                <input type="submit" name="createAppBtn" value="Create Appointment"
                                       class="btn btn-primary">
                            </div>
                            <div class="col-md-8"></div>
                        </div>
                    </form>
                </div>

                <!--                admission-->
                <div class="tab-pane fade" id="list-admission" role="tabpanel"
                     aria-labelledby="list-admission-list">
                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">


                            <input type="hidden" name="userID" value="<?php echo $userid ?>">

                            <div class="col-md-4"><label for="roomAvail">Rooms Available:</label></div>

                            <div class="col-md-8 form-control">
                                <select name="roomAvail" class="form-control" id="roomAvail" required="required">
                                    <option value="" disabled selected>Select Room</option>
                                    <?php
                                    global $con;
                                    $query = "select * from ROOM";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $roomID = $row['ROOM_ID'];
                                        $roomNo = $row['ROOM_NO'];
                                        $roomType = $row['ROOM_TYPE'];
                                        $roomCapacity = $row['ROOM_CAPACITY'];
                                        $preferences = $row['PREFERENCES'];
                                        echo "<option value=$row[ROOM_ID]>$row[ROOM_TYPE]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <br/><br/>

                            <div class="col-md-4"><label>Admission Date</label></div>
                            <div class="col-md-8 form-control"><input type="date" class="form-control datepicker" name="appDate">
                            </div>
                            <br><br>

                            <div class="col-md-4"><label>Doctor Pref</label></div>
                            <div class="col-md-8 form-control"><input type="text" class="form-control " name="docPref">
                            </div>
                            <br><br>

                            <div class="col-md-4"><label>Patient Pref</label></div>
                            <div class="col-md-8 form-control"><input type="text" class="form-control " name="patientPref">
                            </div>
                            <br><br>

                        </div>
                        <input type="submit" name="admissionBtn" value="Request Admission"
                               class="btn btn-primary" style="margin-top: 10px;margin-bottom: 20px">

                    </form>
                </div>

                <!--    appointment history          //-->
                <div class="tab-pane fade" id="list-history" role="tabpanel"
                     aria-labelledby="list-history-list">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Doctor ID</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Appointment Date</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                        $query = "SELECT * FROM APPOINTMENT WHERE USER_ID = '$userid';";
                        $query1 = "SELECT NAME FROM DOCTOR WHERE USER_ID ='$doctorID';";
                        $result = mysqli_query($con, $query);
                        $result1 = mysqli_query($con, $query1);
                        while ($row = mysqli_fetch_array($result)) {
                            while ($row1 = mysqli_fetch_array($result1)) {
                                $doctorName = $row1['NAME'];
                            }
                            $docID = $row['DOCTOR_ID'];
                            $appDate = $row['APPOINTMENT_DATE'];

                            echo "<tr>
            <td>$docID</td>
            <td>$doctorName</td>
            <td>$appDate</td>
            
           

            </tr>";

                        }

                        ?>
                        </tbody>
                    </table>

                    <!--                    ADMISSON -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Room ID</th>
                            <th scope="col">Admission Date</th>
                            <th scope="col">Doctor Preferences</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                        $query = "SELECT * FROM ADMISSION WHERE USER_ID = '$userid';";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {

                            $roomID = $row['ROOM_ID'];
                            $appDate = $row['ADMISSION_DATE'];
                            $doctorPref = $row['DOCTOR_PREF'];

                            echo "<tr>
            <td>$roomID</td>
            <td>$appDate</td>
            <td>$doctorPref</td>
            
         
            </tr>";

                        }

                        ?>
                        </tbody>
                    </table>


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
        function showAlert() {
            alert("Please create patient profile for first time login.")
        }

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