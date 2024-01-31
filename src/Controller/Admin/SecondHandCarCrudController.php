<?php

namespace App\Controller\Admin;

use App\Entity\SecondHandCar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
            DateTimeField::new('year'),
            MoneyField::new('price')->setCurrency('EUR'),
            /*TextareaField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('images')->setBasePath('/images/uploads')->onlyOnIndex(),*/

            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('images/uploads')->onlyOnIndex(),
            /*ImageField::new('images')->setUploadDir('public/images/uploads'),*/



            /*ImageField::new('image')->setUploadDir('/'),*/
            /*TextField::new('imageName')->onlyOnIndex(),*/

            /*ImageField::new('image')->set'/'),*/
            /*ImageField::new('public/images/cars')->setBasePath('cars'),*/
            /*TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),*/
            /*TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),*/
            /*TextField::new('File', "Car Image")->setFormType(VichImageType::class),*/

            DateField::new('createdAt'),
            DateField::new('updatedAt')
        ];
    }
/*TextField::new('attachmentFile')->setFormType(VichImageType::class)->onlyWhenCreating(),*/
/*ImageField::new('attachment')->setBasePath('uploads/attachments')->onlyOnIndex(),*/
}
