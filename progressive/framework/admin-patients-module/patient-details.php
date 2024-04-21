<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/patients-process.php?action=update">
        <div id="form-block-half">
            <label for="name">Full Name</label>
            <input type="text" id="name" class="input" name="fullname" value="<?php echo $patients->get_patient_fullname($id);?>" placeholder="Patient name..">

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" disabled value="<?php echo $patients->get_patient_email($id);?>" placeholder="Patient email..">

            <label for="contact">Contact</label>
            <input type="text" id="contact" class="input" name="contact" value="<?php echo $patients->get_patient_contact($id);?>" placeholder="Patient contact..">

            <label for="address">Address</label>
            <input type="text" id="address" class="input" name="address" value="<?php echo $patients->get_patient_address($id);?>" placeholder="Patient address..">

        </div>
        <div id="form-block-half">
            <label for="date">Date Updated</label>
            <input type="date" id="date" class="input" name="aptdate" disabled value="<?php echo ($NOW)?>">
            
            <label for="time">Time Updated</label>
            <input type="time" id="time" class="input" name="apttime" disabled value="<?php echo ($NOW)?>">
            
            <label for="diagnosis">Patient Diagnosis</label>
            <input type="text" id="diagnosis" class="input" name="diagnosis" value="<?php echo $patients->get_patient_diagnosis($id);?>" placeholder="Patient diagnosis..">

            <input type="hidden" id="patientid" name="patientid" value="<?php echo $id;?>"/>


        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
</div>