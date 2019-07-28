<?php
require_once __DIR__ . '/commons/header.php';
require_once __DIR__ . '/commons/navbar.php';

use App\Index\IndexController;


/* Example */
$indexController = new IndexController();
$lastThree = $indexController->initIndex($db);
print_r($lastThree);
?>



<?php
require_once __DIR__ . '/commons/footer.php';
?>
