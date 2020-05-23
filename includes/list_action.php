<?php
    //Connect Database
    $conn=mysqli_connect('10.0.10.30','web_php','php_p4ssw0rd') or die(mysqli_error());
    
    //Select Database
    $select_db=mysqli_select_db($conn,'types')or die(mysqli_error());

    //SQL Query to insert data
    $sql="SELECT * FROM inventory";
    $result=mysqli_query($conn, $sql) or die(mysqli_error());
    
    //If no errors
    if ($result==true){        
        while ($row = mysqli_fetch_array($result)) { 
            $count = 0;?>
            <div class='item'>
                <!-- Checkbox later use in case of delete action--> 
                <input type="checkbox" name="<?php echo $row['SKU']; ?>" value="<?php echo $row['SKU']; ?>" form="form1">
                <li><?php print ($row['SKU']); ?></li>
                <li><?php print ($row['Name']); ?></li>
                <li>€ <?php print ($row['price']); ?></li>
                <!-- Condition to print right format of special attributes--> 
                <?php if($row['type']=='Office Supplier'){ ?>
                <li>Size: <?php print ($row['size']); ?> MB</li>
            <?php } elseif($row['type']=='Office Furniture'){?>
                <li>Dimension: <?php print ($row['height']); ?>x<?php print ($row['width']); ?>x<?php print ($row['length']); ?></li>
            <?php } elseif($row['type']=='Others'){?>
                <li>Weight: <?php print ($row['weight']); ?> Kg</li>
            <?php }?>
            </div><!-- End item section -->
    
        <?php }

    }else{
        echo "error";
    }
?>
