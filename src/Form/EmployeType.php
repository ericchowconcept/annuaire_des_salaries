<?php

namespace App\Form;


use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('telephone')
            ->add('email')
            ->add('adresse')
            ->add('poste', ChoiceType::class, 
            ['choices'=>[
                'Développeur' => 'Developpeur',
                'Informaticien' => 'Informaticien',
                'Coordinateur' => 'Coordinateur',
            ]])
            ->add('salaire')

            ->add('datedenaissance', DateType::class,[
                'widget' => 'single_text',
                'constraints' => [
                    new DateTime(),
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}
