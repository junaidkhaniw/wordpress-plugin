<?php

    global $wpdb;
    $table_name = "fm_custom_plugin";
    $msg = "";
    $all_data = $wpdb->get_results( "SELECT id, name, email, phone FROM $table_name" );

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";
    $id = isset($_GET['id']) ? intval($_GET['id']) : "" ;
    if (!empty($action) && $action == 'delete') {

        $msg = fm_delete_page($id);   

    }

?>

<h4><?php echo $msg; ?></h4>
<h2>HTML Table</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            foreach($all_data as $data) { 
        ?>
            <tr>
                <td><?php echo $data->id; ?></td>
                <td><?php echo $data->name; ?></td>
                <td><?php echo $data->email; ?></td>
                <td><?php echo $data->phone; ?></td>
                <td>
                    <a href="admin.php?page=add-new&action=edit&id=<?php echo $data->id; ?>">Edit</a>
                    <a href="admin.php?page=fabmedia&id=<?php echo $data->id; ?>&action=delete">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
        
    </tbody>
</table>