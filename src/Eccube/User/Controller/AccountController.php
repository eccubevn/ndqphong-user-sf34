<?php
namespace Eccube\User\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    /**
     * @var \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface
     */
    protected $passwordEncoder;

    /**
     * @var \Symfony\Component\HttpFoundation\RequestStack
     */
    protected $requestStack;

    /**
     * @var \Symfony\Component\Security\Http\Authentication\AuthenticationUtils
     */
    protected $authUtils;

    /**
     * @var \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage
     */
    protected $tokenStorage;

    /**
     * AccountController constructor.
     *
     * @param \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $userPasswordEncoder
     * @param \Symfony\Component\HttpFoundation\RequestStack $requestStack
     * @param \Symfony\Component\Security\Http\Authentication\AuthenticationUtils $authUtils
     * @param \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage $tokenStorage
     */
    public function __construct(
        \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $userPasswordEncoder,
        \Symfony\Component\HttpFoundation\RequestStack $requestStack,
        \Symfony\Component\Security\Http\Authentication\AuthenticationUtils $authUtils,
        \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage $tokenStorage
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->passwordEncoder = $userPasswordEncoder;
        $this->requestStack = $requestStack;
        $this->authUtils = $authUtils;
    }

    /**
     * @Route("/account/login")
     *
     * @Template("@User/account/login.html.twig")
     */
    public function login()
    {
        $form = $this->createForm(\Eccube\User\Form\LoginType::class);
        $error = $this->authUtils->getLastAuthenticationError();

        return [
            'title' => 'Login',
            'form' => $form->createView(),
            'error' => $error
        ];
    }

    /**
     * @Route("/account/register")
     *
     * @Template("@User/account/register.html.twig")
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function register()
    {
        $form = $this->createForm(\Eccube\User\Form\RegisterType::class);

        $form->handleRequest($this->requestStack->getCurrentRequest());
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

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

    /**
     * @Route("/account/my-page")
     *
     * @Template("@User/account/mypage.html.twig")
     *
     * @return array
     */
    public function mypage()
    {
        return [
            'title' => 'My Page',
            'username' => $this->tokenStorage->getToken()->getUsername()
        ];
    }
}