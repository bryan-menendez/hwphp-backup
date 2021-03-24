<?php
    /**
     * In PHP, objects are always handled as references. 
     * 
     * This means that when you pass an object into a function, 
     * any changes you make to it in there are reflected outside the function.
     */
    
    //namechange($poppy);
    //print $poppy->Name . "\n";

    /**
     * Sometimes it is important to only work on copies of objects - you might not want to affect the state of the original. 
     * To do this, we use the built-in keyword "clone", which performs a complete copy of the object.
     */

     //namechange(clone $poppy);

    /**
     * You can also declare actions when cloning as in
    */
    
    //public function __clone() {
    //    $this->Name .= '++';
    //}



    /**
     * Comparison
     * 
     * With objects, == compares the objects' contents and === compares the objects' handles. 
     * 
     * There is a difference there, and it's crucial: if you create an object and clone it, 
     * its clone will have exactly the same values as it. 
     * It will, therefore, return true for == as the two objects are the same in terms of their values. 
     * However, if you use ===, you will get false back 
     * because it compares the handles of the object and finds them to be different. 
     */



    /**
     * Saving objects
     * 
     * array get_object_vars ( object input) 
     * 
     * To save them, you serialize() them into a string to make a format that can be saved, 
     * then urlencode() them to get a format that can be passed across the web without problem
     */

    /**
     *  There is one special feature with saving objects, though, and that is the fact that when serialize() and unserialize() are called, 
     * they will look for a __sleep() and __wakeup() function on the object they are working with respectively. 
     * These functions, which you have to provide yourself if you want them to do anything, allow you to properly keep an object 
     * working during its hibernation period (when it is just a string of data).
     * 
     * For example, when __sleep() is called, a logging object should save and close the file it was writing to, and when __wakeup() is called 
     * the object should reopen the file and carry on writing. Although __wakeup() need not return any value, __sleep() 
     * must return an array of the values you wish to have saved. If no __sleep() function is present, PHP will automatically save all variables, 
     * but you can mimic this behaviour in code by using the get_object_vars() function - more on that soon
    */

    class logger {
        private function __sleep() {
            $this->saveAndExit();
            // return an empty array
            return array();
        }
    
        private function __wakeup() {
            $this->openAndStart();
        }
    
        private function saveAndExit() {
            // ...[snip]...
        }
    }
?>