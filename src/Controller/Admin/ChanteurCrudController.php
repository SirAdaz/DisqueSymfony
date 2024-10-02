<?php

namespace App\Controller\Admin;

use App\Entity\Chanteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChanteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chanteur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [

        ];
    }
}
