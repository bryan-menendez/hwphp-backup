<?php
    /**
     * sha1() will always give the same output for a given input. 
     * If you set the optional second parameter to true, 
     * the SHA1 hash is returned in raw binary format and will have a length of 20. 
     */
    
    print sha1("hello") . "\n";


    /**
     *  password_hash() uses salts (random seed) so every output will be different
     * 
     *  string password_hash ( string password, int algorithm [, array options])
     *  bool password_verify ( string password, string hash) 
     * 
     *  It is slower than plain sha1
     * 
     * password_hash() takes a second parameter that lets you specify the algorithm, 
     * but you can specify "PASSWORD_DEFAULT" to have it automatically use the recommended algorithm. 
     */

    echo password_hash("frosties", PASSWORD_DEFAULT), "\n";
    echo password_hash("frosties", PASSWORD_DEFAULT), "\n";
    echo password_hash("frosties", PASSWORD_DEFAULT), "\n";

    $hash = password_hash("frosties", PASSWORD_DEFAULT);
    if (password_verify("frosties", $hash)) {
        echo "Password match!\n";
    }

    /**
     * you can also use md5
     * 
     * string md5 ( string source [, bool raw_output]) 
     */

    $md5hash = md5("My string");
    print $md5hash;
?>