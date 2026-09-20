<?php
function getConfig($key) {
    $host = $_SERVER['HTTP_HOST'] ?? '';
    
    $isLocal = (str_contains($host, 'localhost') || str_contains($host, '127.0.0.1'));
    
    $config = [
        'title'     => 'PageBlog',
        'dbhost'    => $isLocal ? '127.0.0.1' : 'sql203.infinityfree.com',
        'db'        => $isLocal ? 'pageblog' : 'if0_42964925_pageblock_db',
        'dbuser'    => $isLocal ? 'root' : 'if0_42964925',
        'dbpass'    => $isLocal ? '' : '24BBImHqybswtKp',
        'dbcharset' => 'utf8mb4'
    ];
    
    return $config[$key] ?? '';
}