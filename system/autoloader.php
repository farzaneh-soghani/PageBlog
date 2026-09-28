<?php
/**
 * Autoloader für die automatische Einbindung von Klassen.
 * Registriert eine anonyme Funktion, die Klassen anhand ihres Namens lädt.
 */
spl_autoload_register(function ($class) {
    // Pfad zur Klassendatei (da sich autoloader.php und die Klassendatei im Systemordner befinden)
    $file = __DIR__ . '/class/' . $class . '.php';

    // Datei einbinden, falls sie existiert
    if (file_exists($file)) {
        require_once $file;
    }
});