<?php
/**
 * Klasse zur Verwaltung der sicheren Datenbankverbindung mittels PDO.
 */
class PDOConnector
{
    public ?PDO $connection = null;
    
    // PDO-Optionen für Sicherheit und Fehlerausgabe
    private array $pdo_options = [
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        // ATTR_PERSISTENT wurde entfernt, um Verbindungsprobleme auf Shared Hosts zu vermeiden
    ];

    /**
     * Konstruktor lädt die Konfiguration und baut die Verbindung auf.
     */
    public function __construct()
    {
        require_once __DIR__ . '/../config.php';
        
        $dsn = "mysql:host=" . getConfig('dbhost') . ";dbname=" . getConfig('db') . ";charset=" . getConfig('dbcharset');
        $this->connection = new PDO($dsn, getConfig('dbuser'), getConfig('dbpass'), $this->pdo_options);
    }

    /**
     * Gibt die aktive PDO-Verbindung zurück.
     * 
     * @return PDO|null
     */
    public function getConnection(): ?PDO
    {
        return $this->connection;
    }
}