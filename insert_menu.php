<?php

$mtitle = $_POST['mtitle'];
$conn = mysqli_connect('localhost','root','') or die('Problems connecting');
$rolename = $_POST['mrole'];
$mrole = '';

include('index.php');

fromroletoid($rolename);
if ($mtitle && $rolename) {
    GLOBAL $conn;
    GLOBAL $db;
    mysqli_query($conn, "INSERT INTO menus(title,role_id) VALUES ('$mtitle','$mrole')");
}

?>

<html>
    <head>
        <title>Insert</title>
    </head>
    <body>
        
    <div class="card mx-auto mt-5 p-3" style="width: 22rem;">
        <div class="card-body">
            <h5 class="card-title mb-3">You've just created a Menu for: <?php echo $rolename.'s'?></h5>
            <h6 class="card-subtitle text-muted my-3">Its title is <?php echo $mtitle ?></h6>
            <p>Remember that only <?php echo $rolename.'s'?> will be able to see it</p>
        </div>
        <a class="btn btn-primary" href="index.php">Go back to the Home Page</a>
    </div>

    </body>
</html>