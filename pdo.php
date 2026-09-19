<?php
class PDOConnector
{
    public ?PDO $connection = null;
    private array $pdo_options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function __construct()
    {
        require_once __DIR__ . '/config.php';
        
        $dsn = "mysql:host=" . getConfig('dbhost') . ";dbname=" . getConfig('db') . ";charset=" . getConfig('dbcharset');
        $this->connection = new PDO($dsn, getConfig('dbuser'), getConfig('dbpass'), $this->pdo_options);
    }

    public function getConnection(): ?PDO
    {
        return $this->connection;
    }
}