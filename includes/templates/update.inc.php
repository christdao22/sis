<title>Update</title>
</head>

<body class="jumbotron jumbotron-fluid bor">
    <div class="container p-0 col-md-7" style="background-color:#2C5364;font-size: 13px">
        <!--background-color:#2C5364;-->
        <?php include 'utilities/dbconnect.util.php'; include 'utilities/validation.util.php'; include 'transactions/update.val.php';?>
        <div class="card-body" style="color:white;">
            <div class="form-group">
                <h4>Edit Profile</h4>
            </div>

            <div class="col-md-10 ml-auto mr-auto">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <div class="form-group">
                        <img class='border border-dark' style="display: block; margin-left: auto; margin-right: auto;"
                            src="<?php echo $picture?>" alt="image" width="240" height='240'>
                        <div>
                            <input name="picture" value="<?PHP echo $picture;?>" hidden>
                        </div>
                    </div>
                    <div>
                        <input name="userid" value="<?PHP echo $userid;?>" hidden>
                    </div>
                    <div class="form-group text-left">
                        <label for="username">Username<span style="color: red;"> *</span></label>
                        <input class="form-control" name="username" type="text" placeholder="Username"
                            value="<?PHP echo $uname;?>" readonly>
                    </div>

                    <div class="row row-space">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label for="Usertype">Usertype<span style="color: red;"> *</span></label>
                                <select class="form-control" name="Usertype" required
                                    <?php if ($validate_usertype_error != 0) {echo 'style="border:2px solid red;"';}?>>

                                    <option value="admin"
                                        <?php if(isset($_POST['Usertype']) && $_POST['Usertype'] || $usertype == 'admin') {echo 'selected';}?>>
                                        Admin</option>
                                    <option value="student"
                                        <?php if(isset($_POST['Usertype']) && $_POST['Usertype'] || $usertype == 'student') {echo 'selected';}?>>
                                        Student</option>
                                    <option value="faculty"
                                        <?php if(isset($_POST['Usertype']) && $_POST['Usertype'] || $usertype == 'faculty') {echo 'selected';}?>>
                                        Faculty</option>
                                </select>
                                <?php if($validate_usertype_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_usertype_error-1].'</div>';}?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label for="status">Status<span style="color: red;"> *</span></label>
                                <select class="form-control" name="status" required
                                    <?php if ($validate_status_error != 0) {echo 'style="border:2px solid red;"';}?>>
                                    <option value="1"
                                        <?php if(isset($_POST['status']) && $_POST['status'] || $status == '1') {echo 'selected';}?>>
                                        Active</option>
                                    <option value="0"
                                        <?php if(isset($_POST['status']) && $_POST['status'] || $status == '0') {echo 'selected';}?>>
                                        Inactive</option>
                                </select>
                                <?php if($validate_status_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_status_error-1].'</div>';}?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row row-space">
                        <div class="form-group text-left col-md-4">
                            <label for="lastname">Lastname<span style="color: red;"> *</span></label>

                            <input class="form-control" name="lastname" type="text" placeholder="Lastname"
                                value="<?php if(isset($_POST['lastname'])) {$lastname = htmlspecialchars(trim($_POST['lastname']));} else{$lastname = $lname;}echo $lastname;?>"
                                required
                                <?php if ($validate_input_name_error_lastname != 0) {echo 'style="border:2px solid red;"';}?>>

                            <?php if($validate_input_name_error_lastname != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_name_error_lastname-1].'</div>';}?>
                        </div>

                        <div class="form-group text-left col-md-4">
                            <label for="firstname">Firstname<span style="color: red;"> *</span></label>
                            <input class="form-control" name="firstname" type="text" placeholder="Firstname"
                                value="<?php if(isset($_POST['firstname'])) {$firstname =  htmlspecialchars(trim($_POST['firstname']));}else{$firstname = $fname;}echo $firstname;?>"
                                required
                                <?php if ($validate_input_name_error_firstname != 0) {echo 'style="border:2px solid red;"';}?>>

                            <?php if($validate_input_name_error_firstname != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_name_error_firstname-1].'</div>';}?>
                        </div>


                        <div class="form-group text-left col-md-4">
                            <label for="middlename">Middlename<span style="color: red;"> *</span></label>
                            <input class="form-control" name="middlename" type="text" placeholder="Middlename"
                                value="<?php if(isset($_POST['middlename'])) {$middlename =  htmlspecialchars(trim($_POST['firstname']));}else{$middlename = $mname;}echo $middlename;?>"
                                required
                                <?php if ($validate_input_error_mname != 0) {echo 'style="border:2px solid red;"';}?>>

                            <?php if($validate_input_error_mname != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_error_mname-1].'</div>';}?>
                        </div>
                    </div>


                    <div class="row row-space">
                        <div class="form-group text-left col-md-6">
                            <label for="dob">Date of Birth<span style="color: red;"> *</span></label>
                            <input class="form-control" name="dob" type="date" min="1900-01-01" max="2025-01-01"
                                value="<?php if(isset($_POST['dob'])) {$dob =  htmlspecialchars(trim($_POST['dob']));}else{$dob = $DOB;}echo $dob;?>"
                                required>
                        </div>
                        <div class="form-group text-left col-md-6">
                            <label for="gender">Gender<span style="color: red;"> *</span></label>
                            <div class="">
                                <div class="radio-inline form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male" required
                                        <?php if((isset($_POST['gender']) && $_POST['gender']) || $gender == 'male'){echo 'checked';}  ?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="radio-inline form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female" required
                                        <?php if((isset($_POST['gender']) && $_POST['gender']) || $gender == 'female'){ echo 'checked';} ?>>
                                    <label class="form-check-label" for="female">Female</label><br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="form-group text-left col-md-12">
                            <label for="pbirth">Place of Birth<span style="color: red;"> *</span></label>
                            <input class="form-control" name="pbirth" type="text"
                                value="<?php if(isset($_POST['pbirth'])) {$pob =  htmlspecialchars(trim($_POST['pbirth']));}else{$pob = $PlaceOfBirth;}echo $pob;?>"
                                required
                                <?php if ($validate_address_error_pb != 0) {echo 'style="border:2px solid red;"';}?>>

                            <?php if($validate_address_error_pb != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_address_error_pb-1].'</div>';}?>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="form-group text-left col-md-6">
                            <label for="civilstatus">Civil Status<span style="color: red;"> *</span></label>
                            <select class="form-control" name="civilStatus" required
                                <?php if ($validate_civilstatus_error != 0) {echo 'style="border:2px solid red;"';}?>>
                                <option value="default"
                                    <?php if((isset($_POST['civilStatus']) && $_POST['civilStatus']) || $civilStatus == 'default') {echo 'selected';}?>
                                    autofucos>Select Civil Status</option>
                                <option value="divorceAnnulled"
                                    <?php if((isset($_POST['civilStatus']) && $_POST['civilStatus']) || $civilStatus == 'divorceAnnulled') {echo 'selected';}?>>
                                    Divorce/Annulled</option>
                                <option value="married"
                                    <?php if((isset($_POST['civilStatus']) && $_POST['civilStatus']) || $civilStatus == 'married') {echo 'selected';}?>>
                                    Married</option>
                                <option value="separated"
                                    <?php if((isset($_POST['civilStatus']) && $_POST['civilStatus']) || $civilStatus == 'separated') {echo 'selected';}?>>
                                    Separated</option>
                                <option value="single"
                                    <?php if((isset($_POST['civilStatus']) && $_POST['civilStatus']) || $civilStatus == 'single') {echo 'selected';}?>>
                                    Single</option>
                                <option
                                    value="<?php if((isset($_POST['civilStatus']) && $_POST['civilStatus']) || $civilStatus == 'widowed') {echo 'selected';}?>">
                                    Widowed</option>

                            </select>
                            <?php if($validate_civilstatus_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_civilstatus_error-1].'</div>';}?>
                        </div>



                        <div class="form-group text-left col-md-6">
                            <label for="guardian">Guardian<span style="color: red;"> *</span></label>
                            <input class="form-control" name="guardian" type="text" placeholder="Guardian"
                                value="<?php if(isset($_POST['guardian'])) {$guardn =  htmlspecialchars(trim($_POST['guardian']));}else{$guardn = $guardian;}echo $guardn;?>"
                                required
                                <?php if ($validate_input_error_gurdian != 0) {echo 'style="border:2px solid red;"';}?>>

                            <?php if($validate_input_error_gurdian != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_error_gurdian-1].'</div>';}?>
                        </div>
                    </div>

                    <hr>
                    <div class="row row-space">
                        <div class="form-group text-left col-md-12">
                            <label for="address">Address<span style="color: red;"> *</span></label>
                            <input class="form-control" name="address" type="text" placeholder="Address"
                                value="<?php if(isset($_POST['address'])) {$addrss =  htmlspecialchars(trim($_POST['address']));}else{$addrss = $address;}echo $addrss;?>"
                                required
                                <?php if ($validate_address_error != 0) {echo 'style="border:2px solid red;"';}?>>

                            <?php if($validate_address_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_address_error-1].'</div>';}?>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="form-group text-left col-md-6">
                            <label for="email">Email<span style="color: red;"> *</span></label>
                            <input class="form-control" name="email" type="email" placeholder="Email"
                                value="<?php if(isset($_POST['email'])) {$eml =  htmlspecialchars(trim($_POST['email']));}else{$eml = $email;}echo $eml;?>"
                                required
                                <?php if ($validate_email_error != 0) {echo 'style="border:2px solid red;"';}?>>

                            <?php if($validate_email_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_email_error-1].'</div>';}?>
                        </div>
                        <div class="form-group text-left col-md-6">
                            <label for="cnumber">Contact Number<span style="color: red;"> *</span></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+63</div>
                                </div>
                                <input class="form-control" name="cnumber" type="text" maxlength="10" minlength="10"
                                    value="<?php if(isset($_POST['cnumber'])) {$cnumber =  htmlspecialchars(trim($_POST['cnumber']));}else{$cnumber = $contact_Number;}echo $cnumber;?>"
                                    required
                                    <?php if ($validate_number_error != 0) {echo 'style="border:2px solid red;"';}?>>
                            </div>
                            <?php if($validate_number_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_number_error-1].'</div>';}?>
                        </div>
                    </div>

                    <hr>
                    <div class="row row-space">
                        <div class="form-group text-left col-md-12">
                            <label for="">Choose Year Level<span style="color: red;"> *</span></label>
                            <select id="inputState" class="form-control" name="yearlevel" required
                                <?php if ($validate_yearlevel_error != 0) {echo 'style="border:2px solid red;"';}?>>
                                <option value="default"
                                    <?php if((isset($_POST['yearlevel']) && $_POST['yearlevel']) || $yearlevel == 'default') {echo 'selected';}?>>
                                    Choose...</option>
                                <option value="First Year"
                                    <?php if((isset($_POST['yearlevel']) && $_POST['yearlevel']) || $yearlevel == 'First Year') {echo 'selected';}?>>
                                    First Year</option>
                                <option value="Second Year"
                                    <?php if((isset($_POST['yearlevel']) && $_POST['yearlevel']) || $yearlevel == 'Second Year') {echo 'selected';}?>>
                                    Second Year</option>
                                <option value="Third Year"
                                    <?php if((isset($_POST['yearlevel']) && $_POST['yearlevel']) || $yearlevel == 'Third Year') {echo 'selected';}?>>
                                    Third Year</option>
                                <option value="Fourth Year"
                                    <?php if((isset($_POST['yearlevel']) && $_POST['yearlevel']) || $yearlevel == 'Fourth Year') {echo 'selected';}?>>
                                    Fourth Year</option>
                            </select>
                            <?php if($validate_yearlevel_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_yearlevel_error-1].'</div>';}?>
                        </div>

                    </div>



                    <div class="row row-space">
                        <div class="form-group text-left col-md-12">
                            <label for="">Choose Course<span style="color: red;"> *</span></label>
                            <select id="inputState" class="form-control" name="course" required
                                <?php if ($validate_course_error != 0) {echo 'style="border:2px solid red;"';}?>>
                                <option value="default"
                                    <?php if((isset($_POST['course']) && $_POST['course']) || $course == 'default') {echo 'selected';}?>>
                                    Choose...</option>
                                <option value="IT"
                                    <?php if((isset($_POST['course']) && $_POST['course']) || $course == 'IT') {echo 'selected';}?>>
                                    IT
                                </option>
                                <option value="EMT"
                                    <?php if((isset($_POST['course']) && $_POST['course']) || $course == 'EMT') {echo 'selected';}?>>
                                    EMT
                                </option>
                                <option value="TCM"
                                    <?php if((isset($_POST['course']) && $_POST['course']) || $course == 'TCM') {echo 'selected';}?>>
                                    TCM
                                </option>
                                <option value="EE"
                                    <?php if((isset($_POST['course']) && $_POST['course']) || $course == 'EE') {echo 'selected';}?>>
                                    EE
                                </option>
                            </select>
                            <?php if($validate_course_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_course_error-1].'</div>';}?>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="form-group text-left col-md-12">
                            <label for="">School Year<span style="color: red;"> *</span></label>
                            <div class="form-inline col-md-12 pl-0 pr-0">

                                <div class="col-6 form-group pl-0">
                                    <input class="form-control  col-12" type="text" name="year1" placeholder="YYYY"
                                        maxlength="4"
                                        value="<?php if(isset($_POST['year1'])) {$year =  htmlspecialchars(trim($_POST['year1']));}else{$year = $year1;}echo $year;?>"
                                        required
                                        <?php if ($validate_school_year_error != 0) {echo 'style="border:2px solid red;"';}?>>
                                </div>

                                <div class="col-6 form-group pr-0">
                                    <input class="form-control col-12 " type="text" name="year2" placeholder="YYYY"
                                        maxlength="4"
                                        value="<?php if(isset($_POST['year2'])) {$year =  htmlspecialchars(trim($_POST['year2']));}else{$year = $year2;}echo $year;?>"
                                        required
                                        <?php if ($validate_school_year_error != 0) {echo 'style="border:2px solid red;"';}?>>
                                </div>


                            </div>
                            <?php if($validate_school_year_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_school_year_error-1].'</div>';}?>

                        </div>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary form-control" style=" font-weight:bold" type="submit"
                            name='submit'>Update</button>
                    </div>

                </form>
                <div class="form-group" style=" text-align:center;">
                    <a class="btn w-100" href="index.php"
                        style="width:150px; background-color:#f77042; color:white; font-weight:bold">Cancel</a>
                </div>
            </div>
        </div>

        <!-- <div class="card-footer pb-1" style="color:white">
            <h6 class="m-2">Developed by: Christian P. Daohog</h6>
        </div> -->

    </div>

</body>