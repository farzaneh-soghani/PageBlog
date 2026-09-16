<?php

/**
 * Klasse zur Steuerung von Ausgaben oder für Testzwecke.
 */
class Ausgabe
{
    /**
     * Eine Test-Methode zur Überprüfung der Funktionalität.
     * Gibt einen Test-String aus und bricht die Skriptausführung ab.
     */
    public function eineMethode(): void
    {
        echo "Test!!";
        die();
    }
}