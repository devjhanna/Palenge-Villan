<div id="third-submenu">
    <a href="index.php?page=settings&subpage=storage">List Products</a> | <a href="index.php?page=settings&subpage=storage&action=create">Add Product</a> | Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'medicine-storage/add-medicine.php';
                break; 
                case 'update':
                    require_once 'medicine-storage/medicine.php';
                break;
                case 'delete':
                    require_once 'medicine-storage/delete.php';
                break; 
                case 'profile':
                    require_once 'medicine-storage/medicine.php';
                break;
                case 'result':
                    require_once 'medicine-storage/search-user.php';
                break;
                default:
                    require_once 'medicine-storage/medicine-main.php';
                break; 
            }
    ?>
  </div>