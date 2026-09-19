<?php
function getConfig($key) {
    $config = [
        'title'     => 'PageBlog',
        'dbhost'    => '127.0.0.1',
        'db'        => 'pageblog', 
        'dbuser'    => 'root',     
        'dbpass'    => '',         
        'dbcharset' => 'utf8mb4'
    ];
    
    return $config[$key] ?? '';
}