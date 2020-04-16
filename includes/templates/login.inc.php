<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Login</title>
    </head>

    <body class="jumbotron jumbotron-fluid">
        <div class="container p-0 form-head">
            <div class="card-header font-styl p-3" style="background-color:#0F2027; margin:0;">
                <h4 class="card-title m-0" style="color:white">Student Information System</h4>
            </div> 

            <div class="card-body bor" style="color:white;">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method='POST'>
                    <label style="display:block; font-size:15px;">Enter your username and password.</label>
                    
                    <?php 
                        include 'utilities/dbconnect.util.php'; 
                        include 'utilities/dbquery.util.php'; 
                        include 'transactions/login.val.php'; 
                    ?>
                    
                    <div class="form-group text-left">
                        <label for="username">Username</label>
                        <input class="form-control" name="username" type="text" placeholder="Username">
                    </div>
                    <div class="form-group text-left">
                        <label for="password">Password</label>
                        <input class="form-control" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group text-left">
                        <input class="" type="checkbox">
                        <label for="">Remember me?</label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary form-control" name='submit'
                            style=" font-weight:bold">Login</button>
                    </div>
                    <div class="form-group" style=" text-align:center;">
                        <a class="btn w-100" href="register/"
                            style="width:150px; background-color:#f77042; color:white; font-weight:bold">Create
                            Account</a>
                    </div>
                    <div class="#">
                        <a href="#">Forgot Password?</a>
                    </div>

                </form>

            </div>

            <div class="card-footer pb-1" style="color:white">
                <h6 class="m-2">Developed by: Christian P. Daohog</h6>
            </div>
        </div>




    </body>