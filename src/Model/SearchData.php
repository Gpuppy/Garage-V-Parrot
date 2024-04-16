<?php

namespace App\Model;

//use App\Entity\Brands;


use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Validator\Constraints\Date;


class SearchData
{
    /** @var int */
    public $page = 1;

    /**  @var string */
    /*public string $q = '';*/

    ## array
    public array $brands = [];

    public string $price;

    public float $min;

    public float $max;

    //public int $price;

    ##[ORM\Column(type: 'string')]
    public int $minPrice;

    public int $maxPrice;

    public float $km;

    public float $minKm;

    public float $maxKm;

    //public $year;

    public float $minYear;

    public float $maxYear;

}