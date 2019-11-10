<?php

/**
 * Created by PhpStorm.
 * User: DNS
 * Date: 01/06/2018
 * Time: 15:58
 */
class Firma
{
    public $name;

    /**
     * Firma constructor.
     * @param $name
     * @param $low
     * @param $lowprice
     * @param $hightprice
     * @param $type
     */
    public function __construct($name, $low, $lowprice, $hightprice, $type)
    {
        $this->name = $name;
        $this->low = $low;
        $this->lowprice = $lowprice;
        $this->hightprice = $hightprice;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @param mixed $low
     */
    public function setLow($low)
    {
        $this->low = $low;
    }

    /**
     * @return mixed
     */
    public function getLowprice()
    {
        return $this->lowprice;
    }

    /**
     * @param mixed $lowprice
     */
    public function setLowprice($lowprice)
    {
        $this->lowprice = $lowprice;
    }

    /**
     * @return mixed
     */
    public function getHightprice()
    {
        return $this->hightprice;
    }

    /**
     * @param mixed $hightprice
     */
    public function setHightprice($hightprice)
    {
        $this->hightprice = $hightprice;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    public $low;
    public $lowprice;
    public $hightprice;
    public $type;


}