<?php

namespace App\Controller;

use App\Entity\TakeOrder;
use App\Form\TakeOrderType;
use App\Repository\TakeOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/take/order")
 */
class TakeOrderController extends AbstractController
{

    /**
     * @Route("/", name="take_order_index", methods={"GET"})
     * @param TakeOrderRepository $takeOrderRepository
     * @return Response
     */
    public function index(TakeOrderRepository $takeOrderRepository): Response
    {
        return $this->render('take_order/index.html.twig', [
            'take_orders' => $takeOrderRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="take_order_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
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

    /**
     * @Route("/{id}", name="take_order_show", methods={"GET"})
     * @param TakeOrder $takeOrder
     * @return Response
     */
    public function show(TakeOrder $takeOrder): Response
    {
        return $this->render('take_order/show.html.twig', [
            'take_order' => $takeOrder,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="take_order_edit", methods={"GET","POST"})
     * @param Request $request
     * @param TakeOrder $takeOrder
     * @return Response
     */
    public function edit(Request $request, TakeOrder $takeOrder): Response
    {
        $form = $this->createForm(TakeOrderType::class, $takeOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('take_order_index');
        }

        return $this->render('take_order/edit.html.twig', [
            'take_order' => $takeOrder,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="take_order_delete", methods={"DELETE"})
     * @param Request $request
     * @param TakeOrder $takeOrder
     * @return Response
     */
    public function delete(Request $request, TakeOrder $takeOrder): Response
    {
        if ($this->isCsrfTokenValid('delete'.$takeOrder->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($takeOrder);
            $entityManager->flush();
        }

        return $this->redirectToRoute('take_order_index');
    }
}
