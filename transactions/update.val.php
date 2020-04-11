<?php
$validate_usertype_error = $validate_status_error = $validate_input_error_mname = $validate_input_error_gurdian = $validate_number_error = $validate_civilstatus_error = $validate_input_name_error_lastname = $validate_input_name_error_firstname = $validate_address_error_pb = $validate_address_error = $validate_email_error = $validate_course_error = $validate_yearlevel_error = $validate_school_year_error = 0;
global $form_error;

if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $picture = $_POST['picture'];
    $uname = $_POST['username'];
    $usertype = $_POST['Usertype'];
    $status = $_POST['status'];

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

    if ($form_error == 0) {
        $sql = "UPDATE users set usertype = '$usertype', status = '$status' where userid = '$userid'";
        mysqli_query($conn, $sql);
        // id student
        $sql = "UPDATE student set lastname = '$lname', firstname = '$fname', middlename = '$mname', 
        dob = '$DOB', gender = '$gender', place_of_birth = '$PlaceOfBirth', civil_status = '$civilStatus', 
        guardian = '$guardian', address = '$address', email = '$email', contact_number = '+63$contact_Number', 
        year_level = '$yearlevel', course = '$course', school_year = '$year1 - $year2' where userid = '$userid'";
        var_dump(mysqli_query($conn, $sql));
        $form_error = 0;
        header('location:home.php?user=admin');
    }

} elseif (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    $sql_query_userid = "SELECT * from users join student on users.userid = student.userid where users.userid = $userid";
    $row = mysqli_query($conn, $sql_query_userid);
    $result = mysqli_fetch_assoc($row);

    $picture = $result['profilePic'];
    $uname = $result['username'];
    $pass = $result['password'];
    $usertype = $result['usertype'];
    $status = $result['status'];

    $lname = $result['lastname'];
    $fname = $result['firstname'];
    $mname = $result['middlename'];
    $DOB = $result['dob'];
    $PlaceOfBirth = $result['place_of_birth'];
    $gender = $result['gender'];
    $civilStatus = $result['civil_status'];
    $guardian = $result['guardian'];
    $address =$result['address'];
    $email = $result['email'];
    $yearlevel = $result['year_level'];
    $course = $result['course'];
    $contact_Number = substr($result['contact_number'], 3);
    $year1 = substr($result['school_year'], 0, 4);
    $year2 = substr($result['school_year'], 7, 11);
}
