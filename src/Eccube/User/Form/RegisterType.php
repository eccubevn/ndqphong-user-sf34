<?php
namespace Eccube\User\Form;

class RegisterType extends \Symfony\Component\Form\AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')
            ->add('password');
    }

    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \Eccube\User\Entity\User::class
        ]);
    }
}