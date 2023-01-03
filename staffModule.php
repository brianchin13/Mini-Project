<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Hospital_Management");

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
                        <a href="staffDash.php">Profile</a>
                    </li>
                    <li class="active">
                        <a href="staffModule.php">Manage Medic</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    <!--End Main Header -->
    <div class="row">
        <div class="col-md-4" style="max-width:25%;margin-top: 3%;margin-left: 20px;margin-bottom: 3%;">
            <div class="list-group" id="list-tab" role="tablist">

                <a class="list-group-item list-group-item-action active" href="#list-doc" id="list-doc-list" role="tab"
                   aria-controls="home" data-toggle="list">Doctors</a>
                <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list" role="tab"
                   data-toggle="list" aria-controls="home">Patients</a>
                <a class="list-group-item list-group-item-action" onclick="generateDoctorID()" href="#list-addDoc"
                   id="list-adoc-list" role="tab"
                   data-toggle="list" aria-controls="home">Add Doctor</a>
                <a class="list-group-item list-group-item-action" onclick="generateAdminID()" href="#list-addAdmin"
                   id="list-addAdmin-list" role="tab"
                   data-toggle="list" aria-controls="home">Add Admin</a>
                <a class="list-group-item list-group-item-action" onclick="generateRoomID()" href="#list-createRoom"
                   id="list-createRoom-list" role="tab"
                   data-toggle="list" aria-controls="home">Create Room</a>
                <a class="list-group-item list-group-item-action" href="#list-delete" id="list-delete-list" role="tab"
                   data-toggle="list" aria-controls="home">Manager</a>
                <a class="list-group-item list-group-item-action" href="#list-serviceFacilities"
                   id="list-serviceFacilities-list" role="tab"
                   data-toggle="list" aria-controls="home">Service and facilities</a>
                <a class="list-group-item list-group-item-action" href="#list-meal" id="list-meal-list" role="tab"
                   data-toggle="list" aria-controls="home">Meal List</a>
                <a class="list-group-item list-group-item-action" href="#list-discharge"
                   id="list-discharge-list" role="tab"
                   data-toggle="list" aria-controls="home" onclick="generateDischargeID()">Discharge</a>
                <a class="list-group-item list-group-item-action" href="#list-billing"
                   id="list-billing-list" role="tab"
                   data-toggle="list" aria-controls="home" onclick="generateBillingID()">Billing</a>

            </div>
            <br>
        </div>
        <div class="col-md-8" style="margin-top: 3%;">
            <div class="tab-content" id="nav-tabContent" style="width: 950px;">

                <!--                //Doctor List-->
                <div class="tab-pane fade show active" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">


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

                <!--                //Patient List-->
                <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Patient Type</th>
                            <th scope="col">Patient IC</th>
                            <th scope="col">Passport Num</th>
                            <th scope="col">Patient DOB</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Disease Type</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT PATIENT.USER_ID,PATIENT.PATIENT_NAME,PATIENT.PATIENT_TYPE,PATIENT.PATIENT_IC,PATIENT.PASSPORT_NUM,PATIENT.DOB,PATIENT.GENDER,PATIENT.ADDRESS,PATIENT.DISEASE_TYPE,USER.EMAIL,USER.PHONE_NUM FROM PATIENT, USER WHERE USER.USER_ID=PATIENT.USER_ID;";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $patientID = $row['USER_ID'];
                            $patientName = $row['PATIENT_NAME'];
                            $patientType = $row['PATIENT_TYPE'];
                            $patientIC = $row['PATIENT_IC'];
                            $passportNum = $row['PASSPORT_NUM'];
                            $dob = $row['DOB'];
                            $gender = $row['GENDER'];
                            $address = $row['ADDRESS'];
                            $diseaseType = $row['DISEASE_TYPE'];
                            $email = $row['EMAIL'];
                            $contact = $row['PHONE_NUM'];


                            echo "<tr>
            <td>$patientID</td>
            <td>$patientName</td>
            <td>$patientType</td>
            <td>$patientIC</td>
            <td>$passportNum</td>
            <td>$dob</td>
            <td>$gender</td>
            <td>$address</td>
            <td>$email</td>
            <td>$contact</td>
             <td>$diseaseType</td>
            </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                    <br>
                </div>

                <!--                Add Doctor-->
                <div class="tab-pane fade" id="list-addDoc" role="tabpanel" aria-labelledby="list-addDoc-list">
                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">

                            <input type="hidden" value=doctorID name="doctorID" id="doctorID">

                            <div class="group input-group">
                                <label class="col-md-4" for="name">Enter doctor full name</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Name" name="doctorName"
                                       id="name" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="ic_num">Enter doctor IC number</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Identity card no."
                                       name="ic_num" id="ic_num" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="email">Enter doctor email</label>
                                <input class="col-md-8 form-control" type="email" placeholder="Email" name="email"
                                       id="email" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="loginid">Enter doctor Login ID</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Login ID" name="loginID"
                                       id="loginID" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="password">Enter doctor password</label>
                                <input class="col-md-8 form-control" type="password" placeholder="Password"
                                       name="password" id="password" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="password">Reenter password</label>
                                <input class="col-md-8 form-control" type="password" placeholder="Confirm Password"
                                       name="cPassword" id="cPassword" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="address">Enter doctor address</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Address" name="address"
                                       id="address" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="phoneNum">Enter doctor phone number</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Phone Number (without -)"
                                       name="phoneNum" id="phoneNum" required>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="dob" class="col-md-4 control-label">Select doctor
                                    birthday</label>
                                <input class="col-md-8 form-control" type="date" name="dob" id="dob" required>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="age">Enter doctor age</label>
                                <input class="col-md-8 form-control" type="number" placeholder="Age" name="age" id="age"
                                       required>
                            </div>

                            <div class="group input-group selectGrp">
                                <div class="col-md-4"> <label  for="gender" ">Select doctor
                                    gender</label></div>
                                <div class="col-md-8 form-control">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>

                            </div>

                            <div class="group input-group selectGrp">

                                <div class="col-md-4"> <label for="foreigner" >
                                        Foreigner: </label></div>
                                <div class="col-md-8 form-control">
                                    <select class="form-control" name="foreigner" id="foreigner">
                                        <option value="YES">Yes</option>
                                        <option value="NO" SELECTED>No</option>
                                    </select>
                                </div>

                            </div>

                            <div class="group input-group" id="passportNo" style="display: none">
                                <label class="col-md-4" for="passportNum">Enter doctor passport number</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Passport Number"
                                       name="passportNum" id="passportNum">
                            </div>

                            <div class="group input-group">
                                <div class="col-md-4"><label>Specialization:</label></div>
                                <div class="col-md-8 form-control">
                                    <select name="special" class="form-control"  id="special" required="required">
                                        <option value="head" name="spec" disabled selected>Select Specialization
                                        </option>
                                        <option value="GENERAL" name="spec">General</option>
                                        <option value="SPECIALIST" name="spec">Specialist</option>
                                        <option value="CONSULTANT" name="spec">Consultant</option>
                                    </select>
                                </div>
                            </div>

                            <div class="group input-group">
                                <div class="col-md-4"><label>Department:</label></div>
                                <div class="col-md-8 form-control" >
                                    <select name="deptName" class="form-control" id="deptName" required="required">
                                        <option value="head" name="spec" disabled selected>Select department
                                        </option>
                                        <option value="General" name="spec">General</option>
                                        <option value="Cardiologist" name="spec">Cardiologist</option>
                                        <option value="Neurologist" name="spec">Neurologist</option>
                                        <option value="Pediatrician" name="spec">Pediatrician</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="submit" name="addDoctBtn" value="Add Doctor" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px;">
                    </form>
                </div>

                <!--                Add Admin-->
                <div class="tab-pane fade" id="list-addAdmin" role="tabpanel" aria-labelledby="list-addAdmin-list">
                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">

                            <input type="hidden" value=adminID name="adminID" id="adminID">

                            <div class="group input-group">
                                <label class="col-md-4" for="name">Enter admin full name</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Name" name="adminName"
                                       id="name" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="ic_num">Enter admin IC number</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Identity card no."
                                       name="ic_num" id="ic_num" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="email">Enter admin email</label>
                                <input class="col-md-8 form-control" type="email" placeholder="Email" name="email"
                                       id="email" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="loginID">Enter admin Login ID</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Login ID" name="loginID"
                                       id="loginID" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="password">Enter admin Login password</label>
                                <input class="col-md-8 form-control" type="password" placeholder="Password"
                                       name="password" id="password" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="password">Reenter password</label>
                                <input class="col-md-8 form-control" type="password" placeholder="Confirm Password"
                                       name="cPassword" id="cPassword" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="address">Enter admin address</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Address" name="address"
                                       id="address" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="phoneNum">Enter admin phone number</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Phone Number (without -)"
                                       name="phoneNum" id="phoneNum" required>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="dob" class="col-md-4 control-label">Select admin
                                    DOB</label>
                                <input class="col-md-8 form-control" type="date" name="dob" id="dob" required>
                            </div>

                            <div class="group input-group">
                                <label class="col-md-4" for="age">Enter admin age</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Age" name="age" id="age"
                                       required>
                            </div>


                            <div class="group input-group selectGrp">
                                <div class="col-md-4"> <label  for="gender" ">Select admin
                                    gender</label></div>
                                <div class="col-md-8 form-control">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>

                            </div>

                            <div class="group input-group selectGrp">

                                <div class="col-md-4"> <label for="foreigner" >
                                        Foreigner: </label></div>
                                <div class="col-md-8 form-control">
                                    <select class="form-control" name="foreigner" id="foreigner">
                                        <option value="YES">Yes</option>
                                        <option value="NO" SELECTED>No</option>
                                    </select>
                                </div>

                            </div>


                            <div class="group input-group" id="passportNo" style="display: none">
                                <label class="col-md-4" for="passportNum">Enter admin passport number</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Passport Number"
                                       name="passportNum" id="passportNum">
                            </div>

                            <div class="group input-group">
                                <div class="col-md-4"><label>Department:</label></div>
                                <div class="col-md-8 form-control">
                                    <select name="deptName" class="form-control" id="deptName" required="required">
                                        <option value="head" name="spec" disabled selected>Select department
                                        </option>
                                        <option value="General" name="spec">General</option>
                                        <option value="Management" name="spec">Management</option>
                                        <option value="Security" name="spec">Security</option>
                                        <option value="Admin" name="spec">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="addAdminBtn" value="Add Admin" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px;">
                    </form>
                </div>

                <!--           create room-->
                <div class="tab-pane fade" id="list-createRoom" role="tabpanel" aria-labelledby="list-createRoom-list">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Room ID</th>
                            <th scope="col">Room No</th>
                            <th scope="col">Room Type</th>
                            <th scope="col">Room Capacity</th>
                            <th scope="col">Preferences</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                        $query = "SELECT * FROM ROOM;";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {

                            $roomID = $row['ROOM_ID'];
                            $roomNo = $row['ROOM_NO'];
                            $roomType = $row['ROOM_TYPE'];
                            $roomCapacity = $row['ROOM_CAPACITY'];
                            $preferences = $row['PREFERENCES'];

                            echo "<tr>
            <td>$roomID</td>
            <td>$roomNo</td>
            <td>$roomType</td>
            <td>$roomCapacity</td>
            <td>$preferences</td>
           

            </tr>";
                        }

                        ?>
                        </tbody>
                    </table>


                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">

                            <input type="hidden" value="" name="roomID" id="roomID">

                            <div class="group input-group">
                                <label class="col-md-4" for="roomNo">ROOM_NO</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Room No" name="roomNo"
                                       id="roomNo" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="roomType">ROOM_TYPE</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Room Type"
                                       name="roomType" id="roomType" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="roomCapacity">ROOM_CAPACITY</label>
                                <input class="col-md-8 form-control" type="number" placeholder="Room Capacity (PAX)"
                                       name="roomCapacity"
                                       id="roomCapacity" required>
                            </div>
                            <div class="group input-group">
                                <label class="col-md-4" for="preferences">PREFERENCES</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Preferences"
                                       name="preferences"
                                       id="preference" required>
                            </div>
                        </div>

                        <input type="submit" name="createRoomBtn" value="Add Room" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px;">
                    </form>
                </div>

                <!--                Delete -->
                <div class="tab-pane fade" id="list-delete" role="tabpanel" aria-labelledby="list-delete-list">
                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">

                            <div class="col-md-4"><label>Doctor ID:</label></div>
                            <div class="col-md-8"><input type="text" class="form-control" name="delDoctor"
                                                         placeholder="Doctor ID">
                            </div>
                            <br><br>

                        </div>
                        <input type="submit" name="delDocBtn" value="Delete Doctor" class="btn btn-primary"
                               onclick="confirm('Confirm remove doctor from medic ?')"
                               style="margin-top: 10px;margin-bottom: 20px;">

                        <div class="row">

                            <div class="col-md-4"><label>Food ID:</label></div>
                            <div class="col-md-8"><input type="text" class="form-control" name="delFood"
                                                         placeholder="Food ID">
                            </div>
                            <br><br>

                        </div>
                        <input type="submit" name="delFoodBtn" value="Delete Food" class="btn btn-primary"
                               onclick="confirm('Confirm remove food from menu ?')"
                               style="margin-top: 10px;margin-bottom: 20px;">

                        <div class="row">

                            <div class="col-md-4"><label>Facility ID:</label></div>
                            <div class="col-md-8"><input type="text" class="form-control" name="delFac"
                                                         placeholder="Facility ID">
                            </div>
                            <br><br>
                        </div>
                        <input type="submit" name="delFacBtn" value="Delete Facility" class="btn btn-primary"
                               onclick="confirm('Confirm remove facility from medic ?')"
                               style="margin-top: 10px;margin-bottom: 20px;">

                        <div class="row">

                            <div class="col-md-4"><label>Room ID:</label></div>
                            <div class="col-md-8"><input type="text" class="form-control" name="delRoom"
                                                         placeholder="Room ID">
                            </div>
                            <br><br>
                        </div>
                        <input type="submit" name="delRoomBtn" value="Delete Room" class="btn btn-primary"
                               onclick="confirm('Confirm remove room from database ?')"
                               style="margin-top: 10px;margin-bottom: 20px;">

                        <div class="row">

                            <div class="col-md-4"><label>Admin ID:</label></div>
                            <div class="col-md-8"><input type="text" class="form-control" name="delAdmin"
                                                         placeholder="Admin ID">
                            </div>
                            <br><br>
                        </div>
                        <input type="submit" name="delAdminBtn" value="Remove Admin" class="btn btn-primary"
                               onclick="confirm('Confirm remove admin ?')"
                               style="margin-top: 10px;margin-bottom: 20px;">

                    </form>
                </div>

                <!--    Service and facilities          //-->
                <div class="tab-pane fade" id="list-serviceFacilities" role="tabpanel"
                     aria-labelledby="list-serviceFacilities-list">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Facility ID</th>
                            <th scope="col">Facility Name</th>
                            <th scope="col">Availability</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                        $query = "SELECT * FROM FACILITIES;";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {

                            $facID = $row['FACILITIES_ID'];
                            $facName = $row['FACILITIES_NAME'];
                            $avail = $row['AVAILABILITY'];

                            echo "<tr>
            <td>$facID</td>
            <td>$facName</td>
            <td>$avail</td>
           

            </tr>";
                        }

                        ?>
                        </tbody>
                    </table>


                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">
                            <div class="col-md-4"><label>Facility Name:</label></div>
                            <div class="col-md-8 form-control"><input type="text" name="facName" class="form-control" required>
                            </div>

                            <div class="col-md-4"><label>Facility Availability:</label></div>
                            <div class="col-md-8 form-control">
                                <select name="facAvail" class="form-control" id="facAvail" required="required">
                                    <option value="head" name="facAvail" disabled selected>Availability</option>
                                    <option value="YES" name="facAvail">Yes</option>
                                    <option value="NO" name="facAvail">No</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" name="addFacBtn" value="Add Facility" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px">
                    </form>

                </div>

                <!--                Meal List -->
                <div class="tab-pane fade" id="list-meal" role="tabpanel" aria-labelledby="list-meal-list">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Food ID</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Food Type</th>
                            <th scope="col">Food Price (RM)</th>
                            <th scope="col">Food Availability</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                        $query = "SELECT * FROM MEALS;";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {

                            $foodID = $row['FOOD_ID'];
                            $foodName = $row['FOOD_NAME'];
                            $foodType = $row['FOOD_TYPE'];
                            $price = $row['FOOD_PRICE'];
                            $avail = $row['FOOD_AVAILABILITY'];

                            echo "<tr>
            <td>$foodID</td>
            <td>$foodName</td>
            <td>$foodType</td>
            <td>$price</td>
            <td>$avail</td>

            </tr>";
                        }

                        ?>
                        </tbody>
                    </table>


                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">
                            <div class="col-md-4" ><label>Food Name:</label></div>
                            <div class="col-md-8 form-control"><input type="text" class="form-control" name="foodName" required>
                            </div>

                            <div class="col-md-4"><label>Food Type:</label></div>
                            <div class="col-md-8 form-control" >
                                <select name="foodType" class="form-control" id="foodType" required="required">
                                    <option value="head" name="foodType" disabled selected>Select food type</option>
                                    <option value="NORMAL" name="foodType">Normal</option>
                                    <option value="VEGETARIAN" name="foodType">Vegetarian</option>
                                </select>
                            </div>
                            <br><br>
                            <div class="col-md-4"><label>Food Price:</label></div>
                            <div class="col-md-8 form-control"><input type="text" class="form-control" name="price" required></div>

                            <div class="col-md-4"><label>Food Availability:</label></div>
                            <div class="col-md-8 form-control">
                                <select name="avail" class="form-control" id="foodAvail" required="required">
                                    <option value="head" name="avail" disabled selected>Availability</option>
                                    <option value="YES" name="avail">Yes</option>
                                    <option value="NO" name="avail">No</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" name="addFoodBtn" value="Add Food" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px">
                    </form>
                </div>

                <!--                 Discharge -->
                <div class="tab-pane fade" id="list-discharge" role="tabpanel"
                     aria-labelledby="list-billAndDischarge-list">

                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">
                            <input type="hidden" name="dischargeID" value="dischargeID" id="dischargeID">

                            <div class="group input-group" id="dischargeDate">
                                <div class="col-md-4 "><label>Discharge Date</label></div>
                                <div class="col-md-8 form-control"><input type="date" class="form-control datepicker"
                                                             name="dischargeDate">
                                </div>
                            </div>
                            <div class="group input-group" id="dischargeAgreement">
                                <div class="col-md-4"><label>Discharge Agree By: </label></div>
                                <div class="col-md-8 form-control">
                                    <select name="dischargeAgreement" class="form-control" id="dischargeAgreement"
                                    >
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
                            </div>

                            <div class="group input-group" id="treatment">
                                <label class="col-md-4" for="treatment">Treatment:</label>
                                <input class="col-md-8 form-control" type="text" placeholder="Treatment"
                                       name="treatment" id="treatment">
                            </div>

                            <div class="group input-group" id="dischargeRoomID">
                                <label class="col-md-4" for="dischargeRoomID">Discharge Room:</label>
                                <div class="col-md-8 form-control">
                                    <select name="dischargeRoomID" class="form-control" id="dischargeRoomID">
                                        <option value="" disabled selected>Select Room</option>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "Hospital_Management");
                                        $query = "select * from ROOM";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $roomID = $row['ROOM_ID'];
                                            $roomNo = $row['ROOM_NO'];
                                            $roomType = $row['ROOM_TYPE'];
                                            $roomCapacity = $row['ROOM_CAPACITY'];
                                            $preferences = $row['PREFERENCES'];
                                            echo "<option value='$roomID'>$row[ROOM_TYPE]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <input type="submit" name="dischargeBtn" value="Request Discharge" class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px">
                    </form>
                </div>
                <!--                BILLING -->
                <div class="tab-pane fade" id="list-billing" role="tabpanel" aria-labelledby="list-billing-list">
                    <form class="form-group" method="post" action="backend.php">
                        <div class="row">

                            <div class="col-md-4"><label>Select User:</label></div>
                            <div class="col-md-8 form-control">
                                <select name="billingUser" class="form-control" id="billingUser"
                                        required="required">
                                    <option value="" disabled selected>Select User</option>
                                    <?php
                                    global $con;
                                    $query = "select PATIENT.USER_ID,PATIENT.PATIENT_NAME from PATIENT;";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userID = $row['USER_ID'];
                                        $userName = $row['PATIENT_NAME'];
                                        echo "<option value=$row[USER_ID]>$row[PATIENT_NAME]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <input type="hidden" name="billingID" value="billingID" id="billingID">

                            <div class="col-md-4"><label>Select Discharge ID:</label></div>
                            <div class="col-md-8 form-control">
                                <select name="dischargeID" class="form-control" id="dischargeID"
                                        required="required">
                                    <option value="" disabled selected>Discharge ID</option>
                                    <?php
                                    global $con;
                                    $query = "select DISCHARGE.DISCHARGE_ID from DISCHARGE;";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $dischargeID = $row['DISCHARGE_ID'];
                                        echo "<option value='$dischargeID'>$row[DISCHARGE_ID]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4"><label>Billing Amount:</label></div>
                            <div class="col-md-8 form-control"><input type="text" class="form-control" name="billingAmount" required
                                                         placeholder="Billing Amount (RM)">
                            </div>
                            <br><br>
                            <div class="col-md-4"><label>Payment Date:</label></div>
                            <div class="col-md-8 form-control"><input type="date" class="form-control datepicker"
                                                         name="paymentDate">
                            </div>
                            <br><br>

                            <div class="col-md-4"><label>Accommodation Charge:</label></div>
                            <div class="col-md-8 form-control"><input type="text" class="form-control" name="accommodationCharge"
                                                         placeholder="Accommodation Charge (RM)" required></div>
                            <br><br>

                            <div class="col-md-4"><label>Room Type:</label></div>
                            <div class="col-md-8 form-control">
                                <select name="roomType" class="form-control" id="billAndDischargeRoomType"
                                        required="required">
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
                                        echo "<option value='$roomType'>$row[ROOM_TYPE]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4"><label>Insurance ID:</label></div>
                            <div class="col-md-8 form-control"><input type="text" class="form-control" name="insuranceID"
                                                         placeholder="Insurance ID (if applicable) "></div>
                        </div>


                        <input type="submit" name="billingBtn" value="Bill and Discharge"
                               class="btn btn-primary"
                               style="margin-top: 10px;margin-bottom: 20px">
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

        function generateAdminID() {
            var doctorID = "";
            var possible = "0123456789";

            for (var i = 0; i < 3; i++)
                doctorID += possible.charAt(Math.floor(Math.random() * possible.length));

            document.getElementById("adminID").value = "A" + doctorID;
        }

        function generateRoomID() {
            var roomID = "";
            var possible = "0123456789";

            for (var i = 0; i < 3; i++)
                roomID += possible.charAt(Math.floor(Math.random() * possible.length));

            document.getElementById("roomID").value = "R" + roomID;
        }

        function generateBillingID() {
            var billingID = "";
            var possible = "0123456789";

            for (var i = 0; i < 3; i++)
                billingID += possible.charAt(Math.floor(Math.random() * possible.length));

            document.getElementById("billingID").value = "B" + billingID;
        }

        function generateDischargeID() {
            var dischargeID = "";
            var possible = "0123456789";

            for (var i = 0; i < 2; i++)
                dischargeID += possible.charAt(Math.floor(Math.random() * possible.length));

            document.getElementById("dischargeID").value = "DC" + dischargeID;
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