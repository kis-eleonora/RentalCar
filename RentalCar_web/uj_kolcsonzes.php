<?php
include_once 'connect.php';
if (filter_input(INPUT_POST, "befizetes", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $id = filter_input(INPUT_POST, "id");
    $datum1 = filter_input(INPUT_POST, "datum1");
    $datum2 = filter_input(INPUT_POST, "datum2");
  
    $query = "INSERT INTO `kolcsonzes`(`id`, `tol`, `ig`) VALUES ('$id','$datum1','$datum1')";

    if (mysqli_query($conn, $query)) {
        $_SESSION["success"] = "Sikeres kölcsönzés!";
        include 'kolcsonzes.php';
        exit();
    } else {
        $_SESSION["error"] = "Sikertelen kölcsönzés!";
        include 'kolcsonzes.php';
        exit();
    }
}
?>

