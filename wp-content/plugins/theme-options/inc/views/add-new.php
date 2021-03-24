<?php

    global $wpdb;
    $table_name = "fm_custom_plugin";
    $msg = '';

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";
    $id = isset($_GET['id']) ? intval($_GET['id']) : "" ;

    $single_data = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $id" );

    if (isset($_POST['submit'])) {

        $action = isset($_GET['action']) ? trim($_GET['action']) : "";
        $id = isset($_GET['id']) ? intval($_GET['id']) : "" ;

        if (!empty($action)) {

            $msg = fm_update_page($id, $_POST["name"], $_POST["email"], $_POST["phone"]);
            
        } 
        else {

            $msg = fm_create_page($_POST["name"], $_POST["email"], $_POST["phone"]);

        }

    }
    

?>
    

<div class="container">

    <h4><?php echo $msg; ?></h4>
    <form id="form_submit" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=add-new<?php if (!empty($action)) { echo '&action=edit&id=' . $id; } ?>" method="post">

        <!-- <input type="hidden" value="<?php //$single_data->id; ?>" name="id">   -->

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo isset($single_data->name) ? $single_data->name : ""; ?>" placeholder="Your name.." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo isset($single_data->email) ? $single_data->email : ""; ?>" placeholder="Your email.." required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="<?php echo isset($single_data->phone) ? $single_data->phone : ""; ?>" placeholder="Your phone.." required>

        <input type="submit" name="submit" value="Submit">

    </form>

</div>