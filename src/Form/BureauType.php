<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 12/12/2018
 * Time: 19:29
 */

namespace App\Form;


use App\Entity\Bureau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BureauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_type'=>Bureau::class
        ]);
    }

}