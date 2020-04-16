<link rel="stylesheet" href="../css/style.css" type="text/css" />
<title>Home</title>
</head>

<body>
    <div class="container-fluid wrapper p-0 border">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="records.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Account</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="../transactions/logout.php">
                    <div class='form-group'>
                        <button class="btn logout" name="logout"
                            style='background-color:#f77042;color:white; display: block; margin-left: auto;'>logout</button>
                    </div>
                </form>
            </div>
        </nav>

        <div class="p-0 border border-danger" style="background-color:white; text-align:left;">
            <div class="row mx-md-n1">

                <div class="col-md-3 p-3 m-3 border" style="text-align:center">
                    <?php  
                        include '../transactions/sidebar.php';
                        include '../includes/templates/sidebar.inc.php';
                    ?>
                </div>

                <div class="col-md-8 p-3 m-3 border">
                    <div class="table-responsive">
                        <form class="form-inline my-2 " action="<?= $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <input class="form-control col-md-7 mr-1" name="searchkey" type="search"
                                    placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0">Search</button>
                            </div>
                        </form>

                        <table class="table table-striped table-bordered table-hover table-sm"
                            style="text-align:center" >
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Profile Pic</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Usertype</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT * FROM student right join users on users.userid = student.userid order by users.userid  ASC";
                                
                                if(isset($_GET['searchkey'])){
                                    $searchkey = $_GET['searchkey'];
                                    $sql = "SELECT * FROM student right join users on users.userid = student.userid WHERE username LIKE '%$searchkey%' order by users.userid  ASC";
                                }
                            
                                $result = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $profile_pic = $row['profilePic'];
                                        $userid = $row['userid'];
                                        $username = $row['username'];
                                        $password = $row['password'];
                                        $usertype = ucfirst($row['usertype']);
                                        $status = ($row['status']) ? 'Active' : 'Inactive';
                                        echo "<tr>
                                                <th scope='row'><img src='../$profile_pic' alt='image' width='30px' height='30px'></th>
                                                <td>$userid</td>
                                                <td>$username</td>
                                                <td>$password</td>
                                                <td>$usertype</td>
                                                <td>$status</td>
                                                <td>
                                                    <a href='update.php?userid=$userid'>
                                                        <span class='fas fa-edit text-warning'></span>
                                                        Update
                                                    </a> |
                                                    <a href='transactions/delete.php?userid=$userid'>
                                                        <span class='fas fa-trash text-danger'></span>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer pb-1" style="color:white; text-align:center;">
            <h6 class="m-2">Developed by: Christian P. Daohog</h6>
        </div>

    </div>

</body>