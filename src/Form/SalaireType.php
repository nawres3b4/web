<?php

namespace App\Form;
use App\Entity\User;
use App\Entity\Salaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SalaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_salaire')
            ->add('mois', ChoiceType::class, [
                'choices'  => array(
                    'Janvier'=>"Janvier",
                    'Février'=>"Fevrier",
                    'Mars'=>"Mars",
                    'Avril'=>"Avril",
                    'Mai'=>"Mai",
                    'Juin'=>"Juin",
                    'Juillet'=>"Juillet",
                    'aout'=>"aout",
                    'Septembre'=>"Septembre",
                    'Octobre'=>"Octobre",
                    'Novembre'=>"Novombre",
                    'Décembre'=>"Novombre",
                   
            ),])
            ->add('montant')
            ->add('heures_travail')
           
            ->add('User',EntityType::class,['class'=>User::class,
            'choice_label'=>'id'])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salaire::class,
        ]);
    }
}
