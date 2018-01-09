<?php
namespace Eccube\Core\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController
{
    /**
     * @Route("/")
     *
     * @Template("@Core/index/index.html.twig")
     */
    public function index()
    {
        return [
            'title' => 'Hello world'
        ];
    }
}