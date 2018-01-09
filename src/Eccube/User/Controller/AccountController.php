<?php
namespace Eccube\User\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    /**
     * @Route("/account/login")
     *
     * @Template("@User/account/login.html.twig")
     */
    public function login()
    {
        $form = $this->createForm(\Eccube\User\Form\LoginType::class);

        return [
            'title' => 'Login',
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/account/register")
     *
     * @Template("@User/account/register.html.twig")
     */
    public function register()
    {
        $form = $this->createForm(\Eccube\User\Form\RegisterType::class);

        return [
            'title' => 'Register',
            'form' => $form->createView()
        ];
    }
}