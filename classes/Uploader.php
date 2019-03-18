<?php

class Uploader
{
    protected $formName;

    public function __construct($formName)
    {
        $this->formName = $formName;
    }

    public function isUploaded()
    {
        return isset($_FILES[$this->formName]) && isset($_FILES[$this->formName]['tmp_name']);
    }

    public function upload()
    {
        if ($this->isUploaded()) {
            move_uploaded_file(
                $_FILES[$this->formName]['tmp_name'],
                __DIR__ . '/../images/' . $_FILES[$this->formName]['name']
            );
        }
    }
}