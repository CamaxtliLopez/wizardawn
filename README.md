
# Wizardawn TTRPG Content Generators (PHP 8 Modernized)

Wizardawn is a legendary suite of random content generators designed for tabletop role-playing games (TTRPGs). Highly regarded within the Old School Renaissance (OSR) gaming community, it builds deeply detailed wilderness hex maps, settlement descriptions, dungeon geomorph layers, and monster encounter matrices for systems like classic AD&D, B/X, OSRIC, Labyrinth Lord, and Gamma World.

This repository preserves the classic utility suite while updating the codebase to run smoothly in modern server environments.

---

## Code Status & Versions

* **Stable Release:** For the most stable build, use tag `v0.1.0` (recommended on first attempt).
* **Development Branch:** For the latest and greatest fixes, use the `main` branch.

> **Environment Note:** This code is written for PHP version 8.2. Instructions for installing that version of PHP are outside the scope of this document. The code might work under other versions of PHP.

---

## Local Setup & Deployment Guide

Follow these steps to spin up Wizardawn locally on your machine. Think of this process like setting up a virtual gaming table: your database acts as your campaign notebook (holding all the names and tables), and the PHP server acts as the Dungeon Master (generating the content on your screen).

### 1. Clone the Repository
Open your terminal and clone the repository using your credentials or Personal Access Token (PAT):
```bash
git clone https://github.com/CamaxtliLopez/wizardawn.git
cd wizardawn
```

### 2. Configure Your Database (MariaDB/MySQL)
Log into your local MySQL or MariaDB command line prompt as root:
```bash
sudo mariadb -u root -p
```

Run the following SQL commands to create a isolated workspace workspace and application user:
```sql
CREATE DATABASE wizardawn;
CREATE USER 'wizardawn_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON wizardawn.* TO 'wizardawn_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Import the Campaign Data Schema
Load the database tables and TTRPG generators assets into your newly created local database engine using the provided SQL initialization dump file:
```bash
mariadb -u wizardawn_user -p wizardawn < sql/wizardawn.sql
```

### 4. Connect the Code to the Database
Open the main web configuration file in a terminal text editor:
```bash
vi php/config.php
```
Locate the database server variables block and update the credentials to match your local user access details:
```php
$db_host = 'localhost';         // usually 'localhost' on shared hosting
$db_user = 'wizardawn_user';    // your host's database username
$db_pass = 'your_password';     // your host's database password
$database = 'wizardawn';        // the database name you imported the SQL dump into
```

### 5. Launch the Local Web Server
You do not need to install heavy web infrastructure like Apache or Nginx. PHP has a built-in server perfectly suited for local tool deployment. 

Run this command from the repository root folder to fire up the engine. We explicitly bump up the memory limit because generating massive structural wilderness maps and thousands of individual town citizen stats simultaneously easily overflows standard browser RAM defaults:

```bash
php82 -d memory_limit=512M -S localhost:8000 -t php/
```

Keep that terminal window open. Launch your favorite web browser and jump into your new sandbox suite at:
```text
http://localhost:8000
```

---

## Troubleshooting Extensions

If your local browser page returns a database communication error or displays a blank screen, ensure your active PHP configuration file (`php.ini`) has enabled the core database drivers.

1. Open your target environment configuration:
   ```bash
   sudo vi /etc/php82/php.ini
   ```
2. Ensure the following foundational mapping blocks are explicitly loaded and not commented out by leading semicolons (`;`):
   ```ini
   extension=pdo
   extension=mysqlnd
   extension=pdo_mysql
   extension=mysqli
   ```

---

## License

This modernized restoration project is released under the **GNU General Public License v3.0 (GPL-3.0)**, preserving the open, collaborative spirit of the OSR tabletop community and ensuring the code remains free, accessible, and community-driven forever.


