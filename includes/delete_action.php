<?php
    //Predefine array, will save POST request values
    $sku_to_delete = array();

    //Filter to storage only SKU values from POST request
    foreach($_GET as $item){
        if ($item != "Apply" and $item != "includes/delete_action.php"){
            array_push($sku_to_delete, $item);
        }
    }

    //Connect Database
    $conn=mysqli_connect('localhost','root','') or die(mysqli_error());

    //Select Database
    $select_db=mysqli_select_db($conn,'inventory')or die(mysqli_error());

    //Create a loop for each value in the array to delete
    foreach($sku_to_delete as $item){
        //SQL Query to delete data
        $sql = "DELETE FROM office_items WHERE SKU='$item'";

        //Execute Query
        $result=mysqli_query($conn,$sql) or die(mysqli_error());
        if ($result==false){
            echo "Failed";
        }
    }
    // Return back to the parent page
    if ($result==true){
        header('location:../product_list.php');
    }
    
?>