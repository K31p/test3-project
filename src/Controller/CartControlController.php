<?php

namespace App\Controller;

use App\Entity\School;
use App\Entity\User;
use App\Entity\Order;
use App\Repository\SchoolRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CartControlController extends AbstractController
{

    private SessionInterface $session;

    public function __constructor(SessionInterface $session,  EntityManagerInterface $entityManager)
    {
        $this->session = $session;
        $this -> getDoctrine()-> getEntityManager();
    }

    public function processOrder(School $school)
    {
        $order = new Order;
        $order->setSchool($school);
    }

    /**
     * @Route("/cart", name="cart", methods={"GET"})
     * @param SchoolRepository $schoolRepository
     * @return Response
     */
    public function index(SchoolRepository $schoolRepository): Response
    {
        return $this->render('cart_control/cart.html.twig', [
            'schools' => $schoolRepository->findAll(),
        ]);
    }

    /**
     * @Route("/product/buy", name="cart_buy", methods={"GET"})
     * @param SchoolRepository $schoolRepository
     * @return Response
     */
    public function product(SchoolRepository $schoolRepository): Response
    {

            return $this->render('cart_control/order.html.twig', [
            'schools' => $schoolRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="take_order_new")
     * @param School $school
     * @param User $user
     * @return Response
     */
    public function order(School $school, User $user)
    {


        return $this->render('take_order/new.html.twig',[
            'schools' => $school,
        ]);
    }



}
