<div id="third-submenu">
    <a href="index.php?page=settings&subpage=appointments">List Appoinments</a> | <a href="index.php?page=settings&subpage=appointments&action=create">New Appointment</a> | Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'appointment-module/create-appointment.php';
                break; 
                case 'modify':
                    require_once 'appointment-module/view-appointments.php';
                break;
                case 'delete':
                    require_once 'appointment-module/delete.php';
                break; 
                case 'profile':
                    require_once 'appointment-module/view-appointments.php';
                break;
                case 'result':
                    require_once 'appointment-module/search-user.php';
                break;
                default:
                    require_once 'appointment-module/appointment-main.php';
                break; 
            }
    ?>
  </div>