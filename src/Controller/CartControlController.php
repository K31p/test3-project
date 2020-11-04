<?php

namespace App\Controller;

use App\Entity\School;
use App\Entity\TakeOrder;
use App\Form\SchoolType;
use App\Form\TakeOrderType;
use App\Repository\SchoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class CartControlController extends AbstractController
{
    /**
     * @Route("/cart", name="cart", methods={"GET"})
     */
    public function index(SchoolRepository $schoolRepository): Response
    {
        return $this->render('cart_control/cart.html.twig', [
            'schools' => $schoolRepository->findAll(),
        ]);
    }

    /**
     * @Route("/order/{school}", name="order", methods={"GET","POST"})
     */
    public function order($schoolId): Response
    {
        $takeOrder = new TakeOrder();
        $user = $this->getUser();

        $takeOrder->setUser($user->getId());
        $takeOrder->setSchool($schoolId);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($takeOrder);
        $entityManager->flush();

        return $this->render('default/index.html.twig', [
            'controller' => 'test',
        ]);

    }
}
