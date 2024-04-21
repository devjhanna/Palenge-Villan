<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/user-process.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

            <label for="nname">Nick Name</label>
            <input type="text" id="nname" class="input" name="nickname" placeholder="Your nick name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
              <option value="admin">Admin</option>
              <option value="doctor">Doctor</option>
              <option value="user">User</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
            
        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>