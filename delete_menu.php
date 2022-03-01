<?php

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn, 'menu');

$mid = $_REQUEST['id'];

mysqli_query($conn, "DELETE FROM menus WHERE id='$mid'");

?>