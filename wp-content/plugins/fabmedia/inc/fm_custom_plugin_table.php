<?php

    global $wpdb;
    $table_name = $wpdb->prefix . "fm_custom_plugin";
    $charset_collate = $wpdb->get_charset_collate();
    require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

    if ($wpdb->get_var('SHOW TABLES LIKE "{$table_name}" ') != $table_name ) {
        
        $sql_query_to_create_table = " CREATE TABLE `fm_custom_plugin` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `phone` varchar(255) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            ) $charset_collate; ";

        dbDelta($sql_query_to_create_table);

    }