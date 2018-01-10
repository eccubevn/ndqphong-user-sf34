<?php
namespace Eccube\User\Form;

class LoginType extends \Symfony\Component\Form\AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
            ->add('password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class);
    }

    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
    }
}