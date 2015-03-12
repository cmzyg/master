<?php

namespace AppBundle\Controller;

use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;


class AuthController extends Controller
{
    private $request;
    private $session;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->session = new Session;
    }

    /**
     * @Route("/login/", name="login")
     */
    public function indexAction()
    {
        if($this->isLoggedIn())
        {
            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render('login/index.html.twig');
    }

    /**
     * @Method("GET")
     * @Route("/process-login/", name="process login")
     */
    public function processLogin()
    {
        $name     = $this->request->query->get('username');
        $password = $this->request->query->get('password');

        $em    = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT u.id FROM AppBundle:Admin u WHERE u.name = :name AND u.password = :password')
                    ->setParameter('name', $name)
                    ->setParameter('password', $password);

        $result = $query->getOneOrNullResult();

        if($result < 1)
        {
            $action = $this->redirect($this->generateUrl('login'));
        }
        else
        {
            $this->session->start();
            $action = $this->redirect($this->generateUrl('homepage'));
        }

        return $action;
    }


    private function isLoggedIn()
    {
        return $this->container->get('session')->isStarted();
    }

}
