<?php

function fm_create_page($name, $email, $phone) {

    global $wpdb;
    $table_name = "fm_custom_plugin";
    
    $result = $wpdb->insert(
        $table_name, 
        array(
            "name"  => $name,
            "email" => $email,
            "phone" => $phone
        )
    );

    if ($result > 0) {
    
        $redirect = site_url() . '/wp-admin/admin.php?page=fabmedia';
        ?> 
            <script>
                <?php echo("location.href = '".$redirect."';");?>
            </script>
        <?php
        
    }
    
}

function fm_update_page($id, $name, $email, $phone) {

    global $wpdb;
    $table_name = "fm_custom_plugin";

    $result = $wpdb->update(
        $table_name,
        array(
            "name"  => $name,
            "email" => $email,
            "phone" => $phone
        ),
        array(
            "id"    => $id
        )
    );

    if ($result) {
    
        $redirect = site_url() . '/wp-admin/admin.php?page=fabmedia';
        ?> 
            <script>
                <?php echo("location.href = '".$redirect."';");?>
            </script>
        <?php
        
    }

    return "Successfully Updated";

}

add_action ('wp_loaded', 'fm_delete_page');
function fm_delete_page($id){

    global $wpdb;
    $table_name = "fm_custom_plugin";

    $result = $wpdb->delete(
        $table_name,
        array( 
            'id' => $id
        )
    );

    if ($result) {
    
        $redirect = site_url() . '/wp-admin/admin.php?page=fabmedia';
        ?> 
            <script>
                <?php echo("location.href = '".$redirect."';");?>
            </script>
        <?php
        
    }

    return "Successfully Deleted";
    

}