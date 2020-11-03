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
 * @Route("/cart")
 */
class CartControlController extends AbstractController
{
    /**
     * @Route("/cart/{school}", name="cart", methods={"GET"})
     */
    public function index(SchoolRepository $schoolRepository): Response
    {
        return $this->render('cart_control/cart.html.twig', [
            'schools' => $schoolRepository->findAll(),
        ]);
    }

    /**
     * @Route("/cart/new", name="order", methods={"GET","POST"})
     */
    public function order(Request $request): Response
    {
        $takeOrder = new TakeOrder();
        $form = $this->createForm(TakeOrderType::class, $takeOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($takeOrder);
            $entityManager->flush();

            return $this->redirectToRoute('take_order_index');
        }

        return $this->render('take_order/new.html.twig', [
            'take_order' => $takeOrder,
            'form' => $form->createView(),
        ]);
    }
}
