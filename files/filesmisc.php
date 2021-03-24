<?php
    /**
     * Temporary files
     * 
     * resource tmpfile ( void )
     * 
     * Very often you will find you want to work with a file as if it were a "scratchpad" - 
     * a holding area where you can write out temporary data for later use. 
     * To make this as easy as possible, PHP has a function called tmpfile() which takes no parameters, 
     * but will create a temporary file on the system, fopen() it for you, and send back the file handle as its return value.
     * 
     * That file is then yours to read from and write to all you wish, 
     * and is deleted as soon as you fclose() the file handle or the script ends. 
     * 
     * Here is an example of tmpfile() in use: 
     */

    $handle = tmpfile();
    $numbytes = fwrite($handle, $mystring);
    fclose($handle);
    print "$numbytes bytes written\n";

    /**
     * Other file functions
     * 
     * bool rewind ( resource handle)
     * int fseek ( resource handle, int offset [, int from_where])
     * 
     *  There are three functions that allow you to work more intimately with the contents of a file, 
     * which are rewind(), fseek(), and fwrite(). We already looked at fwrite(), but the other two functions are new. 
     * Rewind() is a very helpful function that moves the file pointer 
     * for a specified file handle (parameter one) back to the beginning. 
     * That is, if you call rewind($handle), the file pointer of $handle gets reset to the beginning - 
     * this allows you to re-read in a file, or write over whatever you have already written.
     * 
     * Fseek() allows you to move a file handle's pointer to an arbitrary position, specified by parameter two, 
     * with parameter one being the file handle to work with. If you do not specify a third parameter, 
     * fseek() sets the file pointer to be from the start of the file, meaning that passing 23 will move to byte 24 of the file 
     * (files start from byte 0, remember). For the third parameter you can either pass SEEK_SET, 
     * the default, which means "from the beginning of the file", SEEK_CUR, which means 
     * "relative to the current location", or SEEK_END, which means "from the end of the file". 
     */

    $handle = fopen($filename, "w+");
    fwrite($handle, "Mnnkyys\n");
    rewind($handle);
    fseek($handle, 1);
    fwrite($handle, "o");
    fseek($handle, 2, SEEK_CUR);
    fwrite($handle, "e");
    fclose($handle);

    /**
     * Author's Note: do not forget that the first byte of a file is byte 0, and you count upwards from there -
     * the second byte is at index 1, the third at index 2, etc.
     * 
     * To begin with, the string "Mnnkyys" is written to $handle, which is straightforward enough. 
     * However, rewind() is then called to move the file pointer back to the beginning of the file (the letter "M"), 
     * then fseek() is called with 1 as the second parameter to move the file pointer to offset 1 in the file, 
     * which is currently the first of two letter "n"s. Fwrite() is called again, writing an "o" - 
     * this will replace the current letter "n" at that offset with an "o". Fseek() is called again, 
     * passing in 2 and SEEK_CUR, which means "move to the byte 2 ahead of the current byte", 
     * which happens to be the first of two letter "y"s. Fwrite() is called for the last time, 
     * replacing that "y" with an "e", and finally the file is closed - I will leave it to you to figure out its contents!
     */



    /**
     * Temporary files
     * 
     * resource tmpfile ( void )
     * 
     * Very often you will find you want to work with a file as if it were a "scratchpad" - 
     * a holding area where you can write out temporary data for later use. To make this as easy as possible, 
     * PHP has a function called tmpfile() which takes no parameters, but will create a temporary file on the system, 
     * fopen() it for you, and send back the file handle as its return value. 
     */


    /**
     * Checking whether a file exists
     * 
     * bool file_exists ( string filename)
     */

    /**
     * Retrieving a file's status
     * 
     * bool is_readable ( string filename)
     * bool is_writeable ( string filename)
     * bool is_executable ( string filename)
     * bool is_file ( string filename)
     * bool is_dir ( string filename)
     * void clearstatcache ( void )
     * 
     * Is_readable() and friends have their results cached for speed purposes - 
     * if you call is_file() on a filename several times in a row, 
     * PHP will calculate it the first time around then used the same value again and again in the future. 
     * If you want to clear this cached data so that PHP will have to check is_file() properly, 
     * you need to use the clearstatcache() function. 
     * 
     * is_readable(), is_writeable(), is_executable(), is_file(), and is_dir() will all fail to work for remote files, 
     * as the file/directory to be examined must be local to the web server so that it can check it properly. 
     */


    /**
     * Dissecting filename information
     * 
     * array pathinfo ( string path)
     * string basename ( string path [, string suffix])
     * 
     * The pathinfo() function is designed to take a filename and return the same filename broken into various components. 
     * It takes a filename as its only parameter, and returns an array with three elements: dirname, basename, and extension. 
     * 
     * Dirname contains the name of the directory the file is in (e.g. "c:\windows" or "/var/www/public_html"),
     * basename contains the base filename (e.g. index.html, or somefile.txt), 
     * and extension contains the file extension if any (e.g. "html" or "txt").
     */
    
?>