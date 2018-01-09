<?php
namespace Eccube\User\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class Account
{
    /**
     * @Route("/account/login")
     */
    public function login()
    {
        die('login action');
    }

    /**
     * @Route("/account/register")
     */
    public function register()
    {
        die('register action');
    }
}