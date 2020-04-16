<title>Profile</title>
</head>

<body class="jumbotron jumbotron-fluid ">

    <!-- #2C5364 -->
    <div class="container p-0" style="background-color:white;  text-align:left;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <?php $query = 'P'?>
                        <a class="nav-link" href="home.php?query=home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Account</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class='form-group'>
                        <button class="btn logout" name="logout"
                            style='background-color:#f77042;color:white; display: block; margin-left: auto;'>logout</button>
                    </div>
                </form>
            </div>
        </nav>
        <div class="row mx-md-n1">
            <div class="col-md-3 m-3 ">
                <div class="border p-3" style="text-align:center">
                    <form action="">
                        <div class="form-group">
                            <img class='border border-dark'
                                style="display: block; margin-left: auto; margin-right: auto; border-radius:50%"
                                src="<?php //echo $picture?> upload/default.png" alt="image" width="144" height='144'>
                            <div>
                                <input name="picture" value="<?PHP echo $picture;?>" hidden>
                            </div>
                        </div>

                        <div class="" style="font-size:14px; line-height:10px">
                            <h5 class="m-3">Daohog Christian P.</h5>
                            <p>2017100707</p>
                            <p>B.S. in <span style="font-weight:bold">Information Technology</span></p>
                            <p>Student</p>
                        </div>

                    </form>
                </div>
            </div>



            <div class="col-md-8 m-3 border p-3">
                <h4>Personal Information</h4>
                <hr>
                <table class="table table-condensed table-striped" style="clear: both; cursor: pointer;">
                    <tbody>
                        <tr>
                            <td style="width:150px;">Last Name</td>
                            <td>Daohog</td>
                        </tr>
                        <tr>
                            <td style="width:150px;">First Name</td>
                            <td>Daohog</td>
                        </tr>
                        <tr>
                            <td style="width:150px;">Middle Name</td>
                            <td>Daohog</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>


