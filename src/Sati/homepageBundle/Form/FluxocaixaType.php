<?php

namespace Sati\homepageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FluxocaixaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', 'choice', array(
                'label' => 'Tipo:',
                'attr'  => array('msg' => 'Tipo:'),
                'choices' => array(
                    'Entrada'   => ' Entrada',
                    'Saída' => ' Saída'
                ),
                'multiple' => false,
                'expanded' => true))

            ->add('descricao', null,array('label' => 'Descrição:',
                'attr'  => array('msg' => 'Descrição:') ))

            ->add('valor', null,array('label' => 'Valor:',
        'attr'  => array('msg' => 'Valor:') ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sati\homepageBundle\Entity\Fluxocaixa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sati_homepagebundle_fluxocaixa';
    }
}
