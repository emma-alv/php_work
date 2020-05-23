<?php   //Before starting with the general code, global variables were defined
        define('TITLE', 'Product list');
        $my_name='Emmanuel Rodriguez Alvarado';
        // Including predefined header
        include("includes/header.php");
        include("includes/db_actions.php")
?>
<script>
    //Script to react depending on the action switcher selection
    function action_function(){
        var x = document.getElementById("action_switcher").value;
        document.getElementById("form1").action = x;

    }
</script>
    <div><!-- Top section -->     
        <div class='top_title'>
            <h2>Product List</h1>
        </div><!--End top title section--> 
        <div class='action'>
            <form method='GET' id='form1' action=''>
                <table>
                    <tr>
                        <!-- Action switch --> 
                        <td><select name="action_switcher" class="options" onchange="action_function()" id="action_switcher">
                            <option value="default">Select...</option>
                            <!-- Mass Delete Action will call the action to delete selected items --> 
                            <option value="mass_delete()">Mass Delete Action</option>
                            <!-- Action button, value dinamyc assigned depends on the action switch selection --> 
                        <td><input type="submit" name="Apply" value="Apply" form="form1" class="save"></td>
                    </tr>
                </table>
            </form>
        </div><!--End action section--> 
    </div><!--End top section-->
    <hr>
    <div class='items'>
        <!-- Calling the list action file to get item value from the database and print them out--> 
        <?php //include('includes/list_action.php'); 
                list_action(); ?>
    </div><!-- End items section --> 
<!-- Including predefined header -->
<?php include('includes/footer.php'); ?>