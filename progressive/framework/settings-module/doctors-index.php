<div id="second-submenu">
    <a href="doctors-tab.php?page=settings&subpage=systems">System Settings</a> |
</div>
<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break;
                case 'appointments':
                    require_once 'appointment-module/index.php';
                break;
                case 'patients':
                    require_once 'patients-module/index.php';
                break;
                case 'doctors':
                    require_once 'doctors-module/index.php';
                break;
                case 'storage':
                    require_once 'medicine-storage/index.php';
                break; 
                case 'module_xxx':
                    require_once 'module-folder/';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>