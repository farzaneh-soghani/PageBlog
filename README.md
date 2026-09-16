# PageBlog

Ein modular aufgebautes PHP OOP Weblog- und Content-Management-Projekt, entwickelt mit modernem PHP, PDO und einer relationalen Datenbank.

## 🚀 Funktionen (Features)
- **Objektorientierte Architektur (OOP):** Saubere Trennung von Logik, Daten und Darstellung.
- **Datenbank-Integration:** Sichere Verbindung zu MySQL/MariaDB über PDO für die Verwaltung von Artikeln und Inhalten.
- **Sicherheit:** Getrennte Konfigurationsdatei (`config.php`) zum Schutz sensibler Zugangsdaten (ausgeschlossen via `.gitignore`).
- **Modernes Layout:** Responsive Design mit sauberer Benutzeroberfläche.

## 🛠️ Technologien
- **Backend:** PHP (OOP, PDO)
- **Datenbank:** MySQL / MariaDB (phpMyAdmin)
- **Umgebung:** XAMPP (Apache / PHP)
- **Versionsverwaltung:** Git & GitHub

## 📂 Projektstruktur
```text
PageBlog/
│
├── system/
│   └── config.php      # Datenbank-Konfiguration (nicht in Git)
├── index.php           # Startseite der Anwendung
├── .gitignore          # Ignorierte Dateien und Ordner
└── README.md           # Projektdokumentation