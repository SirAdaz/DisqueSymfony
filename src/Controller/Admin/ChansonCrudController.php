<?php

namespace App\Controller\Admin;

use App\Entity\Chanson;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChansonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chanson::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            DateTimeField::new('duree'),
        ];
    }
}
