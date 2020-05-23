<?php
    function db_connection(){
    //Connect Database
    $conn=mysqli_connect('10.0.10.30','web_php','php_p4ssw0rd') or die(mysqli_error());

    //Select Database
    $select_db=mysqli_select_db($conn,'types')or die(mysqli_error());

    return ($conn);
    }

    function list_action(){
        $conn=db_connection();
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
            return "error";
        }
    }

    function add_action(){
        $sku=$_GET['sku'];
        $name=$_GET['name'];
        $price=$_GET['price'];
        $type=$_GET['type'];
        $size=$_GET['size'];
        $height=$_GET['height'];
        $width=$_GET['width'];
        $length=$_GET['length'];
        $weight=$_GET['weight'];

        $conn=db_connection();
         //SQL Query to insert data, coditions depends on the type of item
        if($type=='Office Supplier'){
            $sql="INSERT INTO inventory SET sku='$sku', name='$name', price='$price', type='$type', size='$size'";
        } elseif($type=='Office Furniture'){
            $sql="INSERT INTO inventory SET sku='$sku', name='$name', price='$price', type='$type', height='$height', width='$width', length='$length'";
        } elseif($type=='Others'){
            $sql="INSERT INTO inventory SET sku='$sku', name='$name', price='$price', type='$type', weight='$weight'";
        }
        //Execute Query
        if ($sql){
            $result=mysqli_query($conn,$sql) or die(mysqli_error());
        }

        if ($result==true){
            // Return back to the parent page
            header('location:../product_add.php');
        }else{
            return "Failed";
        }

    }

    function delete_action(){
    //Predefine array, will save GET request values
    $sku_to_delete = array();

    //Filter to storage only SKU values from GET request
    foreach($_GET as $item){
        if ($item != "Apply" and $item != "includes/delete_action.php"){
            array_push($sku_to_delete, $item);
        }
    }
    $conn=db_connection();

    //Create a loop for each value in the array to delete
    foreach($sku_to_delete as $item){
        //SQL Query to delete data
        $sql = "DELETE FROM office_items WHERE SKU='$item'";

        //Execute Query
        if ($sql){
            $result=mysqli_query($conn,$sql) or die(mysqli_error());
        }
        if ($result==false){
            echo "Failed";
        }
    }
    // Return back to the parent page
    if ($result==true){
        header('location:../product_list.php');
    }

    }
?>