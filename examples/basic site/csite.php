<?php

class csite
{
    private $headers;
    private $footers;
    private $page;

    public function __destruct()
    {
        //blank
    }

    public function render()
    {
        foreach($this->headers as $header)
        {
            include $header;
        } 

        $this->page->render();

        foreach($this->footers as $footer)
        {
            include $footer;
        }
    }

    public function addHeader($file)
    {
        $this->headers[] = $file;
    }

    public function addFooter($file)
    {
        $this->footers[] = $file;
    }

    public function setPage(cpage $page)
    {
        $this->page = $page;
    }
}

?>