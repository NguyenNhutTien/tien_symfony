<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/upload/new", name="upload_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function upload(){
        return $this->render('post/new.html.twig');
    }
    /**
     * @Route("/upload/process", name="upload_process")
     * @param Request $request
     */
    public function process(Request $request)
    {
        dd($request->files->get('image'));
    }
}
