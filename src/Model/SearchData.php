<?php

namespace App\Model;

use App\Entity\Brands;

class SearchData
{
    //var int


    //var string
    public string $q = '';

    public array $brands = [];

    public string $max;

    public int $min;

    public int $km;

    public int $year;

}