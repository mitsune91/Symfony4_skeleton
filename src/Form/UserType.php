<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            ->add('prenom')
            ->add('nom')
            ->add('email')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('telephone')
            ->add('roles', CollectionType::class, [
                'allow_delete' => true,
                'entry_type' => ChoiceType::class,
                'allow_add' => false,
                'entry_options' => [
                    'label' => false,
                    //     'multiple'=> true,
                    //   'expanded' => true,
                    'choices' => [
                        'Admin' => 'ROLE_ADMIN',
                        'Super' => 'ROLE_SUPER_ADMIN',
                        'Aucun' => null

                    ],
                ],
            ]);
//        $builder->get('roles')
//            ->addModelTransformer(new CallbackTransformer(
//                function ($tagsAsArray) {
//                    // transform the array to a string
//                    return implode(', ', $tagsAsArray);
//                },
//                function ($tagsAsString) {
//                    // transform the string back to an array
//                    return explode(', ', $tagsAsString);
//                }
//            ))
//        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
