<title>Create account</title>
</head>
 
<?php  
include 'utilities/dbconnect.util.php'; 
include 'utilities/validation.util.php'; 
include 'utilities/dbquery.util.php';
include 'transactions/form.val.php';
?>

<body class="jumbotron jumbotron-fluid "> 
    <div class="container p-0 col-md-5" style="background-color:#2C5364;  text-align:center;">
        <div class="card-header font-styl p-3" style="background-color:#0F2027; margin:0;">
            <h4 class="m-0" style="color:white">My Profile</h4>
        </div>

        <!-- display uploaded image -->
        <div class="card-body" style="color:white">

            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

                <div class="form-group">
                    <img style="border:1px solid White" src="upload/<?php echo $_SESSION['profile_pic']; ?>" alt="image" width="240" height='240'>
                </div>

                <hr>

                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-4">
                        <label for="lastname">Lastname<span style="color: red;"> *</span></label>

                        <input class="form-control" name="lastname" type="text" placeholder="Lastname"
                            value="<?php if(isset($_POST['lastname'])) {echo htmlspecialchars(trim($_POST['lastname']));}?>"
                            required
                            <?php if ($validate_input_name_error_lastname != 0) {echo 'style="border:2px solid red;"';}?>>

                        <?php if($validate_input_name_error_lastname != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_name_error_lastname-1].'</div>';}?>
                    </div>

                    <div class="form-group text-left col-md-4">
                        <label for="firstname">Firstname<span style="color: red;"> *</span></label>
                        <input class="form-control" name="firstname" type="text" placeholder="Firstname"
                            value="<?php if(isset($_POST['firstname'])) {echo htmlspecialchars(trim($_POST['firstname']));}?>"
                            required
                            <?php if ($validate_input_name_error_firstname != 0) {echo 'style="border:2px solid red;"';}?>>

                        <?php if($validate_input_name_error_firstname != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_name_error_firstname-1].'</div>';}?>
                    </div>


                    <div class="form-group text-left col-md-4">
                        <label for="middlename">Middlename<span style="color: red;"> *</span></label>
                        <input class="form-control" name="middlename" type="text" placeholder="Middlename"
                            value="<?php if(isset($_POST['middlename'])) {echo htmlspecialchars(trim($_POST['middlename']));}?>"
                            required
                            <?php if ($validate_input_error_mname != 0) {echo 'style="border:2px solid red;"';}?>>

                        <?php if($validate_input_error_mname != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_error_mname-1].'</div>';}?>
                    </div>
                </div>


                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-6">
                        <label for="dob">Date of Birth<span style="color: red;"> *</span></label>
                        <input class="form-control" name="dob" type="date" min="1900-01-01" max="2025-01-01"
                            value="<?php if(isset($_POST['dob'])) {echo htmlspecialchars(trim($_POST['dob']));}?>"
                            required>
                    </div>
                    <div class="form-group text-left col-md-6">
                        <label for="gender">Gender<span style="color: red;"> *</span></label>
                        <div class="">
                            <div class="radio-inline form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="male" required
                                    <?php if(isset($_POST['gender']) && $_POST['gender']=='male'){echo 'checked';}  ?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="radio-inline form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female" required
                                    <?php if(isset($_POST['gender']) && $_POST['gender']=='female'){ echo 'checked';} ?>>
                                <label class="form-check-label" for="female">Female</label><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-12">
                        <label for="pbirth">Place of Birth<span style="color: red;"> *</span></label>
                        <input class="form-control" name="pbirth" type="text"
                            value="<?php if(isset($_POST['pbirth'])) {echo htmlspecialchars(trim($_POST['pbirth']));}?>"
                            required
                            <?php if ($validate_address_error_pb != 0) {echo 'style="border:2px solid red;"';}?>>

                        <?php if($validate_address_error_pb != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_address_error_pb-1].'</div>';}?>
                    </div>
                </div>

                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-6">
                        <label for="civilstatus">Civil Status<span style="color: red;"> *</span></label>
                        <select class="form-control" name="civilStatus" required <?php if ($validate_civilstatus_error != 0) {echo 'style="border:2px solid red;"';}?>>
                            <option value="default"
                                <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'default') {echo 'selected';}?>
                                autofucos>Select Civil Status</option>
                            <option value="divorceAnnulled"
                                <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'divorceAnnulled') {echo 'selected';}?>>
                                Divorce/Annulled</option>
                            <option value="married"
                                <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'married') {echo 'selected';}?>>
                                Married</option>
                            <option value="separated"
                                <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'separated') {echo 'selected';}?>>
                                Separated</option>
                            <option value="single"
                                <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'single') {echo 'selected';}?>>
                                Single</option>
                            <option
                                value="<?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'widowed') {echo 'selected';}?>">
                                Widowed</option>

                        </select>
                        <?php if($validate_civilstatus_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_civilstatus_error-1].'</div>';}?>
                    </div>



                    <div class="form-group text-left col-md-6">
                        <label for="guardian">Guardian<span style="color: red;"> *</span></label>
                        <input class="form-control" name="guardian" type="text" placeholder="Guardian"
                            value="<?php if(isset($_POST['guardian'])) {echo htmlspecialchars(trim($_POST['guardian']));}?>"
                            required
                            <?php if ($validate_input_error_gurdian != 0) {echo 'style="border:2px solid red;"';}?>>

                        <?php if($validate_input_error_gurdian != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_input_error_gurdian-1].'</div>';}?>
                    </div>
                </div>

                <hr>
                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-12">
                        <label for="address">Address<span style="color: red;"> *</span></label>
                        <input class="form-control" name="address" type="text" placeholder="Address"
                            value="<?php if(isset($_POST['address'])) {echo htmlspecialchars(trim($_POST['address']));}?>"
                            required <?php if ($validate_address_error != 0) {echo 'style="border:2px solid red;"';}?>>

                        <?php if($validate_address_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_address_error-1].'</div>';}?>
                    </div>
                </div>

                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-6">
                        <label for="email">Email<span style="color: red;"> *</span></label>
                        <input class="form-control" name="email" type="email" placeholder="Email"
                            value="<?php if(isset($_POST['email'])) {echo htmlspecialchars(trim($_POST['email']));}?>"
                            required <?php if ($validate_email_error != 0) {echo 'style="border:2px solid red;"';}?>>

                        <?php if($validate_email_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_email_error-1].'</div>';}?>
                    </div>
                    <div class="form-group text-left col-md-6">
                        <label for="cnumber">Contact Number<span style="color: red;"> *</span></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+63</div>
                            </div>
                            <input class="form-control" name="cnumber" type="text" maxlength="10" minlength="10"
                                value="<?php if(isset($_POST['cnumber'])) {echo htmlspecialchars(trim($_POST['cnumber']));}?>"
                                required
                                <?php if ($validate_number_error != 0) {echo 'style="border:2px solid red;"';}?>>
                        </div>
                        <?php if($validate_number_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_number_error-1].'</div>';}?>
                    </div>
                </div>

                <hr>
                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-12">
                        <label for="">Choose Year Level<span style="color: red;"> *</span></label>
                        <select id="inputState" class="form-control" name="yearlevel" required <?php if ($validate_yearlevel_error != 0) {echo 'style="border:2px solid red;"';}?>>
                            <option value="default"
                                <?php if(isset($_POST['yearlevel']) && $_POST['yearlevel'] == 'default') {echo 'selected';}?>>
                                Choose...</option>
                            <option value="First Year"
                                <?php if(isset($_POST['yearlevel']) && $_POST['yearlevel'] == 'First Year') {echo 'selected';}?>>
                                First Year</option>
                            <option value="Second Year"
                                <?php if(isset($_POST['yearlevel']) && $_POST['yearlevel'] == 'Second Year') {echo 'selected';}?>>
                                Second Year</option>
                            <option value="Third Year"
                                <?php if(isset($_POST['yearlevel']) && $_POST['yearlevel'] == 'Third Year') {echo 'selected';}?>>
                                Third Year</option>
                            <option value="Fourth Year"
                                <?php if(isset($_POST['yearlevel']) && $_POST['yearlevel'] == 'Fourth Year') {echo 'selected';}?>>
                                Fourth Year</option>
                        </select>
                        <?php if($validate_yearlevel_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_yearlevel_error-1].'</div>';}?>
                    </div>
                    
                </div>



                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-12">
                        <label for="">Choose Course<span style="color: red;"> *</span></label> 
                        <select id="inputState" class="form-control" name="course" required <?php if ($validate_course_error != 0) {echo 'style="border:2px solid red;"';}?>>
                            <option value="default"
                                <?php if(isset($_POST['course']) && $_POST['course'] == 'default') {echo 'selected';}?>>
                                Choose...</option>
                            <option value="IT"
                                <?php if(isset($_POST['course']) && $_POST['course'] == 'IT') {echo 'selected';}?>>IT
                            </option>
                            <option value="EMT"
                                <?php if(isset($_POST['course']) && $_POST['course'] == 'EMT') {echo 'selected';}?>>EMT
                            </option>
                            <option value="TCM"
                                <?php if(isset($_POST['course']) && $_POST['course'] == 'TCM') {echo 'selected';}?>>TCM
                            </option>
                            <option value="EE"
                                <?php if(isset($_POST['course']) && $_POST['course'] == 'EE') {echo 'selected';}?>>EE
                            </option>
                        </select>
                        <?php if($validate_course_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_course_error-1].'</div>';}?>
                    </div>
                </div>

                <div class="row mx-md-n1">
                    <div class="form-group text-left col-md-12">
                        <label for="">School Year<span style="color: red;"> *</span></label>
                        <div class="form-inline col-md-12 pl-0 pr-0">

                            <div class="col-6 form-group pl-0">
                                <input class="form-control  col-12" type="text" name="year1" placeholder="YYYY"
                                    maxlength="4"
                                    value="<?php if(isset($_POST['year1'])) {echo htmlspecialchars(trim($_POST['year1']));}?>"
                                    required
                                    <?php if ($validate_school_year_error != 0) {echo 'style="border:2px solid red;"';}?>>
                            </div>

                            <div class="col-6 form-group pr-0">
                                <input class="form-control col-12 " type="text" name="year2" placeholder="YYYY"
                                    maxlength="4"
                                    value="<?php if(isset($_POST['year2'])) {echo htmlspecialchars(trim($_POST['year2']));}?>"
                                    required
                                    <?php if ($validate_school_year_error != 0) {echo 'style="border:2px solid red;"';}?>>
                            </div>


                        </div>
                        <?php if($validate_school_year_error != 0){echo '<div class="alert alert-danger text-danger p-2 mt-2" style="font-size: 11px;"><i class="fas fa-exclamation-circle"></i> '.$err_array[$validate_school_year_error-1].'</div>';}?>

                    </div>
                </div>


                <div class="row mx-md-n1">
                    <div class="form-group col-md-12 mt-1">
                        <button class="btn btn-primary form-control" type="submit" name='submit'>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>