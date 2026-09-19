<?php

/**
 * Modell zur Verwaltung von Artikeln.
 */
class ArticlesModel extends Model
{
    /**
     * Lädt einen einzelnen Artikel anhand seiner ID inklusive Autor, Kategorie und Bild.
     */
    public function getSingle(int $id): array 
    {
        $sql = "SELECT Artikel.ArtikelID, Titel, Text, Name, Bezeichnung, Pfad, Datum, AltText 
                FROM Artikel
                JOIN Autoren ON Artikel.AutorID = Autoren.AutorID
                JOIN Kategorie_Artikel USING (ArtikelID)
                JOIN Kategorien USING (KategorieID)
                JOIN Bilder ON Bilder.BilderID = Artikel.BilderID
                WHERE Artikel.ArtikelID = ?";
                
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$id]);
        
        return $stmt->fetch() ?: [];
    }

    /**
     * Lädt alle Artikel absteigend nach Datum, optional mit Limit.
     */
    public function getAll(int $limit = 0): array
    {
        $sql = "SELECT Artikel.ArtikelID, Titel, Text, Pfad, AltText, Datum 
                FROM Artikel 
                JOIN Bilder USING(BilderID) 
                ORDER BY Datum DESC";
                
        // Optionales Limit sicher anhängen, falls größer als 0
        if ($limit > 0) {
            $sql .= " LIMIT " . (int)$limit;
        }
        
        return $this->dbh->query($sql)->fetchAll();
    }
}