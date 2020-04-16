<link rel="stylesheet" href="../css/style.css" type="text/css" />
<title>Change Profile Pic</title>
</head>
<?php  include '../utilities/dbconnect.util.php';  ?>
<body class="jumbotron jumbotron-fluid "> 
    <div class="container p-0 form-head">
        <div class="card-header font-styl p-3" style="background-color:#0F2027; margin:0;">
            <h4 class="m-0" style="color:white">Change Profile Picture</h4>
        </div>

        <div class="card-body" style="color:white; margin:auto;">
            <?php 
                include '../utilities/image_validation.util.php';
                include '../transactions/upload.val.php'; 
            ?>
            
            <?php   
                if($error != 0 ){
                    echo "<div class='alert alert-danger' role='alert'>
                    <i class='fas fa-exclamation-circle'></i>".$error_image_array[$error-1]." *</div>";
                }
            ?>

            <div class="p-3 jumbotron"
                style="width:150px; height:160px; margin:5px auto 30px auto;  border-radius: 50%;">
                <i class="fas fa-user" style="color:black; font-size:7em!important;"></i>

            </div>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
                <div class="form-group input-group px-2 py-2 rounded-pill bg-white"
                    <?php if($error!=0){echo 'style="border:2px solid red"';} ?>>
                    <input type="file" class="form-control border-0" name="imageToUpload">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary form-control" style=" font-weight:bold" type="submit">Upload</button>
                </div>
                <div class="form-group">
                    <button class="btn w-100" name="cancel" type='submit'
                        style="background-color:#f77042; color:white; font-weight:bold">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</body>