<?php
    /**
     * Moving, copying, and deleting files
     * 
     * bool rename ( string old_name, string new_name [, resource context])
     * bool copy ( string source, string dest)
     * bool unlink ( string filename, resource context)
     */

    /**
     * Moving files with rename()
     * 
     * Use for both renaming and moving files, rename() takes two parameters: the original filename 
     * and the new filename you wish to use. 
     * 
     * Rename() can rename/move files across directories and drives, 
     * and will return true on success or false otherwise. 
     */

    $filename2 = $filename . '.old';
    rename($filename, $filename2);

    /**
     * rename() should be used to move ordinary files, and not files uploaded through a form. 
     * The reason for this is because there is a special function, called move_uploaded_file(), 
     * which checks to make sure the file has indeed been uploaded before moving it - 
     * this stops people trying to hack your server into making private files visible. 
     * You can perform this check yourself if you like by calling the is_uploaded_file() function. 
     */



     /**
     * Copying files with copy()
     * 
     * Like rename(), copy() also takes two parameters - the filename you wish to copy from, 
     * and the filename you wish to copy to. 
     * The difference between rename() and copy() is that calling rename() results in the file 
     * being in only one place, the destination, whereas copy() leaves the file in the source location 
     * as well as placing a new copy of the file into the destination. 
     */

    $filename2 = $filename . '.old';
    copy($filename, $filename2);



    /**
     * Deleting files with unlink()
     * 
     * To delete files, simply pass a filename string as the only parameter to unlink(). 
     * Note that unlink deals only with files - to delete directories you need rmdir(). 
     */

    if (unlink($filename)) {
        print "Deleted $filename!\n";
    } else {
        print "Delete of $filename failed!\n";
    }

?>