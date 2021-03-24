<?php
    /**
     * Creating and changing files
     * Like reading files, creating and changing files can also be done in more than one way. 
     * Luckily for you, there are just two options this time: file_put_contents() and fwrite(). 
     * Both of these functions complement functions we just looked at, which are file_get_contents() 
     * and fread() respectively, and they work in mostly the same way.  
    */

    /** 
     * int file_put_contents ( string filename, string data [, int flags [, resource context]])
     * 
     * This function writes to a file with the equivalent of fopen(), fwrite() (the opposite of fread() ),
     * and fclose() - all in one function, just like file_get_contents.
     * 
     * It takes two parameters, the filename to write to and the content to write respectively, 
     * with a third optional parameter specifying extra flags which we will get to in a moment. 
     * If file_put_contents() is successful it returns the number of bytes written to the file, 
     * otherwise it will return false. 
     */

    $myarray[] = "This is line one";
    $myarray[] = "This is line two";
    $myarray[] = "This is line three";
    $mystring = implode("\n", $myarray);
    $numbytes = file_put_contents($filename, $mystring);
    print "$numbytes bytes written\n";

    /**
     *  Remember you will need to set $filename first - other than that the script is straightforward, 
     * and should output "52 bytes written", which is the sum total of the three lines of text 
     * plus the two new line characters used to implode() the array. 
     * Remember that the new line character is in fact just one character inside files, 
     * whereas PHP represents it using two, \ and n.
     * 
     * You can pass in a third parameter to file_put_contents(), which, if set to FILE_APPEND,
     * will act to append the text in your second parameter to the existing text in the file. 
     * If you do not use FILE_APPEND the existing text will be wiped and replaced, 
     * which is not always the desired behaviour. 
     */



    /**
     * fwrite() 
     * 
     * int fwrite ( resource handle, string string [, int length])
     * 
     * The opposite to fread() is fwrite() and also works with the file handle returned by fopen(). 
     * Fwrite() takes a string to write as a second parameter, 
     * and an optional third parameter where you can specify how many bytes to write. 
     * If you do not specify the third parameter, all of the second parameter is written out to the file, 
     * which is often what you want. 
    */
    
    $handle = fopen($filename, "wb");
    $numbytes = fwrite($handle, $mystring);
    fclose($handle);
    print "$numbytes bytes written\n";
?>