<?php
function getConfig($key) {
    $config = [
        'title'     => 'Blöder Blog',
        'dbhost'    => '127.0.0.1',
        'db'        => 'farzaneh', // نام دیتابیس
        'dbuser'    => 'root',     // نام کاربری دیتابیس شما (مثلاً root)
        'dbpass'    => '',         // رمز عبور دیتابیس شما
        'dbcharset' => 'utf8mb4'
    ];
    
    return $config[$key] ?? '';
}