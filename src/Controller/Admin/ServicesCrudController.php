<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use Doctrine\Tests\Models\Cache\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Services')
            ->setEntityLabelInSingular('Services')
            ->setEntityPermission('ROLE_SUPER_ADMIN');

        //->setPageTitle('');
        //->setPaginatorPageSize('10');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('content')
            /*IntegerField::new('services')->setPermission('ROLE_SUPER_ADMIN')*/

        ];
    }

}
