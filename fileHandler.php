<?php

class fileHandler {

    var $fileName = 'original_msg.html';

    function __construct($codeFile = false)
    {
        if ($codeFile) {
            $this->fileName = $codeFile;
        }
        if (!file_exists($this->fileName)) {
            file_put_contents($this->fileName, '');
        }
    }

    function put($source)
    {
        file_put_contents($this->fileName, $source);
    }

    function get()
    {
        return file_get_contents ($this->fileName);
    }
}