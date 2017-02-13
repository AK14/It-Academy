<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 2/13/2017
 * Time: 9:19 AM
 */

namespace Classes;


class files
{
    private $file;
    private $type;
    private $size;

    public function __construct($file)
    {
        $this->file = $file;
        $this->size = filesize($this->file);
        $this->type = filetype($this->file);
    }

    public function read()
    {
        $data =  file_get_contents($this->file);
        $u =file($this->file);
      return $u;

    }
}