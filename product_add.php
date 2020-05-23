<?php //Global variables
        define('TITLE', 'Product add');
        $my_name='Emmanuel Rodriguez Alvarado';
        $types = array('Office Supplier', 'Office Furniture', 'Others');
        include("includes/header.php");
        include("includes/db_actions.php")
?>
<script>
    // Special attributes dynamically changed when type is switched
    function type_function(){
        var x = document.getElementById("type_switcher").value;
        var types_switch = {
                            "Office Supplier": {
                                                'html_form':'<tr><td>Size</td><td><input type="text" name="size" form="form1" required></td></tr>',
                                                'description': '<h4>Please provide Size of the CD in MB</h4>'},
                            "Office Furniture": {'html_form':'<tr><td>Height</td><td><input type="text" name="height" form="form1" required></td></tr> \
                                                <tr><td>Width</td><td><input type="text" name="width" form="form1"></td></tr> \
                                                <tr><td>Length</td><td><input type="text" name="length" form="form1"></td></tr>',
                                                'description':'<h4>Please provide dimensions in HxWxL format</h4>'},
                            "Others": {'html_form':'<tr><td>Weight</td><td><input type="text" name="weight" form="form1" required></td></tr>',
                                        'description': '<h4>Please provide weight in Kg</h4>'}};
        document.getElementById("type_values").innerHTML = '<table>' + types_switch[x]['html_form']+ '</table>' + types_switch[x]['description'];

    }
</script>
    <div>
        <div class='top_title'>
            <h2>Product Add </h1>
        </div><!--End top title section--> 
        <div class='action'>
            <!-- Action button--> 
            <input type="submit" name="Save" value="Save" form="form1" class="save">
        </div><!--End action section--> 
    </div><!--End top section-->
    <br>
    <hr>
    <div>
        <!-- Form of values for the POST method --> 
        <form method="GET" id="form1" action="<?php add_action(); ?>">
            <table>
                <tr>
                    <td>SKU</td>
                    <td><input type="text" name="sku" required></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="price" required></td>
                </tr>
                <tr>
                    <td>Type switcher</td>
                    <td><select name="type" onchange="type_function()" id="type_switcher">
                        <option value="default">Select...</option>
                    <!-- Types switcher dynamic populated --> 
                    <?php foreach($types as $type){ ?>
                        <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                    <?php } ?>
            </table>
            <div id="type_values">
            </div><!-- End type values section -->
        </form>
    </div><!--End form main attributes section --> 

<?php include('includes/footer.php'); ?>