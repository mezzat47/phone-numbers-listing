<?php

namespace App\Entity;

class Customer
{ 
    private $phone;


    /**
     * @param $phone
     * @return $this
     */
    public function setPhone($phone): Customer
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
