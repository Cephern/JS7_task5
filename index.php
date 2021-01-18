<?php
    date_default_timezone_set('Europe/Moscow');

    $dateClass = new class {
        function __construct($format = 'j/m/y H:i') {
            $this -> format = $format;
        }

        function getDate() {
            return date($this -> format);
        }
    };

    $date = $dateClass ->getDate();

    if(isset($_GET['print']) && isset($_GET['public'])) {
        header ('Access-Control-Allow-Origin: *');
        header('Content-Type: text/plain; charset=utf-8');
        header('Access-Control-Allow-Methods: GET, POST, DELETE');

        echo file_get_contents(basename(__FILE__));
     } else {
        echo "<h1>" . $date . "</h1>";
    }
?>