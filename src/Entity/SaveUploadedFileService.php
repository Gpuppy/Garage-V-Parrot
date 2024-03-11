<?php

namespace App\Service\File;

use App\Repository\SaveUploadedFileServiceRepository;
use Doctrine\ORM\Mapping as ORM;
use Aws\Credentials\CredentialProvider;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use App\Service\ServiceInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[ORM\Entity(repositoryClass: SaveUploadedFileServiceRepository::class)]
class SaveUploadedFileService implements ServiceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
