<?php

namespace App\Tests\Unit;

use App\Entity\SecondHandCar;
use Couchbase\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SecondHandCarTest extends KernelTestCase
{
    public function getEntity() : SecondHandCar
    {
        $secondHandCar = new SecondHandCar();
        $secondHandCar->setName('honda');
        $secondHandCar->setDescription('ok lorem ipsum');
        $secondHandCar->setKm('10000');
        $secondHandCar->setPrice('10000');
        $secondHandCar->setImage('Image #1');
        $secondHandCar->setCreatedAt(new \DateTimeImmutable('22-02-2025'));
        $secondHandCar->setUpdatedAt(new \DateTimeImmutable('22-02-2025'));

        return $secondHandCar;
    }

    public function testEntityIsValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $secondHandCar = $this->getEntity();
        //$secondHandCar->setName('honda');
        //$secondHandCar->setDescription('ok lorem ipsum');
        //$secondHandCar->setKm('10000');
        //$secondHandCar->setPrice('10000');
        //$secondHandCar->setImage('Image #1');
        //$secondHandCar->setCreatedAt(new \DateTimeImmutable('22-02-2025'));
        //$secondHandCar->setUpdatedAt(new \DateTimeImmutable('22-02-2025'));

        $errors = $container->get('validator')->validate($secondHandCar);

        $this->assertCount(0, $errors);
    }

    /*public function testInvalidName()
    {
        self::bootKernel();
        $container = static::getContainer();

        $secondHandCar = $this->getEntity();
        //$secondHandCar->setName('');

        //$secondHandCar = new SecondHandCar();
        //$secondHandCar->setName('');
        //$secondHandCar->setDescription('ok lorem ipsum');
        //$secondHandCar->setKm('10000');
        //$secondHandCar->setPrice('10000');
        //$secondHandCar->setImage('Image #1');
        //$secondHandCar->setCreatedAt(new \DateTimeImmutable('22-02-2025'));
        //$secondHandCar->setUpdatedAt(new \DateTimeImmutable('22-02-2025'));

        $errors = $container->get('validator')->validate($secondHandCar);
        $this->assertCount(1, $errors);
    }*/



}
//dump($car);
