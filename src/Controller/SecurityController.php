<?php

namespace App\Controller;

use App\Security\LoginFormAuthenticator;
use Symfony\Component\Security\Core\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
//    /**
//     * @Route("/login", name="app_login")
//     */
//    public function login(AuthenticationUtils $authenticationUtils): Response
//    {
//
//        // if ($this->getUser()) {
//        //     return $this->redirectToRoute('target_path');
//        // }
//
//        // get the login error if there is one
//        $error = $authenticationUtils->getLastAuthenticationError();
//        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
//
//
//        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
//    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            // parameters usually defined in Symfony login forms
            'error' => $error,
            'last_username' => $lastUsername,

            // OPTIONAL parameters to customize the login form:

            // the string used to generate the CSRF token. If you don't define
            // this parameter, the login form won't include a CSRF token
            'csrf_token_intention' => 'authenticate',
            // the URL users are redirected to after the login (default: path('easyadmin'))
            'target_path' => $this->generateUrl('user'),
            // the label displayed for the username form field (the |trans filter is applied to it)
            'username_label' => 'Your username',
            // the label displayed for the password form field (the |trans filter is applied to it)
            'password_label' => 'Your password',
            // the label displayed for the Sign In form button (the |trans filter is applied to it)
            'sign_in_label' => 'Log in',
            // the 'name' HTML attribute of the <input> used for the username field (default: '_username')
            'username_parameter' => 'my_custom_username_field',
            // the 'name' HTML attribute of the <input> used for the password field (default: '_password')
            'password_parameter' => 'my_custom_password_field',
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
