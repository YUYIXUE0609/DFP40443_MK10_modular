<?php
session_start();

$menu = $_GET['menu'] ?? 'utama';

require "view/header.php";

switch ($menu) {

    case "tempah":

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require "process/tempahan.php";
        }

        require "view/tempah.php";
        break;

    case "invois":
        require "view/invois.php";
        break;

    default:
        require "view/utama.php";

}

require "view/footer.php";
?>