<?php

function fromroletoid($rolename) {

    global $conn;
    mysqli_select_db($conn, 'menu');
    $roleid = mysqli_query($conn, "SELECT id FROM roles WHERE type='$rolename'");
    $rolearray = mysqli_fetch_array($roleid);
    $GLOBALS['mrole'] =  $rolearray['id'];

}

/* Function allows to take the role selected in the form and changes it into the
role_id that should be submitted into the menus, submenus and users tables.
It takes in the $role variable, which should be the POST data you get from the form, 
regarding the role for whom the menu or submenu should be visible to, or the role of the user*/

function fromidtorole($roleid) {
 
    global $conn;
    mysqli_select_db($conn, 'menu');
    $rolename = mysqli_query($conn, "SELECT type FROM roles WHERE id='$roleid'");
    $rolearray = mysqli_fetch_array($rolename);
    $GLOBALS['mrole'] =  ucfirst($rolearray['type']);
}

function menunav($sText){
    echo '
    <html>
        <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Test Visual</a>                
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">                        
                        '. $sText .'
                        </ul>
                    </div>
                </div>
            </nav>        
        </body>
    ';
}

?>