<?php

include('index.php');

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'menu');

$mid = $_REQUEST['ids'];
$mtitle = $_REQUEST['newmtitle'];
$rolename = $_REQUEST['newmrole'];
$mrole = '';
fromroletoid($rolename);


mysqli_query($conn, "UPDATE menus SET title='$mtitle', role_id='$mrole' WHERE id='$mid'")

?>

<html>
    <head>
        <title>Edited Menu</title>
    </head>
    <body>
        
    <div class="card mx-auto mt-5 p-3" style="width: 22rem;">
        <div class="card-body">
            <h5 class="card-title mb-3">You have succesfuly changed the menu's name to <?php echo $mtitle.'!'?></h5>
            <h6 class="card-subtitle text-muted my-3">Its title is <?php echo $mtitle ?></h6>
            <p>Only <?php echo $rolename.'s'?> will be able to see it</p>
        </div>
        <a class="btn btn-primary" href="index.php">Go back to the Home Page</a>
    </div>

    </body>
</html>