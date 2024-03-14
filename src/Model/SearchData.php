<?php

namespace App\Model;

use App\Entity\SecondHandCar;

class SearchData
{
    //var int
    //public $page = 1;

    //var string
    public string $q = '';

    public $secondHandCars = [];

    public $max;

    public $min;

}