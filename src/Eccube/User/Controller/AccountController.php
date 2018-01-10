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
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function register(\Symfony\Component\HttpFoundation\Request $request)
    {
        $form = $this->createForm(\Eccube\User\Form\RegisterType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Register successfully!');
            return $this->redirectToRoute('eccube_core_index_index');
        }

        return [
            'title' => 'Register',
            'form' => $form->createView()
        ];
    }
}