<?php
function openCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = null;
        $db = 'bookstore';

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
        return $conn;
    }

    function closeCon($conn)
    {
        $conn->close();
    }

    $conn = openCon();
?>