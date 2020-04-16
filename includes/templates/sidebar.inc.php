<!-- <form action=""> -->
<div class="form-group">
    <img class='border border-dark' style="display: block; margin-left: auto; margin-right: auto; border-radius:50%"
        src="../<?php echo $picture?>" alt="image" width="144" height='144'>
    <!-- <div>
                <input name="picture" value="<?PHP //echo $picture;?>" hidden>
            </div> -->
</div>

<div class="" style="font-size:14px; line-height:10px">
    <h5 class="m-3"><span><?php echo $lname; ?></span> <span><?php echo $fname; ?></span>
        <span><?php echo substr($mname, 0, 1).'.'; ?></span></h5>
    <p><span style="font-weight:bold"><?php echo $email; ?></span></p>
    <p><?php echo $fid;?></p>
    <p><?php echo $usertype; ?></p>
</div>
<!-- 
    </form> -->