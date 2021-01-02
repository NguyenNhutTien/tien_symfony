<?php

namespace App\Controller;

use App\Message\SendNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/messenger", name="messenger")
     */
    public function index(MessageBusInterface $bus, Request $request)
    {
        for ($i = 0; $i < 5; $i++) {
            $user[] = 'tien ' . $i;
        }
        // $user= ['tien','ttt'];
        $message = $request->query->get('message');
        $bus->dispatch(new SendNotification($message, $user));
        return new Response('<html><body>OK.</body></html>');
    }
}
