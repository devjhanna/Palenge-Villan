<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/doctors-process.php?action=update">
        <div id="form-block-half">
            <label for="name">Full Name</label>
            <input type="text" id="name" class="input" name="fullname" value="<?php echo $doctors->get_doctor_fullname($id);?>" placeholder="doctor name..">

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" disabled value="<?php echo $doctors->get_doctor_email($id);?>" placeholder="doctor email..">

            <label for="contact">Contact</label>
            <input type="text" id="contact" class="input" name="contact" value="<?php echo $doctors->get_doctor_contact($id);?>" placeholder="doctor contact..">

            <label for="specialty">Specialty</label>
            <input type="text" id="specialty" class="input" name="specialty" value="<?php echo $doctors->get_doctor_specialty($id);?>" placeholder="doctor specialty..">

        </div>
        <div id="form-block-half">

            <label for="date">Date Updated</label>
            <input type="date" id="date" class="input" name="aptdate" disabled value="<?php echo ($NOW)?>">
            
            <label for="time">Time Updated</label>
            <input type="time" id="time" class="input" name="apttime" disabled value="<?php echo ($NOW)?>">

            <label for="status">doctor Status</label>
            <select id="status" name="status">
              <option <?php if($doctors->get_doctor_status($id) == "Unnavailable"){ echo "selected";};?>>Unnavailable</option>
              <option <?php if($doctors->get_doctor_status($id) == "Available"){ echo "selected";};?>>Available</option>
            </select>

            <input type="hidden" id="doctorid" name="doctorid" value="<?php echo $id;?>"/>


        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
</div>