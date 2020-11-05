<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class SessionController extends AbstractController
{
    public function session()
    {
        $session = new Session();
        $session->start();

// set and get session attributes
        $session->set('name', 'Drake');
        $session->get('name');

// set flash messages
        $session->getFlashBag()->add('notice', 'Profile updated');

// retrieve messages
        foreach ($session->getFlashBag()->get('notice', []) as $message) {
            echo '<div class="flash-notice">' . $message . '</div>';
        }
    }

    public function indexAction(Request $request){
        $session = new Session();

        $session->set('name', 'AdminSession');
        $user = $session->get('name');

        return $this->render('cart_control/cart.html.twig', ['user' => $user]);
    }

    public function admin(Request $request){
        $session = new Session();
        $session->set('name',"Jay");
        return $this->render('cart_control/cart.html.twig');
}


}