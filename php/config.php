<?php

// ---------------------------------------------------------------------------
// Database + environment configuration.
// Edit these values to match your web host (cPanel/SSH) database credentials.
// ---------------------------------------------------------------------------

// Database connection settings
$db_host = 'localhost';        // usually 'localhost' on shared hosting
$db_user = 'wizardawn_user';             // your host's database username
$db_pass = 'your_password';                 // your host's database password
$database = 'wizardawn';       // the database name you imported the SQL dump into

// Host (and optional port) portion of the site URL, used by some pages/links.
// e.g. 'www.example.com'
$webdir = 'localhost:808';

// Public base URL of the site (used to build links). No trailing behaviour changes;
// set this to your live domain, e.g. 'https://www.example.com/'
$webadd = 'http://' . $webdir . '/';

// Base URL used for license/notice pages
$webnot = 'http://localhost:808/lic/';

// Filesystem path to htdocs (kept for backward compatibility with existing code)
$webfld = __DIR__ . '/';

// Set to 1 to allow downloading maps to JPG
$allow_image_download = 1;

// Set to true while migrating/debugging so PHP 8.2 errors are visible.
// Set to false once the site is confirmed working in production.
$debug_mode = false;
//$debug_mode = true;

// ---------------------------------------------------------------------------
// num(): PHP 8 safe numeric coercion.
// Legacy code used the "num($value)" idiom to force a value to a number. On
// PHP 8 adding 0 to an empty/non-numeric string throws a fatal TypeError.
// This helper reproduces the old behaviour: numeric strings keep their value,
// everything else (empty, null, non-numeric) becomes 0.
// ---------------------------------------------------------------------------

if (!function_exists('num')) {
    function num($value)
    {
        return is_numeric($value) ? ($value + 0) : 0;
    }
}

