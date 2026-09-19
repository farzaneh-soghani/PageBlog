# PageBlog
## Moderner PHP Blog

Ein vollwertiges Blog-Projekt, entwickelt mit nativem PHP, einer relationalen Datenbank (MariaDB/MySQL) und einem modernen Bootstrap 5 UI/UX-Design. Das Projekt demonstriert saubere Softwarearchitektur, objektorientierte Programmierung (OOP) und Best Practices in der Webentwicklung.

---

## 🚀 Features & Funktionalitäten

* **Dynamische Navigation & Kategorien:** Automatisch generierte Kategorien und Dropdown-Menüs basierend auf der Datenbankstruktur.
* **Artikel-Filterung:** Filtern von Blog-Beiträgen nach spezifischen Kategorien über URL-Parameter.
* **Detailansicht (`single.php`):** Optimierte Einzelansicht für Artikel inklusive dynamischer Bilder, Metadaten (Autor, Veröffentlichungsdatum, Kategorien) und Tags.
* **Interaktiver Kommentarbereich:** Formular zum Einreichen neuer Kommentare mit Validierung und automatischer Zuordnung zum jeweiligen Artikel.
* **Karussell-Slider:** Dynamischer Inhalts-Slider auf der Startseite zur Präsentation wichtiger Beiträge.
* **Sichere Datenbankverbindung:** Nutzung von PHP Data Objects (PDO) mit vorbereiteten Statements (Prepared Statements) zur Verhinderung von SQL-Injections.

---

## 🛠️ Tech Stack

* **Backend:** PHP 8+ (Objektorientiert, PDO)
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5
* **Datenbank:** MariaDB (phpMyAdmin/DBeaver) (Relationale M:N Architektur)
* Umgebung: XAMPP 
* **Versionsverwaltung:** Git & GitHub

---

## 🗄️ Datenbank-Architektur (M:N Schema)

Das Projekt basiert auf einer sauberen relationalen Datenbankstruktur mit folgenden Haupttabellen:
* `Artikel`: Speichert den Inhalt, das Datum und Verknüpfungen.
* `Autoren`: Verwaltet die Ersteller der Artikel.
* `Kategorien`: Beherbergt die Blog-Kategorien (z. B. PHP & Backend, Databases, Web Development).
* `Kategorie_Artikel`: Verknüpfungstabelle zur Realisierung der M:N-Beziehung zwischen Artikeln und Kategorien.
* `Kommentare`: Speichert nutzerspezifische Rückmeldungen zu den Artikeln.
* `Bilder`: Verwaltet Medien und Bildpfade.

---

## ⚙️ Installation & Lokale Einrichtung

1. **Repository klonen:**
   ```bash
   git clone https://github.com/farzaneh-soghani/PageBlog.git
## 📂 Projektstruktur  
```text
PageBlog/
│
├── system/
│   └── config.php      # Datenbank-Konfiguration (nicht in Git)
├── index.php           # Startseite der Anwendung
├── .gitignore          # Ignorierte Dateien und Ordner
└── README.md           # Projektdokumentation
