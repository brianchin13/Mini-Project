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


//login function
if (isset($_POST['loginbtn'])) {
    $id = $_POST['loginid'];
    $password = $_POST['password'];
    $query = "select * from USER where LOGIN_ID='$id' and LOGIN_PW='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $_SESSION['ID'] = $row['USER_ID'];
            $_SESSION['NAME'] = $row['NAME'];
            $_SESSION['EMAIL'] = $row['EMAIL'];
            $_SESSION['ADDRESS'] = $row['ADDRESS'];
            $_SESSION['DOB'] = $row['DOB'];
            $_SESSION['CONTACT'] = $row['PHONE_NUM'];
            $_SESSION['AGE'] = $row['AGE'];
            $_SESSION['GENDER'] = $row['GENDER'];
            $_SESSION['IDENTITY NUMBER'] = $row['IC_NUM'];
            $_SESSION['FOREIGNER'] = $row['FOREIGNER'];
            $_SESSION['PASSPORT NUMBER'] = $row['PASSPORT_NUM'];
            $_SESSION['ROLE'] = $row['ROLE'];

        }
        if ($_SESSION['ROLE'] == 'ADMIN') {
            echo("<script>alert('Login Successfully!');
          window.location.href = 'staffDash.php';</script>");
        } else if ($_SESSION['ROLE'] == 'DOCTOR') {
            echo("<script>alert('Login Successfully!');
          window.location.href = 'doctorDash.php';</script>");
        } else if ($_SESSION['ROLE'] == 'PATIENT') {
            echo("<script>alert('Login Successfully!');
          window.location.href = 'dashboard.php';</script>");
        }

    } else {
        echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'login.html';</script>");

    }
}//end login function

//register function for patient
if (isset($_POST['registerBtn'])) {
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $icnum = $_POST['ic_num'];
    $email = $_POST['email'];
    $loginID = $_POST['loginID'];
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];
    $address = $_POST['address'];
    $phNum = $_POST['phoneNum'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $role = "PATIENT";
    $foreigner = $_POST['foreigner'];
    $passportNum = $_POST['passportNum'];


    if ($password == $cpassword) {
        $query = "insert into USER(USER_ID,NAME,LOGIN_ID,LOGIN_PW,EMAIL,ADDRESS,DOB,PHONE_NUM,AGE,GENDER,IC_NUM,FOREIGNER,PASSPORT_NUM,ROLE) 
values ('$userID','$name','$loginID','$password','$email','$address','$dob','$phNum','$age','$gender','$icnum','$foreigner','$passportNum','$role');";


        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['ID'] = $_POST['userID'];
            $_SESSION['NAME'] = $_POST['name'];
            $_SESSION['LOGIN_ID'] = $_POST['loginID'];
            $_SESSION['LOGIN_PW'] = $_POST['password'];
            $_SESSION['EMAIL'] = $_POST['email'];
            $_SESSION['ADDRESS'] = $_POST['address'];
            $_SESSION['DOB'] = $_POST['dob'];
            $_SESSION['CONTACT'] = $_POST['phoneNum'];
            $_SESSION['AGE'] = $_POST['age'];
            $_SESSION['GENDER'] = $_POST['gender'];
            $_SESSION['IDENTITY NUMBER'] = $_POST['ic_num'];
            $_SESSION['FOREIGNER'] = $_POST['foreigner'];
            $_SESSION['PASSPORT NUMBER'] = $_POST['passportNum'];
            $_SESSION['ROLE'] = $_POST['role'];

            echo("<script>alert('Sign up successful !');
          window.location.href = 'dashboard.php';</script>");
        }
    } else {
        echo("<script>alert('Password does not match. Try Again!');
          window.location.href = 'login.php';</script>");
    }
}//end funct

//update profile function
if (isset($_POST['updateProfBtn'])) {

    $name = $_POST['fullName'];
    $icnum = $_POST['ic_num'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phNum = $_POST['phoneNum'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $foreigner = $_POST['foreigner'];
    $passportNum = $_POST['passportNum'];


    $query = "UPDATE USER set NAME='$name', IC_NUM='$icnum', EMAIL='$email', ADDRESS='$address',DOB='$dob',AGE='$age',FOREIGNER='$foreigner',PASSPORT_NUM='$passportNum' where USER_ID='$userid';";
    $result = mysqli_query($con, $query);

    if ($result) {

        $_SESSION['NAME'] = $name;
        $_SESSION['EMAIL'] = $email;
        $_SESSION['ADDRESS'] = $address;
        $_SESSION['DOB'] = $dob;
        $_SESSION['CONTACT'] = $phNum;
        $_SESSION['AGE'] = $age;
        $_SESSION['IDENTITY NUMBER'] = $icnum;
        $_SESSION['FOREIGNER'] = $foreigner;
        $_SESSION['PASSPORT NUMBER'] = $passportNum;

        if ($role == "PATIENT") {
            echo("<script>alert('Profile update successful !');
          window.location.href = 'dashboard.php';</script>");

        } else if ($role == "DOCTOR") {
            echo("<script>alert('Profile update successful !');
          window.location.href = 'doctorDash.php';</script>");

        } else if ($role == "ADMIN") {
            echo("<script>alert('Profile update successful !');
          window.location.href = 'staffDash.php';</script>");

        }
    } else {
        echo("<script>alert('Profile update failed !');</script>");
    }
}

//insert doctor function
if (isset($_POST['addDoctBtn'])) {

    $doctorID = $_POST['doctorID'];
    $doctorName = $_POST['doctorName'];
    $docIc = $_POST['ic_num'];
    $email = $_POST['email'];
    $loginID = $_POST['loginID'];
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];
    $address = $_POST['address'];
    $phNum = $_POST['phoneNum'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $role = "DOCTOR";
    $foreigner = $_POST['foreigner'];
    $passportNum = $_POST['passportNum'];
    $doctorRole = $_POST['special'];
    $department = $_POST['deptName'];

    if ($password == $cpassword) {
        $query = "insert into USER(USER_ID,NAME,LOGIN_ID,LOGIN_PW,EMAIL,ADDRESS,DOB,PHONE_NUM,AGE,GENDER,IC_NUM,FOREIGNER,PASSPORT_NUM,ROLE) 
values ('$doctorID','$doctorName','$loginID','$password','$email','$address','$dob','$phNum','$age','$gender','$docIc','$foreigner','$passportNum','$role');";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query2 = "insert into DOCTOR(USER_ID,NAME,ROLE,DEPARTMENT_NAME) values ('$doctorID','$doctorName','$doctorRole','$department');";
            $result2 = mysqli_query($con, $query2);
            if ($result2) {

                echo("<script>alert('Doctor added successfully !');
          window.location.href = 'staffDash.php';</script>");
            }
        }
    }
    echo "<script>alert('Fail to add doctor !');</script>";

}

//funtion to delete facility
if (isset($_POST['delAdminBtn'])) {
    $admin = $_POST['delAdmin'];
    $query = "delete from ADMIN where USER_ID='$admin';";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo("<script>alert('Admin removed successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {
        echo("<script>alert('Error removing admin !');
          window.location.href = 'staffModule.php';</script>");
    }
}

//insert admin function
if (isset($_POST['addAdminBtn'])) {

    $adminID = $_POST['adminID'];
    $adminName = $_POST['adminName'];
    $adminIc = $_POST['ic_num'];
    $email = $_POST['email'];
    $loginID = $_POST['loginID'];
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];
    $address = $_POST['address'];
    $phNum = $_POST['phoneNum'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $role = "ADMIN";
    $foreigner = $_POST['foreigner'];
    $passportNum = $_POST['passportNum'];
    $department = $_POST['deptName'];

    if ($password == $cpassword) {
        $query = "insert into USER(USER_ID,NAME,LOGIN_ID,LOGIN_PW,EMAIL,ADDRESS,DOB,PHONE_NUM,AGE,GENDER,IC_NUM,FOREIGNER,PASSPORT_NUM,ROLE) 
values ('$adminID','$adminName','$loginID','$password','$email','$address','$dob','$phNum','$age','$gender','$adminIc','$foreigner','$passportNum','$role');";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query2 = "insert into ADMIN(USER_ID,NAME,DEPARTMENT_NAME) values ('$adminID','$adminName','$department');";
            $result2 = mysqli_query($con, $query2);
            if ($result2) {

                echo("<script>alert('Admin added successfully !');
          window.location.href = 'staffDash.php';</script>");
            }
        }
    }
    echo "<script>alert('Fail to add admin !');</script>";

}

//delete doctor
if (isset($_POST['delDocBtn'])) {
    $doctorID = $_POST['delDoctor'];
    $query = "delete from USER where USER_ID='$doctorID';";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo("<script>alert('Doctor removed successfully!');
          window.location.href = 'staffDash.php';</script>");
    } else {
        echo("<script>alert('Fail to delete!');
          window.location.href = 'staffDash.php';</script>");
    }
}

//function to add food
if (isset($_POST['addFoodBtn'])) {

    $foodName = $_POST['foodName'];
    $foodType = $_POST['foodType'];
    $price = $_POST['price'];
    $avail = $_POST['avail'];

    $query = "INSERT INTO MEALS (FOOD_NAME,FOOD_TYPE,FOOD_PRICE,FOOD_AVAILABILITY)VALUES ('$foodName','$foodType','$price','$avail');";
    $result = mysqli_query($con, $query);
    if ($result) {

        $_SESSION['foodName'] = $foodName;
        $_SESSION['foodType'] = $foodType;
        $_SESSION['price'] = $price;
        $_SESSION['avail'] = $avail;

        echo("<script>alert('Meal added successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {
        echo("<script>alert('Error adding food!');
          window.location.href = 'staffModule.php';</script>");
    }
}

//funtion to delete food
if (isset($_POST['delFoodBtn'])) {
    $food2Del = $_POST['delFood'];
    $query = "delete from meals where FOOD_ID='$food2Del';";
    $result2 = mysqli_query($con, $query);
    if ($result2) {
        echo("<script>alert('Meal deleted successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {
        echo("<script>alert('Error deleting meal!');
          window.location.href = 'staffModule.php';</script>");
    }
}

//function to add facilities
if (isset($_POST['addFacBtn'])) {

    $facName = $_POST['facName'];
    $avail = $_POST['facAvail'];

    $query = "INSERT INTO FACILITIES(FACILITIES_NAME,AVAILABILITY)VALUES ('$facName','$avail');";
    $result = mysqli_query($con, $query);
    if ($result) {

        $_SESSION['facName'] = $facName;
        $_SESSION['avail'] = $avail;

        echo("<script>alert('Facilities added successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {
        echo("<script>alert('Error adding facility!');
          window.location.href = 'staffModule.php';</script>");
    }
}

//funtion to delete facility
if (isset($_POST['delFacBtn'])) {
    $facility = $_POST['delFac'];
    $query = "delete from FACILITIES where FACILITIES_ID='$facility';";
    $result2 = mysqli_query($con, $query);
    if ($result2) {
        echo("<script>alert('Facility removed successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {
        echo("<script>alert('Error removing facility!');
          window.location.href = 'staffModule.php';</script>");
    }
}

//function creating room
if (isset($_POST['createRoomBtn'])) {

    $roomID = $_POST['roomID'];
    $roomNo = $_POST['roomNo'];
    $roomType = $_POST['roomType'];
    $roomCapacity = $_POST['roomCapacity'];
    $preferences = $_POST['preferences'];

    $query = "INSERT INTO ROOM (ROOM_ID,ROOM_NO,ROOM_TYPE,ROOM_CAPACITY,PREFERENCES)VALUES ('$roomID','$roomNo','$roomType','$roomCapacity','$preferences');";
    $result = mysqli_query($con, $query);
    if ($result) {

        $_SESSION['roomID'] = $roomID;
        $_SESSION['roomNo'] = $roomNo;
        $_SESSION['roomType'] = $roomType;
        $_SESSION['roomCapacity'] = $roomCapacity;
        $_SESSION['preferences'] = $preferences;

        echo("<script>alert('Room create successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {
        echo("<script>alert('Error creating room!');
          window.location.href = 'staffModule.php';</script>");
    }

}

//function to delete room
if (isset($_POST['delRoomBtn'])) {
    $roomID = $_POST['delRoom'];

    $query = "delete from ROOM where ROOM_ID='$roomID';";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo("<script>alert('Room removed successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {
        echo("<script>alert('Error removing room!');
          window.location.href = 'staffModule.php';</script>");
    }
}

//function creating patient
if (isset($_POST['newPatientBtn'])) {

    $patientID = $_POST['patientUID'];
    $gender = $_POST['patientGender'];
    $name = $_POST['patientName'];
    $icnum = $_POST['patientIC'];
    $patientType = $_POST['patientType'];
    $address = $_POST['address'];
    $dob = $_POST['patientDOB'];
    $passportNum = $_POST['passportNum'];
    $diseaseType = $_POST['diseaseType'];


    $query = "INSERT INTO PATIENT (USER_ID,PATIENT_NAME,PATIENT_TYPE,PATIENT_IC,PASSPORT_NUM,DOB,GENDER,ADDRESS,DISEASE_TYPE)VALUES('$patientID','$name','$patientType','$icnum','$passportNum','$dob','$gender','$address','$diseaseType');";
    $result = mysqli_query($con, $query);

    if ($result) {

        echo("<script>alert('Patient Profile created successfully !');
          window.location.href = 'patientModule.php';</script>");

    } else {

//        echo("<script>console.log('$patientID','$name','$patientType','$icnum','$passportNum','$dob','$gender','$address','$diseaseType');</script>");
        echo("<script>alert('Error creating Patient Profile !');
          window.location.href = 'patientModule.php';</script>");


    }
}

//function creating appointment
if (isset($_POST['createAppBtn'])) {

    $useriD = $_POST['userID'];
    $doctoriD = $_POST['doctor'];
    $appDate = $_POST['appDate'];
    $appTime = $_POST['appTime'];

    $query = "INSERT INTO APPOINTMENT (USER_ID,DOCTOR_ID,APPOINTMENT_DATE,APPOINTMENT_TIME)VALUES ('$useriD','$doctoriD','$appDate','$appTime');";
    $result = mysqli_query($con, $query);

    if ($result) {

        echo("<script>alert('Appointment create successful !');
          window.location.href = 'patientModule.php';</script>");
    } else {
        echo("<script>alert('Error creating appointment!');
          window.location.href = 'patientModule.php';</script>");
    }

}

//function to creat admission
if (isset($_POST['admissionBtn'])) {

    $useriD = $_POST['userID'];
    $roomID = $_POST['roomAvail'];
    $appDate = $_POST['appDate'];
    $docPref = $_POST['docPref'];
    $patientPref = $_POST['patientPref'];

    $query = "INSERT INTO ADMISSION (USER_ID,ROOM_ID,ADMISSION_DATE,DOCTOR_PREF,PATIENT_PREF)VALUES ('$useriD','$roomID','$appDate','$docPref','$patientPref');";
    $result = mysqli_query($con, $query);

    if ($result) {


        echo("<script>alert('Request successful !');
          window.location.href = 'patientModule.php';</script>");
    } else {
        echo("<script>alert('Error requesting!');
          window.location.href = 'patientModule.php';</script>");
    }
}

//function discharge
if (isset($_POST['dischargeBtn'])) {


    $dischargeID = $_POST['dischargeID'];
    $treatment = $_POST['treatment'];
    $dischargeDate = $_POST['dischargeDate'];
    $dischargeAgreement = $_POST['dischargeAgreement'];
    $dischargeRoomID = $_POST['dischargeRoomID'];

    // <!--                    USER_ID	BILLING_ID	DISCHARGE_ID	BILLING_AMOUNT	PAYMENT_DATE	ACCOMODATION_CHARGE	ROOM_TYPE	INSURANCE_ID-->

    $query = "INSERT INTO DISCHARGE (DISCHARGE_ID,DISCHARGE_DATE,DISCHARGE_AGREEMENT,TREATEMENT,ROOM_ID)VALUES ('$dischargeID','$dischargeDate','$dischargeAgreement','$treatment','$dischargeRoomID');";
    $result = mysqli_query($con, $query);

    if ($result) {

        echo("<script>alert('Request successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {

        echo("<script>alert('Error requesting!');
          window.location.href = 'staffModule.php';</script>");
    }
}

//function billing
if (isset($_POST['billingBtn'])) {

    $useriD = $_POST['billingUser'];
    $billingID = $_POST['billingID'];
    $dischargeID = $_POST['dischargeID'];
    $billingAmount = $_POST['billingAmount'];
    $paymentDate = $_POST['paymentDate'];
    $accommodationCharge = $_POST['accommodationCharge'];
    $roomType = $_POST['roomType'];
    $insuranceID = $_POST['insuranceID'];

    $query = "INSERT INTO BILLING (USER_ID,BILLING_ID,DISCHARGE_ID,BILLING_AMOUNT,PAYMENT_DATE,ACCOMODATION_CHARGE,ROOM_TYPE,INSURANCE_ID)VALUES ('$useriD','$billingID','$dischargeID','$billingAmount','$paymentDate','$accommodationCharge','$roomType','$insuranceID');";
    $result = mysqli_query($con, $query);

    if ($result) {

        echo("<script>alert('Billing successful !');
          window.location.href = 'staffModule.php';</script>");
    } else {

        echo("<script>alert('Error billing!');
          window.location.href = 'staffModule.php';</script>");
    }
}


//new disease
if (isset($_POST['newDiseaseBtn'])) {

    $useriD = $_POST['doctorUID'];
    $diseaseName = $_POST['diseaseName'];
    $diseaseDesc = $_POST['diseaseDesc'];
    $diseaseType = $_POST['diseaseType'];

    $query = "INSERT INTO DISEASE (USER_ID,DISEASE_NAME,DISEASE_DESC,DISEASE_TYPE)VALUES ('$useriD','$diseaseName','$diseaseDesc','$diseaseType');";
    $result = mysqli_query($con, $query);

    if ($result) {

        echo("<script>alert('New Disease insert successful !');
          window.location.href = 'doctorModule.php';</script>");
    } else {
        echo("<script>alert('Error inserting!');
          window.location.href = 'doctorModule.php';</script>");
    }
}




