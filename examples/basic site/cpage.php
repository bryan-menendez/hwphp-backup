<?php
    class cpage
    {
        private $title;
        private $content;

        public function __construct($title)
        {
            $this->title = $title;
        }

        public function __destruct()
        {
            //blank
        }

        public function render()
        {
            echo "<h1>{$this->title}</h1>";
            echo $this->content;
        }

        public function setContent($content)
        {
            $this->content = $content;
        }


    }
?>