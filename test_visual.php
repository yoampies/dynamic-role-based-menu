<?php

include('links.php');
include('functions.php');
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'menu');

error_reporting(E_ALL & ~E_WARNING);

$mrole = $_REQUEST['role'];
//$sText=''; 
//$sSub='';
//$a_submenu = array();

$sql = "SELECT id, title, menu_id FROM submenus WHERE role_id = '$mrole' ORDER BY show_order asc";
$result = mysqli_query ($conn,$sql);

while ($row = mysqli_fetch_array($result)){
    $a_submenu[$row[2]].='<li><a class="dropdown-item" href="add_menu.php">'.$row[1].'</a></li>';          
}

$data = mysqli_query($conn, "SELECT id, title, role_id FROM menus WHERE role_id = '$mrole'");

while ($row = mysqli_fetch_array($data)) {
    $sText.= "<li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                ".$row[1]."
            </a>";
    $sText.= '<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">'.$a_submenu[$row[0]].'</ul>';
    $sText.= '</li>';
    
}

menunav($sText);

mysqli_close($conn);

?>
