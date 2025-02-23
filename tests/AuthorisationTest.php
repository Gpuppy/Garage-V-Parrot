<?php

namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class AuthorisationTest extends WebTestCase
{
    private static $container;

    private KernelBrowser $client;
    private ?UserRepository $userRepo;

    protected function setUp(): void

    {
        $this->client = static::createClient();
        $this->userRepo= static::getContainer()->get(UserRepository::class);
    }

    public function testAdminCanVisitTheAdminDashboard(): void
    {
        $testUser = $this->userRepo->findOneByEmail('gpuppy@hotmail.com');

        $this->assertNotNull($testUser, 'Test user not found in database.');

        $this->client->loginUser($testUser);

        $this->client->request('GET','/admin');

        $this->assertResponseIsSuccessful();
    }

    /*public function testItWorks()
    {
        $this->assertTrue(true);
    }*/

}