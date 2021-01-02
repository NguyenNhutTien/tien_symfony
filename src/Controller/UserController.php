<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class UserController extends EasyAdminController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
//        return $this->render('user/index.html.twig', [
//            'controller_name' => 'UserController',
//        ]);
//        return $this->render('@EasyAdmin/page/content.html.twig');
    }
}
