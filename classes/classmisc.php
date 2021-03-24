<?php
    /**
     * Class type hints
     * 
     * you can enforce a type of value in the declaration of a function
     */

    function drool(dog $some_dog) { //expecting type dog
        $some_dog->do_drool();
    }

    /**
     * Constructors and destructors
     */

    class dogtag {
        public $Words;
    }
    
    class dog {
        public $Name;
        public $DogTag;

        public function bark() {
            print "Woof!\n";
        }
        
        public function __construct($DogName) {
            print "Creating $DogName\n";
            $this->Name = $DogName;
            $this->DogTag = new dogtag;
            $this->DogTag->Words = "My name is $DogName. If you find me, please call 555-1234";
        }
    }
    
    class poodle extends dog {
        public function bark() {
            print "Yip!\n";
        }

        public function __destruct() {
            print "{$this->Name} is no more...\n";
        }
    }
    
    $poppy = new poodle("Poppy");
    print $poppy->DogTag->Words . "\n";

    /**
     * PHP also allows you to define class destructors - a function to be called when an object is deleted. 
     * PHP calls destructors as soon as objects are no longer available, and the destructor function, 
     * __destruct(), takes no parameters. 
     * 
     * you could also just unset() the object
     */
?>