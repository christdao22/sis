<?php
session_start();
$validate_input_error_mname = $validate_input_error_gurdian = $validate_number_error = $validate_civilstatus_error = $validate_input_name_error_lastname = $validate_input_name_error_firstname = $validate_address_error_pb = $validate_address_error = $validate_email_error = $validate_course_error = $validate_yearlevel_error = $validate_school_year_error = 0;
$newdate = '';
global $form_error;
 


if (isset($_POST['submit'])) {

    $lname = strtoupper($_POST['lastname']);
    $fname = strtoupper($_POST['firstname']);
    $mname = strtoupper($_POST['middlename']);
    $DOB = $_POST['dob'];
    $PlaceOfBirth = strtoupper($_POST['pbirth']);
    $gender = $_POST['gender'];
    $civilStatus = $_POST['civilStatus'];
    $guardian = strtoupper($_POST['guardian']);
    $contact_Number = $_POST['cnumber'];
    $address = strtoupper($_POST['address']);
    $email = $_POST['email'];
    $yearlevel = $_POST['yearlevel'];
    $course = $_POST['course'];
    $year1 = $_POST['year1'];
    $year2 = $_POST['year2'];

    // $_SESSION['firstname'] = $fname; 

    $validate_input_name_error_lastname = validateInputName($lname);
    $validate_input_name_error_firstname = validateInputName($fname);
    $validate_input_error_mname = validateInput($mname);
    $validate_input_error_gurdian = validateInput($guardian);
    $newdate = dob($DOB);
    $validate_address_error_pb = validateAddress($PlaceOfBirth);
    $validate_number_error = validateNumber($contact_Number);
    $validate_address_error = validateAddress($address);
    $validate_email_error = validateEmail($email);
    $validate_yearlevel_error = validateSelect($yearlevel);
    $validate_course_error = validateSelect($course);
    $validate_civilstatus_error = validateSelect($civilStatus);
    $validate_school_year_error = validateSchoolYear($year1, $year2);
}

if (isset($_POST['submit'])) {
    if ($form_error == 0) {
         
        $uname = $_SESSION['username']; 
        $pass = $_SESSION['password'];
        $usertype = $_SESSION['usertype'];
        $destination = "upload/" . basename($_SESSION['profile_pic']);

        $sql = "SELECT count(*) as count_username from users where username='$uname'";
        $result = dbquery($sql);
        if ($result['count_username'] == 0) {

            $sql_insert_user = "INSERT INTO users (profilePic, username,password,usertype) VALUES ('$destination', '$uname', '$pass', '$usertype')";
            mysqli_query($conn, $sql_insert_user);
            
            $sql_query_userid = "SELECT userid from users where username = '$uname'";
            $result = dbquery($sql_query_userid);
            $userid = $result['userid'];
            
            $sql_insert_profile = "INSERT into student (userid, lastname, firstname, middlename, dob, gender, place_of_birth, civil_status, guardian, address, email, contact_number, year_level, course ,school_year)
            VALUES ( $userid, '$lname', '$fname', '$mname', '$DOB', '$gender', '$PlaceOfBirth', '$civilStatus', '$guardian', '$address', '$email', '+63$contact_Number', '$yearlevel','$course', '$year1 - $year2')";
            mysqli_query($conn, $sql_insert_profile);
            $form_error = 0;
            header('location:success.php?successfully_created_account');
        }
    }
}










































// create table student
// (    userid int(11) not null,
//     student_id int(11) not null primary key AUTO_INCREMENT,
//     lastname varchar(255) not null,
//     firstname varchar(255) not null,
//      middlename varchar(255) not null,
//      dob date not null,
//      gender varchar(10) not null,
//      place_of_birth varchar(255) not null,
//      civil_status varchar(50) not null,
//      guardian varchar(255) not null,
//      address varchar(255) not null,
//      email varchar(255) not null,
//      contact_number varchar(15) not null,
//      year_level varchar(50) not null,
//      course varchar(50) not null,
//      school_year varchar(50) not null,

//      FOREIGN key (userid) REFERENCES users(userid)
// )

// insert into student
// (userid, lastname, firstname, middlename, dob, gender, place_of_birth, civil_status, guardian, address, email, contact_number, year_level, school_year)

// VALUES
// ()
