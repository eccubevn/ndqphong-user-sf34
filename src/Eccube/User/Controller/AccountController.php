<?php
namespace Eccube\User\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController
{
    /**
     * @Route("/account/login")
     *
     * @Template("@User/account/login.html.twig")
     */
    public function login()
    {
        return [];
    }

    /**
     * @Route("/account/register")
     *
     * @Template("@User/account/register.html.twig")
     */
    public function register()
    {
        return [];
    }
}