<?php
// Einbindung des Autloaders für automatisches Laden von Klassen
require_once 'system/autoloader.php';

/**
 * Abstrakte Basisklasse für alle Modelle.
 * Stellt die Datenbankverbindung bereit und erzwingt bestimmte Methoden.
 */
abstract class Model
{
    protected PDO $dbh;

    /**
     * Konstruktor stellt die PDO-Verbindung über den PDOConnector her.
     */
    public function __construct()
    {
        $pdo = new \PDOConnector();
        $this->dbh = $pdo->getConnection();
    }

    /**
     * Liefert einen einzelnen Datensatz anhand der ID.
     */
    abstract public function getSingle(int $id): array;

    /**
     * Liefert alle Datensätze, optional mit Limit.
     */
    abstract public function getAll(int $limit = 0): array;
}

// Beispiel für die Instanziierung (nachdem die Basisklasse definiert ist)
$model = new ArticlesModel();
$result = $model->getSingle(1);