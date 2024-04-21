<?php 
  include_once 'classes/class.doctors.php';

?>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Specialty</th>
        <th>Status</th>
        <th>Date Updated</th>
        <th>Time Updated</th>
        <th>Actions</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($doctors->list_doctors() != false){
foreach($doctors->list_doctors() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=doctors&action=profile&id=<?php echo $doctor_id;?>"><?php echo $doctor_fullname;?></a></td>
        <td><?php echo $doctor_email;?></td>
        <td><?php echo $doctor_contact;?></td>
        <td><?php echo $doctor_specialty;?></td>
        <td><?php echo $doctor_status;?></td>
        <td><?php echo $doctor_date_updated;?></td>
        <td><?php echo $doctor_time_updated;?></td>
        <td><a href="index.php?page=settings&subpage=doctors&action=delete&id=<?php echo $doctor_id;?>">Delete</a></td>
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
