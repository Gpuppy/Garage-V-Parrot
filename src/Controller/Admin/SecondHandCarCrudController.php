<?php

namespace App\Controller\Admin;

//use App\Document\User1; // Example MongoDB document
//use App\Document\SecondHandCar; // Example MongoDB document
//use Doctrine\ODM\MongoDB\DocumentManager;

use App\Entity\SecondHandCar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class SecondHandCarCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return SecondHandCar::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('brand'),
            NumberField::new('km'),
            DateTimeField::new('year')->setFormat('yyyy-MM-dd'),
            MoneyField::new('price')->setCurrency('EUR'),
            TextEditorField::new('description'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('images/uploads')->onlyOnIndex(),
            DateField::new('createdAt'),
            DateField::new('updatedAt'),
            IdField::new('userId')
        ];
    }

    /*private DocumentManager $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function updateEntity($entityInstance): void
    {
        $this->documentManager->flush();
    }

    public function deleteEntity($entityInstance): void
    {
        $this->documentManager->remove($entityInstance);
        $this->documentManager->flush();
    }

    public function customMongoDBOperation(Request $request): Response
    {
        // Example MongoDB operation
        $secondHandCar = new SecondHandCar();
        $secondHandCar->setName();
        $secondHandCar->setEmail();
        $secondHandCar->setBrand();
        $secondHandCar->setKm();
        $secondHandCar->setYear();
        $secondHandCar->setPrice();
        $secondHandCar->setDescription();
        $secondHandCar->setCreatedAt();
        $secondHandCar->setUpdatedAt();

        // Persist and flush the user document to MongoDB
        $this->documentManager->persist($secondHandCar);
        $this->documentManager->flush();

        return new Response('MongoDB operation completed successfully.');
    }
*/
}
