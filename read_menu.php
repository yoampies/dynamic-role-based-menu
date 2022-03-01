<?php 

include('index.php');
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'menu');
$tabledata = mysqli_query($conn,"SELECT * FROM menus");
$mrole = '';
?>

<html>
    <head>
        <title>Edit menus</title>
    </head>
    <body>
        <div class="w-50 border rounded mx-auto mt-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($tabledata)) {
                        
                        $rolename = $row['role_id'];
                        fromidtorole ($rolename);                        
                        $mid = $row['id'];
                        $mtitle = $row['title'];
                        
                        echo "<tr>                                    
                                    <td>$mid</td>
                                    <td><a href='test_visual.php?id=$mid&role=$rolename'>$mtitle</a></td>
                                    <td>$mrole</td>
                                    <td><a href='edit_menu.php?ids=$mid&title=$mtitle&role=$rolename' class='link-dark'>Edit</a></td>
                                    <td><a href='delete_menu.php?id=$mid' class='link-dark'>X</a></td>
                                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>