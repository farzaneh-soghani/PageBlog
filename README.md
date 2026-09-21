# PageBlock - Moderner PHP Blog

Ein vollwertiges Blog-Projekt, entwickelt mit nativem PHP, einer relationalen Datenbank (MariaDB/MySQL) und einem modernen Bootstrap 5 UI/UX-Design. Das Projekt demonstriert saubere Softwarearchitektur, objektorientierte Programmierung (OOP) und Best Practices in der Webentwicklung.  
## 🌐 Live Demo

[![Live Demo](https://img.shields.io/badge/Live_Demo-PageBlock-brightgreen?logo=php&logoColor=white)](http://farzaneh-soghani-pageblock.infinityfreeapp.com/)

---

## 🚀 Features & Funktionalitäten

* **Dynamische Navigation & Kategorien:** Automatisch generierte Kategorien und Dropdown-Menüs basierend auf der Datenbankstruktur.
* **Artikel-Filterung:** Filtern von Blog-Beiträgen nach spezifischen Kategorien über URL-Parameter.
* **Detailansicht (`single.php`):** Optimierte Einzelansicht für Artikel inklusive dynamischer Bilder, Metadaten und Tags.
* **Interaktiver Kommentarbereich:** Formular zum Einreichen neuer Kommentare mit Validierung und automatischer Zuordnung.
* **Karussell-Slider:** Dynamischer Inhalts-Slider auf der Startseite zur Präsentation wichtiger Beiträge.
* **Sichere Datenbankverbindung:** Nutzung von PHP Data Objects (PDO) mit vorbereiteten Statements zur Verhinderung von SQL-Injections.
---

## 🛠️ Tech Stack

* **Backend:** PHP 8+ (Objektorientiert, PDO)
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5
* **Datenbank:** MariaDB (phpMyAdmin/DBeaver) (Relationale M:N Architektur)
* **Lokale Umgebung:** Lokaler Webserver (XAMPP)
* **Hosting & Server:** InfinityFree (Linux-basierter Webserver)
* **Deployment-Tools:** FileZilla (FTP-Übertragung)
* **Versionsverwaltung:** Git & GitHub

---

🗄️ Datenbank-Architektur (M:N Schema)

Das Projekt basiert auf einer sauberen relationalen Datenbankstruktur mit folgenden Haupttabellen und Verknüpfungen:
* **Artikel:** Speichert den Inhalt, Titel, das Veröffentlichungsdatum und zugehörige Kerninformationen der Blog-Beiträge.
* **Autoren:** Verwaltet die Ersteller und Autoren der jeweiligen Artikel.
* **Bilder:** Verwaltet Medien, Bilddateien und deren Pfade für die Beiträge.
* **Kategorien:** Beherbergt die Blog-Kategorien (z. B. PHP & Backend, Databases, Web Development).
* **Kategorie_Artikel:** Die M:N-Verknüpfungstabelle zwischen Artikeln und Kategorien zur flexiblen Zuordnung.
* **Kommentare:** Speichert die eigentlichen Rückmeldungen und Kommentare zu den Artikeln.
* **Kommentare_Artikel:** Die Verknüpfungstabelle zwischen Kommentaren und Artikeln.
* **Kommentierende:** Verwaltet die Daten der Personen, die Kommentare verfassen.

---

## ⚙️ Installation & Lokale Einrichtung

1. **Repository klonen:**
   ```bash
   git clone https://github.com/farzaneh-soghani/PageBlog.git

2. **Webserver starten:**
   * Starten Sie Apache in XAMPP und legen Sie das Projekt in das Verzeichnis Ihres lokalen Webservers (`htdocs`).

3. **Datenbank einrichten:**
   * Importieren Sie die SQL-Struktur aus dem `sql/`-Ordner in Ihre MariaDB-Datenbank.
   * Passen Sie die Zugangsdaten in `pdo.php` an.

4. **Projekt im Browser öffnen:**
   http://localhost/PageBlock/index.php

---

## 📂 Projektstruktur

```text
PageBlock/
│
├── css/                 # Stylesheets und Design-Anpassungen
├── js/                  # JavaScript-Dateien für Interaktivität
├── sql/                 # SQL-Skripte und Datenbank-Dumps
├── system/              # Backend-Klassen, Autoloader und Logik
│
├── articles.php         # Logik und Template für die Artikelliste (inkl. Filter)
├── carousel.php         # Dynamischer Slider-Bereich für die Startseite
├── config.php           # Zentrale Konfigurationsdatei
├── formtarget.php       # Verarbeitung von Formulardaten
├── header.php           # HTML-Header (Doctype, Meta-Tags, CSS/JS-Einbindungen)
├── index.php            # Hauptseite des Blogs
├── kommentare.php       # Verwaltung und Anzeige der Kommentare
├── navigation.php       # Dynamische Menü- und Kategorien-Navigation
├── pdo.php              # Datenbankverbindung über PDO
└── single.php           # Detailansicht für einzelne Artikel
