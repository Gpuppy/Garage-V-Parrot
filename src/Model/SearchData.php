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

    public int $price;

    public float $min;

    public float $max;

    //public int $price;

    ##[ORM\Column(type: 'string')]
    public int $minPrice;

    public int $maxPrice;

    public int $km;

    public int $minKm;

    public int $maxKm;

    //public $year;

    public int $minYear;

    public int $maxYear;

}