<!-- <table id="user" class="table table-condensed table-striped" style="clear: both; cursor: pointer;">
    <tbody>
        <tr>
            <td style="width:150px;">Last Name</td>
            <td><a href="javascript:void(0);" id="lastname" name="lastname" data-type="text" data-pk="1"
                    data-original-title="Enter Last Name" class="editable editable-click editable-disabled"
                    tabindex="-1">
                    Daohog</a></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><a href="javascript:void(0);" id="firstname" name="firstname" data-type="text" data-pk="1"
                    data-original-title="Enter First Name" class="editable editable-click editable-disabled"
                    tabindex="-1">Christian</a></td>
        </tr>
        <tr>
            <td>Middle Name</td>
            <td><a href="javascript:void(0);" id="middlename" name="middlename" data-type="text" data-pk="1"
                    data-placement="right" data-placeholder="Required" data-original-title="Enter your Middle Name"
                    class="editable editable-click editable-disabled" tabindex="-1">Pacho</a></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><a href="javascript:void(0);" id="sex" data-type="select" data-pk="1" data-value="M"
                    data-original-title="Select sex" class="editable editable-click editable-disabled"
                    tabindex="-1">Male</a></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><a href="javascript:void(0);" id="dob" data-type="combodate" data-value="05/04/1997"
                    data-format="MM-DD-YYYY" data-viewformat="MM/DD/YYYY" data-template="MMM / D / YYYY" data-pk="1"
                    data-original-title="Select Date of birth" class="editable editable-click editable-disabled"
                    tabindex="-1">05/04/1997</a></td>
        </tr>
        <tr>
            <td>Place of Birth</td>
            <td><a href="javascript:void(0);" id="birthplace" data-type="text" data-pk="1" data-placement="right"
                    data-original-title="Start typing State.." class="editable editable-click editable-disabled"
                    tabindex="-1">PGH,manila</a></td>
        </tr>
        <tr>
            <td>Civil Status</td>
            <td><a href="javascript:void(0);" id="csgroup" name="status" data-type="select" data-pk="1" data-value="1"
                    data-source="/csgroups" data-original-title="Select Status"
                    class="editable editable-click editable-disabled" tabindex="-1">Single</a></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><a href="javascript:void(0);" id="natgroup" name="nationality" data-type="select" data-pk="1"
                    data-value="1" data-source="/natgroups" data-original-title="Select Nationality"
                    class="editable editable-click editable-disabled" tabindex="-1">Filipino</a></td>
        </tr>
        <tr>
            <td>Religion</td>
            <td><a href="javascript:void(0);" id="relgroup" name="religion" data-type="select" data-pk="1"
                    data-value="1" data-source="/relgroups" data-original-title="Select group"
                    class="editable editable-click editable-disabled" tabindex="-1">Roman Catholic</a></td>
        </tr>
        <tr>
            <td>Mobile No.</td>
            <td><a href="javascript:void(0);" id="mobileno" name="mobileno" data-type="text" data-pk="1"
                    data-placement="right" data-placeholder="Mobile no" data-original-title="Enter your Mobile number"
                    class="editable editable-click editable-disabled" tabindex="-1">09959125420</a></td>
        </tr>
        <tr>
            <td>Telephone No.</td>
            <td><a href="javascript:void(0);" id="telno" name="telno" data-type="text" data-pk="1"
                    data-placement="right" data-placeholder="" data-original-title="Enter your Telephone number"
                    class="editable editable-click editable-disabled" tabindex="-1"></a></td>
        </tr>
        <tr>
            <td>Learner Reference No:</td>
            <td><a href="javascript:void(0);" id="lrn" name="lrn" data-type="text" data-pk="1" data-placement="right"
                    data-placeholder="" data-original-title="Enter your Learner Reference No"
                    class="editable editable-click editable-disabled" tabindex="-1">000000000</a></td>
        </tr>
        <tr>
            <td>Residential Address</td>
            <td>
                <a href="javascript:void(0);" id="resaddress" data-type="address" data-pk="1"
                    data-original-title="Please, fill address"
                    data-value="{city:'Cagayan De Oro City', prov:'Misamis Oriental', brgy:'Nazareth', address:'',zip:'9000'}"
                    class="editable editable-click editable-disabled" tabindex="-1"></a>
            </td>
        </tr>
        <tr>
            <td>Permanent Address</td>
            <td>
                <a href="javascript:void(0);" id="permaddress" data-type="address" data-pk="1"
                    data-original-title="Please, fill address"
                    data-value="{city:'Cagayan De Oro City', prov:'Misamis Oriental', brgy:'Manla', address:'',zip:'9000'}"
                    class="editable editable-click editable-disabled" tabindex="-1"></a></td>
        </tr>
    </tbody>
</table>











 -->










<!-- <div class="col-md-4" style="border:1px solid red">
                <div class="card-body" style="border:1px solid red">
                    <div class="list-group nav nav-tabs" style='color:#333'>
                        <a class="list-group-item font-sm" href="#s1"
                            style='background-color:#333; color:white'>Profile</a>

                        <a href="#s3" class="list-group-item font-sm" style='color:#333'><i class="fa fa-picture-o"></i>
                            Profile Picture
                        </a>
                        <a class="list-group-item font-sm " href="#s4" style='color:#333'><i class="fa fa-lock "></i>
                            Change Password
                        </a>
                        <a class="list-group-item font-sm" href="#s5" style='color:#333'><i class="fa fa-envelope "></i>
                            Change Username
                        </a>
                        <a class="list-group-item font-sm" href="#s5" style='color:#333'><i class="fa fa-envelope "></i>
                            Logout
                        </a>

                    </div>
                </div>
            </div>

            <div class="" style="border:1px solid red">
                <div class="card-body " style="background-color:white; border:1px solid red">

                    <h6>Personal Information</h6>
                    <table class="table table-striped table-hover table-sm">
                        <tr>
                            <td style='width:150px'>Last Name</td>
                            <td>Daohog</td>
                        </tr>
                        <tr>
                            <td style='width:150px'>First Name</td>
                            <td>Christian</td>
                        </tr>
                        <tr>
                            <td style='width:150px'>Middle Name</td>
                            <td>Daohog</td>
                        </tr>
                        <tr>
                            <td style='width:150px'>First Name</td>
                            <td>Christian</td>
                        </tr>
                    </table>
                </div>
            </div> -->