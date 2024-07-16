<?php
function getConfig($key)
{
    $config = [
      'title' => 'Blöder Blog'
    ];
    try {
        return $config[$key];
    } catch (\Exception $e) {
        error_log($e->getMessage());
        return '';
    }
}