<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

ini_set('display_errors', 0);
error_reporting(0);

if ( session_id() == '' || !isset($_SESSION) )
{
    session_start();
}

include("vars.php");

$allow_image_download = 1; // SET TO "1" IF YOU WANT TO ALLOW PEOPLE TO DOWNLOAD MAPS TO JPG

mysqli_connect('localhost', 'root', '') or die ("Unable to connect!");

$webdir = "localhost:808";
$webfld = substr(__FILE__, 0, 1) . ":/Wizardawn/htdocs/";
$webadd = "http://" . $webdir . "/";
$webnot = "http://localhost:808/lic/";

$database = "wizardawn";
$connection = new mysqli('localhost', 'root', '', $database);

set_time_limit(300);

$tool = 0; if ( isset($_GET['tool']) ){ $tool = $_GET['tool']; }
$osr = 0; if ( isset($_GET['osr']) ){ $osr = $_GET['osr']; }

$date_now = date('Y-m-d H:i:s');

$rarecash = 8;		/// THE LOWER THE NUMBER, THE MORE OFTEN NON-COIN TREASURE WILL APPEAR
$lvl_modifier = 2;	/// LEVEL MODIFIER TO GET ALL THE MONSTERS AVAILABLE

include_once("functions/atmosphere.php");
include_once("functions/books.php");
include_once("functions/characters_osric.php");
include_once("functions/city_fantasy.php");
include_once("functions/city_tt.php");
include_once("functions/city_gn.php");
include_once("functions/city_post_apocalyptic.php");
include_once("functions/colors.php");
include_once("functions/containers.php");
include_once("functions/curses.php");
include_once("functions/descriptions.php");
include_once("functions/encounters.php");
include_once("functions/items_post_apocalyptic.php");
include_once("functions/item_fantasy.php");
include_once("functions/item_fantasy_gems_jewels.php");
include_once("functions/item_post_apocalyptic.php");
include_once("functions/magic_item_fantasy.php");
include_once("functions/magic_item_osric.php");
include_once("functions/magic_item_properties.php");
include_once("functions/misc.php");
include_once("functions/money.php");
include_once("functions/monster.php");
include_once("functions/names.php");
include_once("functions/potion_appearances.php");
include_once("functions/retro_info.php");
include_once("functions/rooms_fantasy.php");
include_once("functions/spells.php");
include_once("functions/traps_fantasy.php");
include_once("functions/traps_post_apocalyptic.php");
include_once("functions/treasure_map.php");
include_once("functions/vehicle_and_robots.php");
include_once("functions/weapon_equipped.php");
include_once("functions/tt_saves.php");
include_once("functions/tt_arms_and_armor.php");
include_once("functions/magic_items_rpgs.php");
include_once("functions/zombies.php");
include_once("functions/item_zombies.php");
include_once("functions/furnish.php");
include_once("functions/geomorphs.php");

?>