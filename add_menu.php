<?php

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'menu');
$data = mysqli_query($conn, 'SELECT * FROM roles');
include('index.php')

?>

<div class="card mx-auto mt-5 p-3" style="width: 22rem;">
    <div class="card-body">
        <h5 class="card-title mb-3">Add a menu item</h5>
        <h6 class="card-subtitle text-muted my-3">Remember to think about the roles that will be able to see it</h6>
        <form method="POST" action="insert_menu.php">
            <div class="form-group my-2 text-muted">
                <label for="mtitle">Menu Title</label>
                <input type="text" class="form-control" name ="mtitle" placeholder="Enter Title">
            </div>
            <div class='form-group my-2 text-muted'>
                <label for='exampleFormControlSelect1'>Role type</label>
                <select class='form-control text-muted' name='mrole'>
                    <?php 
                        while ($row = mysqli_fetch_array($data)) {
                        $type = ucfirst($row['type']);
                        echo "
                            <option class='text-muted'>$type</option>
                            "; 
                        }
                    ?>
                </select>
            </div>            
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>