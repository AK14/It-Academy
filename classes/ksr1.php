<?php
namespace Classes;

class ksr1
    {
        private $x;
        private $y;

    /**
     * index constructor.
     * @param $x
     */
    public function __construct($x)
    {
        $this->x = $x;
    }


    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    public function consider()
    {
        if($this->x == 0){ $this->y = 0;}
        elseif($this->x > 0){ $this->y = 1;}
        else { $this->y = '-1';}
    }
}


