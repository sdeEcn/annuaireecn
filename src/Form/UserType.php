<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 14/12/2018
 * Time: 21:15
 */

namespace App\Form;


use App\Entity\Eleve;
use Doctrine\Common\Collections\ArrayCollection;
use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $option =$options["option"];

        $builder->add("mail1")->add("liste")->add('phone', PhoneNumberType::class,
        array('default_region' => 'FR', 'format' => PhoneNumberFormat::NATIONAL));

        $builder->add("option2",ChoiceType::class,[
            "choices"=>$option,

            "choice_label"=> function($category, $key, $value){
                return $category->getNom();
            },

            'placeholder' => 'Aucun'
        ]);

        $builder->add("option3",ChoiceType::class,[
            "choices"=>$option,

            "choice_label"=> function($category, $key, $value){
                    return $category->getNom();
            },
            'placeholder' => 'Aucun'
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           "data_class"=>Eleve::class,
           "option"=>ArrayCollection::class
        ]);
    }


}