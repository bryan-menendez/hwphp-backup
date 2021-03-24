<?php
    /**
     * Handling file uploads
     * 
     * bool move_uploaded_file ( string filename, string destination)
     */
    $file = $_FILES['userfile'];

    print "Recieved file: <b> {$file['name']} </b> <br><br>";

    print "File details: ";
    print "<pre>";
    var_dump($file); 
    print"</pre>";

    print "<br>";
    print "Its contents are: ";
    print "<br>";

    print "<pre>";
    readfile($file['tmp_name']);
    print"</pre>";
    print "<br><br>";

    if (move_uploaded_file($file['tmp_name'], "../uploads/" . $file['name'])) {
        print "Upload successful!";
    } else {
        print "Upload failed!";
    }
?>