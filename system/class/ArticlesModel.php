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
        $sql = "SELECT artikel.ArtikelID, Titel, Text, Name, Bezeichnung, Pfad, Datum, AltText 
                FROM artikel
                JOIN autoren ON artikel.AutorID = autoren.AutorID
                JOIN kategorie_artikel USING (ArtikelID)
                JOIN kategorien USING (KategorieID)
                JOIN bilder ON bilder.BilderID = artikel.BilderID
                WHERE artikel.ArtikelID = ?";
                
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$id]);
        
        return $stmt->fetch() ?: [];
    }

    /**
     * Lädt alle Artikel absteigend nach Datum, optional mit Limit.
     */
    public function getAll(int $limit = 0): array
    {
        $sql = "SELECT artikel.ArtikelID, Titel, Text, Pfad, AltText, Datum 
                FROM artikel 
                JOIN bilder USING(BilderID) 
                ORDER BY Datum DESC";
                
        // Optionales Limit sicher anhängen, falls größer als 0
        if ($limit > 0) {
            $sql .= " LIMIT " . (int)$limit;
        }
        
        return $this->dbh->query($sql)->fetchAll();
    }
}