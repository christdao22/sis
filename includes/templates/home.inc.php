<title>Home</title>
</head>
<body class="jumbotron jumbotron-fluid">
    <div class="container p-0">
        <form action="transactions/logout.php">
            <div class='form-group'>
                <button class="btn logout" name="logout"
                    style='background-color:#f77042;color:white; display: block; margin-left: auto;'>logout</button>
            </div>
        </form>
        <div class="card-header font-styl p-3" style="background-color:#0F2027; margin:0; text-align:center;">
            <h4 class="card-title m-0" style="color:white">Records</h4>
        </div>
        <div class="card-body" style="background-color:white">

            <div class="table-responsive">
                <form action="<?= $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group p-3">
                        <input type="text" name="searchkey" placeholder="Enter Keyword">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <table class="table table-striped table-bordered table-hover table-sm" style="text-align:center">
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
                            $sql = "SELECT * FROM users left join student on student.userid = users.userid WHERE username LIKE '%$searchkey%' order by users.userid  ASC";
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
                                        <th scope='row'><img src='$profile_pic' alt='image' width='30px' height='30px'></th>
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

        <div class="card-footer pb-1" style="color:white; text-align:center;">
            <h6 class="m-2">Developed by: Christian P. Daohog</h6>
        </div>

    </div>

</body>