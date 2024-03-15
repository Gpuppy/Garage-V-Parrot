<?php

namespace App\Model;

use App\Entity\Brand;

class SearchData
{
    //var int
    //public $page = 1;

    //var string
    public string $q = '';

    public $brands = [];

    public $max;

    public $min;

    public $km;

    public $year;

}