<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/user-process.php?action=update">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">

            <label for="nname">Nickname</label>
            <input type="text" id="nname" class="input" name="nickname" value="<?php echo $user->get_user_nickname($id);?>" placeholder="Your nick name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
              <option value="admin" <?php if($user->get_user_access($id) == "admin"){ echo "selected";};?>>Admin</option>
              <option value="doctor" <?php if($user->get_user_access($id) == "doctor"){ echo "selected";};?>>Doctor</option>
              <option value="user" <?php if($user->get_user_access($id) == "user"){ echo "selected";};?>>User</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="status">Account Status</label>
            <select id="status" name="status" disabled>
              <option <?php if($user->get_user_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
              <option <?php if($user->get_user_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" disabled value="<?php echo $user->get_user_email($id);?>" placeholder="Your email..">
            
            <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
            <a href="#">Change Email</a> | 
            <a href="#">Change Password</a> | 
            <?php
            if($user->get_user_status($id) == "1"){
              ?>
                <a href="#">Disable Account</a>
              <?php
            }else{
            ?>
                <a href="#">Activate Account</a>
            <?php
            }
            ?>
            
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
</div>