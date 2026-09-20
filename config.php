<?php
function getConfig($key) {
    $isLocal = ($_SERVER['HTTP_HOST'] ?? '') === 'localhost' || str_contains($_SERVER['HTTP_HOST'] ?? '', '127.0.0.1');
    
    $config = [
        'title'     => 'PageBlog',
        'dbhost'    => 'sqlXXX.infinityfree.com', 
        'db'        => 'if0_42964925_pageblock_db', 
        'dbuser'    => 'if0_42964925',            
        'dbpass'    => '24BBImHqybswtKp',           
        'dbcharset' => 'utf8mb4'
    ];
    
    return $config[$key] ?? '';
}