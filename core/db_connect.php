<?php
// hiermee kun je $_SESSION globals gaan gebruiken
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "books";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

// define("BASEURL","http://localhost/Year%202/Periode%205/database/opdracht%201/");
define("BASEURL","http://localhost/Year%202/Periode%205/database/Database-opd1/");



function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}