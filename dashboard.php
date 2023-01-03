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
    <title>Medic User Dashboard</title>

    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">


</head>

<div class="page-wrapper">

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
                    <li class="active">
                        <a href="dashboard.php">Profile</a>
                    </li>
                    <li>
                        <a href="patientModule.php">Patient Menu</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!--End Main Header -->
    <body onload="checkforeign()">
    <div class="container" style="padding-top: 20px; padding-bottom: 20px">
        <form method="post" action="backend.php">
            <div class="form-header">User Profile</div>

            <div class="form-grp">
                <label>USER ID</label>
                <input type="text" placeholder="<?php echo $userid ?>" value="<?php echo $userid ?>" readonly>
            </div>
            <div class="form-grp">
                <label>Full name</label>
                <input type="text" placeholder="<?php echo $name ?>" value="<?php echo $name ?>" name="fullName"/>
            </div>

            <div class="form-grp">
                <label>Identity Number</label>
                <input type="text" placeholder="<?php echo $ic_num ?>" value="<?php echo $ic_num ?>" name="ic_num"/>
            </div>

            <div class="form-grp">
                <label>Email</label>
                <input type="text" placeholder="<?php echo $email ?>" value="<?php echo $email ?>" name="email"/>
            </div>

            <div class="form-grp">
                <label>Address</label>
                <input type="text" placeholder="<?php echo $address ?>" value="<?php echo $address ?>" name="address"/>
            </div>

            <div class="form-grp">
                <label>AGE</label>
                <input type="text" placeholder="<?php echo $age ?>" value="<?php echo $age ?>" name="age"/>
            </div>

            <div class="form-grp">
                <label>DOB</label>
                <input type="date" placeholder="<?php echo $dob ?>" value="<?php echo $dob ?>" name="dob"/>
            </div>

            <div class="form-grp">
                <label>Phone Number</label>
                <input type="text" placeholder="<?php echo $contact ?>" value="<?php echo $contact ?>" name="phoneNum"/>
            </div>

            <div class="form-grp">
                <label for="foreigner">Are you a foreigner ?</label>
                <select name="foreigner" id="foreigner" class="col-md-4">

                    <?php if ($foreign === "YES")
                        echo "<option selected='true' value='YES'> YES </option>";
                    else echo "<option value='YES'> YES </option>"; ?>

                    <?php if ($foreign === "NO") echo "<option selected='true' value='NO'> NO </option>";
                    else echo "<option value='NO'> NO </option>"; ?>

                </select>
            </div>

            <div class="form-grp" id="showPassport" style="display: none">
                <label>Passport Num</label>
                <input type="text" placeholder="<?php echo $passport_num ?>" value="<?php echo $passport_num ?>"
                       name="passportNum"/>
            </div>

            <div class="form-grp">
                <input type="submit" value="Update profile" name="updateProfBtn"/>
            </div>
        </form>

    </div>
    </body>

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

</div>

<script>
    document.getElementById("foreigner").addEventListener("change", function () {
        if (this.value === "YES") {
            document.getElementById("showPassport").style.display = "block";
        } else {
            document.getElementById("showPassport").style.display = "none";
            document.getElementById("showPassport").value = "";
        }
    });

    function checkforeign() {
        if (document.getElementById("foreigner").value === "YES") {
            document.getElementById("showPassport").style.display = "block";
        } else {
            document.getElementById("showPassport").style.display = "none";
            document.getElementById("showPassport").value = "";
        }
    }


</script>


</html>

