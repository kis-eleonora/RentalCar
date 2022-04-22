<?php

$conn = new mysqli('localhost', 'root', '', 'rentalcar');
if ($conn->connect_errno) {
    throw new RuntimeException('mysqli connection error: ' . $conn->connect_error);
}

/* Set the desired charset after establishing a connection */
$conn->set_charset('utf8mb4');
if ($conn->errno) {
    throw new RuntimeException('mysqli error: ' . $conn->error);
}
