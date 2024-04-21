<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/appointment-process.php?action=update">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo $appointment->get_apt_firstname($id);?>" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" value="<?php echo $appointment->get_apt_lastname($id);?>" placeholder="Your last name..">

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" value="<?php echo $appointment->get_apt_email($id)?>" placeholder="Your email..">

            <label for="contact">Contact No.</label>
            <input type="text" id="contact" class="input" name="contact" value="<?php echo $appointment->get_apt_contact($id)?>"placeholder="Your contact..">

        </div>
        <div id="form-block-half">

            <label for="date">Appointment Date</label>
            <input type="date" id="date" class="input" name="aptdate" value="<?php echo ($NOW)?>" placeholder="Enter appointment date..">
            
            <label for="time">Time</label>
            <input type="time" id="time" class="input" name="apttime" value="<?php echo ($NOW)?>" placeholder="Enter time..">
        
            <label for="address">Address</label>
            <input type="text" id="address" class="input" name="address" value="<?php echo $appointment->get_address($id)?>" placeholder="Your address..">
            
            <input type="hidden" id="aptid" name="aptid" value="<?php echo $id;?>"/>
            
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
            
        <input type="submit" value="Update" name="save">
        </div>
</form>
</div>