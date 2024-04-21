<?php 
  include_once 'classes/class.appointment.php';
?>

<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Appointment Date</th>
        <th>Appointment Time</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($appointment->list_appointment() != false){
foreach($appointment->list_appointment() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=appointments&action=profile&id=<?php echo $apt_id;?>"><?php echo $apt_lastname.', '.$apt_firstname;?></a></td>
        <td><?php echo $apt_email;?></td>
        <td><?php echo $apt_contact;?></td>
        <td><?php echo $apt_date;?></td>
        <td><?php echo $apt_time;?></td>
        <td><?php echo $apt_address;?></td>
        <td><a href="index.php?page=settings&subpage=appointments&action=delete&id=<?php echo $apt_id;?>">Delete</a></td>
      </tr>
      <tr>
<?php
$count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>