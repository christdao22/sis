<link rel="stylesheet" href="../css/style.css" type="text/css" />
<title>Register</title>
</head>


<?php 
    include '../utilities/validation.util.php'; 
    include '../utilities/dbquery.util.php'; 
    include '../transactions/register.val.php'; 
?>

<body class="jumbotron jumbotron-fluid ">
    <div class="container p-0 form-head">
        <div class="card-header font-styl p-3" style="background-color:#0F2027; margin:0;">
            <h4 class="m-0" style="color:white">Create My Account</h4>
        </div>

        <div class="card-body" style="color:white">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

                <div class="form-group text-left">
                    <label for="username">Username</label>
                    <input class="form-control" name="username" type="text" placeholder="Username"
                        value="<?PHP if(isset($_POST['username'])) {echo htmlspecialchars(trim($_POST['username']));}?>"
                        required <?php if ($unErrors != 0) {echo 'style="border:2px solid red;"';}?>>
                    <?php if ($unErrors != 0) {echo "<p class='m-2'> <font color=red><i class='fas fa-exclamation-circle'></i> ".$err_array[$unErrors-1]."</font> </p>";}?>
                </div>


                <div class="form-group text-left">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Password" required
                        <?php if ($passErrors != 0) {echo 'style="border:2px solid red;"';}?>>
                    <?php if ($passErrors != 0) {echo "<p class='m-2'> <font color=red><i class='fas fa-exclamation-circle'></i> ".$err_array[$passErrors-1]."</font> </p>";}?>
                </div>


                <div class="form-group text-left">
                    <label for="repass">Retype Password</label>
                    <input class="form-control" name="repass" type="password" placeholder="Retype Password" required
                        <?php if ($passErrors != 0) {echo 'style="border:2px solid red;"';}?>>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary form-control" style=" font-weight:bold" type="submit"
                        name='submit'>Create
                        Account</button>
                </div>

            </form>
            <div class="form-group" style=" text-align:center;">
                <a class="btn w-100" href="../"
                    style="width:150px; background-color:#f77042; color:white; font-weight:bold">Cancel</a>
            </div>
        </div>

        <div class="card-footer pb-1" style="color:white">
            <h6 class="m-2">Developed by: Christian P. Daohog</h6>
        </div>

    </div>

</body>