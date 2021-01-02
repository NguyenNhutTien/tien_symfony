<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class AdminController extends EasyAdminController
{
    private $userRepository;
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->userRepository = $this->em->getRepository(User::class);
    }

//    /** @Route("/", name="easyadmin")
//     * @param Request $request
//     */
//    public function indexAction(Request $request)
//    {
//
//    }

//    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
//    {
//        $qb = $this->userRepository->createQueryBuilder('u');
//        $qb->select('u');
//        return $qb;
//    }
}
