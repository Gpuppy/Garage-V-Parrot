<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use Doctrine\Tests\Models\Cache\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    /*public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Service')
            ->setEntityLabelInSingular('Service')
            ->setEntityPermission('ROLE_SUPER_ADMIN');

        //->setPageTitle('');
        //->setPaginatorPageSize('10');
    }*/


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('content'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('images/uploads')->onlyOnIndex()
            /*IntegerField::new('services')->setPermission('ROLE_SUPER_ADMIN')*/

        ];
    }

}
