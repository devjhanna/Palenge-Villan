<?php 
  include_once 'classes/class.patients.php';

?>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Diagnosis</th>
        <th>Date Updated</th>
        <th>Time Updated</th>
        <th>Actions</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($patients->list_patients() != false){
foreach($patients->list_patients() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=patients&action=profile&id=<?php echo $patient_id;?>"><?php echo $patient_fullname;?></a></td>
        <td><?php echo $patient_email;?></td>
        <td><?php echo $patient_contact;?></td>
        <td><?php echo $patient_address;?></td>
        <td><?php echo $patient_diagnosis;?></td>
        <td><?php echo $patient_date_updated;?></td>
        <td><?php echo $patient_time_updated;?></td>
        <td><a href="index.php?page=settings&subpage=patients&action=delete&id=<?php echo $patient_id;?>">Delete</a></td>
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
