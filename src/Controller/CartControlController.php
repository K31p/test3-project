<?php

namespace App\Controller;

use App\Entity\School;
use App\Entity\TakeOrder;
use App\Entity\User;
use App\Form\SchoolType;
use App\Form\TakeOrderType;
use App\Repository\SchoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class CartControlController extends AbstractController
{
    public function processOrder(School $school)
    {
        $takeorder = new TakeOrder();
        $takeorder->setSchool($school);
    }

    public function indexAction(Request $request){
        $session = new Session();

        $session->set('name', 'Admin');
        $user = $session->get('name');

        return $this->render('cart_control/cart.html.twig',['user' => $user]);
    }

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
     * @Route("/order/{schoolId}", name="order", methods={"GET","POST"})
     * @param $schoolId
     * @return Response
     */
    public function order($schoolId): Response
    {
        $takeOrder = new TakeOrder();
        $user = $this->getUser();
        $takeOrder->setUser($user);


        $takeOrder->setUser($user->getId());
        $takeOrder->setSchool($schoolId);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($takeOrder);
        $entityManager->flush();

        return $this->render('take_order/index.html.twig', [
            'controller' => 'test',
        ]);

    }
}
