<?php

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'menu');
$data = mysqli_query($conn, 'SELECT * FROM roles');
include('index.php');

$mrole = $_REQUEST['role'];
fromidtorole($mrole);

?>

<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
        
    <div class="card mx-auto mt-5 p-3" style="width: 22rem;">
        <div class="card-body">
            <h5 class="card-title mb-3">Editing menu: <?php echo $_REQUEST['title']; ?></h5>
            <h6 class="card-subtitle text-muted my-3">Remember to check the role for whom this menu will show</h6>
            <form method="POST" action="change_menu.php">
                <div class="form-group my-2 text-muted">
                    <label for="newmtitle">Menu Title</label>
                    <input type="text" class="form-control" name ="newmtitle" value="<?php echo $_REQUEST['title']; ?>">
                    <input type="hidden" name="ids" value="<?php echo $_REQUEST['ids']; ?>">
                </div>
                <div class='form-group my-2 text-muted'>
                    <label for='newmrole'>Role type</label>
                    <select class='form-control text-muted' name='newmrole'>
                        <?php 
                            while ($row = mysqli_fetch_array($data)) {
                            $type = ucfirst($row['type']);
                                if ($type == $mrole) {
                                    echo "<option class='text-muted' selected>$mrole</option>"; 
                                }
                                else {
                                    echo "<option class='text-muted'>$type</option>"; 
                                }
                            }
                        ?>
                    </select>
                </div>            
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>

    </body>
</html>