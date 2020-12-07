<?php


namespace App\Controller;

use App\Entity\TakeOrder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    private em;

    public function __construct(EntityManagerInterface $em) // add it to the constructor
    {
        // Declare the entity mangager inside of the global variable to acces it everywhere in the controller
        $this->em = $em;
        $this->em->flush();
    }

    public function processOrder(TakeOrder $takeorder)
    {
        $takeorder = new TakeOrder();
        $takeorder->setField();
        $this->em->persist($takeorder);
        $this->em->flush();
    }

}