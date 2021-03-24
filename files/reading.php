<?php
    /**
     * Reading files 
     * 
     * There are three distinct ways to open and display files, and we will be looking at all of them - 
     * each have their uses. 
     * 
     * The simplest possible way is to call readfile(), 
     * which takes a filename as its first parameter and simply opens the file, 
     * outputs it to the screen, then closes it. 
     * Sadly, it's very rare you just want to print a file's contents to the screen, which makes this function rather rare.
     * 
     * A slightly more complicated way, but equally more powerful, is to use the file_get_contents() function, 
     * which loads the file specified as the first parameter and returns it as a string. 
     * This function is the most common, because it's just so easy to use. 
     * 
     * The last way, using the fopen() function, is the most complicated and also the most powerful - indeed, 
     * it's so powerful that few people really need to use it! 
     * 
     * Author's Note: you don't need to know all three ways to read files - indeed, 
     * it is probably best to learn one and stick with it for your own code. 
     * However, having said that, you will almost certainly come across each of these three methods 
     * in other people's code, because everyone has their own method of getting things done. 
     * My advice to you is to learn all three, at least as far as knowing what they do, 
     * and learn one specific way for your own use. That way, at least you have got a vague idea 
     * when you see other code, and you know that you can look back here or in the PHP manual if you get stuck.
     * 
     * If you're interested, I use file_get_contents() 99% of the time.
     * In fact, I can't remember the last time I used either fopen() or readfile()!
     */

    /**
     * readfile()
     * 
     * int readfile ( string filename [, bool use_include_path [, resource context]])
     * 
     * If you want to output a file to the screen without doing any form of text processing on it whatsoever, 
     * readfile() is the easiest function to use. When passed a filename as its only parameter, 
     * readfile() will attempt to open it, read it all into memory, then output it without further question. 
     * 
     * If successful, readfile() will return an integer equal to the number of bytes read from the file.
     * If unsuccessful, readfile() will return false, and there are quite a few reasons why it may file. 
     * For example, the file might not exist, or it might exist with the wrong permissions.
     * 
     * Here is an example script:
     */

    readfile("/home/paul/test.txt");
    readfile("c:\\boot.ini");
    
    /** 
     * file_get_contents() and file()
     * 
     * string file_get_contents ( string filename [, bool use_include_path [, resource context]])
     * array file ( string filename [, bool use_include_path [, resource context]])
     * 
     * The next evolutionary step up from readfile() is just called file_get_contents(), 
     * and also takes one parameter for the filename to open. 
     * This time, however, it does not output any data - instead, it will return the contents of the file as string, 
     * replete with new line characters \n where appropriate.
    */

    $filestring = file_get_contents($filename);
    print $filestring;

    //or

    $filestring = file_get_contents($filename);
    $filearray = explode("\n", $filestring);

    while (list($var, $val) = each($filearray)) {
        ++$var; //it should start reading from line 1
        $val = trim($val);
        print "Line $var: $val<br />";
    }


    /**
     * fopen() and fread()
     * 
     * resource fopen ( string filename, string mode [, bool use_include_path [, resource context]])
     * string fread ( resource handle, int length)
     * 
     * Fopen() is, for many, a fiendishly complex function to use. 
     * The reason for this is because it is another one of those functions lifted straight from C, 
     * and so is not as user-friendly as most PHP functions. On the flip-side, as per usual, 
     * is the fact that fopen() is an incredibly versatile function that 
     * some people come to love for its ability to manipulate files just as you want it to.
     * 
     * Fopen() has two key parameters: the file to open, and how you would like it opened. 
     * Parameter one is easy - it is just $filename, as with the other examples. 
     * Parameter two is what makes fopen() so special: you specify letters in a string that define 
     * whether you want to read from ("r"), write to ("w"), or append to ("a") the file specified in parameter one. 
     * There is also a fourth option, "b", which opens the file in binary mode. This is not necessary on Unix-based systems,
     * but it is on Windows, so it is best to use it everywhere - it is not detrimental on Unix-based systems at all. 
     * 
     */

    fopen($filename, "r");
    fopen($filename, "w");

    /**
     * Fopen() returns a file handle resource, which is basically the contents of the file. 
     * You cannot output it directly, e.g. "print fopen(....)", 
     * but fopen()-related functions all accept file handles as the file to work with, 
     * so you should store the return value of fopen() in a variable for later use. 
     */

    $handle = fopen($filename, "a");

    /**
     *  If the file cannot be opened, fopen() returns false. 
     * If the file is successfully opened, a file handle is returned and you can proceed.
     * 
     * Once the file handle is ready, we can call other functions on the opened file, 
     * depending on how the file was opened (the second parameter to fopen() ). 
     * To read from a file, the function fread() is used, and to write to a file fwrite() is used. 
     * For now we're interested in reading, so you should use "rb" for the second parameter to fopen(). 
     * 
     * Fread() takes two parameters: a file handle to read from (this is the return value from fopen(), remember) 
     * and the number of bytes to read. The second parameter might not make sense at first, 
     * after all you generally want to read in all of a file, right?
     * 
     *  Well, while the chances are that you will indeed want to read in all of a file, 
     * doing so requires you have enough memory to be able to read in the entire file at once - 
     * if you are working with files of several megabytes or indeed hundreds of megabytes, 
     * PHP's resource consumption would balloon. In circumstances such as these you have but two choices: 
     * buy more RAM, or parse your data sequentially!
     * 
     * Luckily, most people will not have to make that choice - most people work with text files under a megabyte in size, 
     * and PHP can load a megabyte file all at once in a tiny fraction of a second. 
     * To instruct PHP to use fread() to read in the entire contents of a file, 
     * you simply need to specify the exact file size in bytes of that file as parameter two to fread(). 
     * Sound difficult? PHP comes to the rescue again with the filesize() function, 
     * which takes the name of a file to check, and returns its filesize in bytes - 
     * precisely what we're looking for.
     * 
     * When reading in a file, PHP uses a file pointer to determine which byte it is currently up to - 
     * kind of like the array cursor. Each time you read in a byte, PHP advances the array cursor by one place -
     * reading in the entire file at once advances the array cursor to the end of the file.
     * 
     * So, to use fread() to read in an entire file, we can use the following line: 
     */

    $contents = fread($handle, filesize($filename));

    /**
     * Author's Note: Although PHP automatically closes all files you left open in your script, 
     * it is not smart to rely on it to do so - it is a poor use of resources, 
     * and it might affect other processes trying to read the file. 
     * Always, always, always close your files the minute you are finished with them. 
     */

    /**
     * To close a file you have opened with fopen(), use fclose() - 
     * it takes the file handle we got from fopen(), and returns true if it was able to close the file successfully. 
     * We have now got enough to use fopen() to fully open and read in a file, then close it. 
     * 
     * Here is the script: 
     */
    
    $handle = fopen($filename, "rb");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    print $contents;

?>