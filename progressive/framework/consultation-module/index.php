<div id="third-submenu">
    <a href="index.php?page=settings&subpage=patients">List Patients</a> | <a href="index.php?page=settings&subpage=patients&action=create">New Patient</a> | Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'patients-module/add-patient.php';
                break; 
                case 'modify':
                    require_once 'patients-module/view-appointments.php';
                break;
                case 'delete':
                    require_once 'patients-module/delete.php';
                break; 
                case 'profile':
                    require_once 'patients-module/patient-details.php';
                break;
                case 'result':
                    require_once 'patients-module/search-user.php';
                break;
                default:
                    require_once 'patients-module/main.php';
                break; 
            }
    ?>
  </div>