<?php
    $db = mysqli_connect("localhost", "root", "", "phptest", "3306");

    if ($db != false)
        print "conecta3 <br>";

    $result = mysqli_query($db, "SELECT * FROM equipos");
    $numrows = mysqli_num_rows($result);

    print "theres a lot of rows: $numrows";
?>