<?php
require __DIR__ . '/commons/header.php';
require __DIR__ . '/commons/navbar.php';


use App\Users\Users;
use App\Users\UsersRepository;


/* Example */
$usersRepository = new UsersRepository($db);
$usersRepository->createTable(); //creation of the users table
$usersRepository->addValues(); // adding some values
print_r($usersRepository->getLastThreeUsers()); // fetch the last three values

?>



<?php
require __DIR__ . '/commons/footer.php';
?>
