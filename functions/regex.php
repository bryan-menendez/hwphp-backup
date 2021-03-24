<?php
    /**
     * regex is complex
     * read documentation when needed 
     * or go to https://regex101.com/
     */


    if (preg_match("/php/", "php")) {
        print "Got match!\n";
    }

    if (preg_match("/php/", "PHP")) {
        print "Got match!\n";
    }

    if (preg_match("/php/i", "php")) {
        print "Got match!\n";
    }
?>