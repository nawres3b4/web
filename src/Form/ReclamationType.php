<?php

namespace App\Form;
use App\Entity\User;
use App\Entity\Reclamation;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenu')
            ->add('User',EntityType::class,['class'=>User::class,
            'choice_label'=>'id'])
          //  ->add('type',EntityType::class,['class'=>Type::class,
           // 'choice_label'=>'type'])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
