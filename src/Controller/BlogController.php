<?php
// src/Controller/BlogController.php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\RouterInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends AbstractController
{

    /**
     * @Route("/article/{max}", name="latest_articles")
     */
    public function recentArticles($max = 3)
    {
        // get the recent articles somehow (e.g. making a database query)
        $articles = ['sports', 'education', 'social'];
        return $this->render('blog/_recent_articles.html.twig', [
            'articles' => $articles
        ]);
    }

}
