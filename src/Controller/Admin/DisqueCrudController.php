<?php

namespace App\Controller\Admin;

use App\Entity\Disque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DisqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Disque::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('chanteur'),
            TextField::new('nameDisque'),
        ];
    }
}
