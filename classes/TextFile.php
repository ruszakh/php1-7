<?php

class TextFile
{
    protected $path;

    protected $data;

    public function __construct($path)
    {
        $this->path = $path;
        $this->data = file($this->path, FILE_IGNORE_NEW_LINES);
    }

    public function getData()
    {
        return $this->data;
    }
}