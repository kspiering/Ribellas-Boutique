# CMS zu Ribellas Boutique

- Projekt von Kim Spiering
- WD0323 - 4FSC0WD004 - Back-End Fundamentals
- Abgabe: 25.06.2024

---

## Über dieses Projekt

Die Webseite Ribellas Boutique ist nun mit einem CMS ausgestattet, das ausschliesslich vom Administrator genutzt werden kann. Mit diesem CMS können folgende Aufgaben erledigt werden:

Neue Blogposts erstellen,
Vorhandene Blogposts bearbeiten oder löschen,
Bilder hochladen, wenn ein Blogpost erstellt oder bearbeitet wird.

---

## Logindaten CMS

Logindaten für den Administrator, um das CMS zu verwalten:
Link: http://localhost:8080/cms-login

```
Benutzername: admin123
Passwort: Test123/*
E-Mail: admin@gmail.com (wird nicht für das Login verwendet)
```

---

## Informationen zur Datenbank

Die Datenbank-Datei befindet sich im root-Ordner und heisst `ribellas_boutique.sql`. Diese kann einfach installiert werden nachdem alles vollständig ausgefüllt wurde.

Die Datei um die Datenbank zu konfigurieren ist hier abgelegt: `config.php`'. Möglicherweise müssen Anpassungen vorgenommen werden. Momentane Einstellungen:

```
"DBSERVER", 'localhost';
"DBNAME", 'ribellas_boutique';
"DBUSER", 'root';
"DBPASSWORT", 'root';
```

---

## Installationsanleitung: `config.php` installieren:

$config = include('config.php');

// Zugriff auf Datenbankkonfiguration
$dbHost = $config['database']['host'];
$dbUser = $config['database']['username'];
$dbPass = $config['database']['password'];
$dbName = $config['database']['database_name'];

// Beispiel für eine Datenbankverbindung
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";

// Zugriff auf App-Konfiguration
$debugMode = $config['app']['debug_mode'];
$baseUrl = $config['app']['base_url'];
$loginUrl = $config['app']['login_url'];
$adminUsername = $config['app']['admin_credentials']['username'];
$adminPassword = $config['app']['admin_credentials']['password'];

echo "Admin Login URL: $loginUrl";
echo "Admin Username: $adminUsername";
echo "Admin Password: $adminPassword";

---

## Technische Basis

Das Projekt wurde mit HTML, CSS, Javascript, PHP und MySQL erstellt. Hier die detaillierte Angabe für PHP und MySQL:

- PHP-Version: 8.2
- SQL Server-Version: xx.xx.xx-MariaDB - Source distribution
- Webserver: MAMP

---
# ribellas-boutique
