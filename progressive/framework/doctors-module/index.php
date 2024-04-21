<div id="third-submenu">
    <a href="index.php?page=settings&subpage=doctors">List Doctors</a> | <a href="index.php?page=settings&subpage=doctors&action=create">New doctor</a> | Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'doctors-module/add-doctors.php';
                break; 
                case 'modify':
                    require_once 'doctors-module/view-doctors.php';
                break;
                case 'delete':
                    require_once 'doctors-module/delete.php';
                break; 
                case 'profile':
                    require_once 'doctors-module/doctor-details.php';
                break;
                case 'result':
                    require_once 'doctors-module/search-user.php';
                break;
                default:
                    require_once 'doctors-module/main.php';
                break; 
            }
    ?>
  </div>