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
        if($this->isLoggedIn() !== NULL)
        {
            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render('AppBundle:login:index.html.twig', array('token' => md5(rand(1, 22222222))));
    }

    /**
     * @Route("/process-login", name="process login")
     * @Method("POST")
     */
    public function processLogin()
    {
        $name     = $this->request->request->get('name');
        $password = $this->request->request->get('password');
        $submit   = $this->request->request->get('submit');
        $token    = $this->request->request->get('token');

        if(isset($submit) && !is_null($token))
        {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery('SELECT u.id, u.name FROM AppBundle:Admin u WHERE u.name = :name AND u.password = :password')
                ->setParameter('name', $name)
                ->setParameter('password', $password);

            $result = $query->getOneOrNullResult();

            if ($result < 1)
            {
                $errors = 'Incorrect login details';
                $action = $this->redirectToRoute('login');
            }
            else
            {
                $errors = '';
                $admin  = $query->getResult();
                $this->session->start();
                $this->session->set('admin_name', $admin[0]['name']);
                $this->session->set('admin_id', $admin[0]['id']);
                $action = $this->redirectToRoute('homepage');
            }
        }
        else
        {
            $action = $this->redirectToRoute('login');
        }

        return $action;
    }


    private function isLoggedIn()
    {
        $adminSession = $this->session->get('admin_name');
        return $adminSession;
    }

    /**
     * @Route("/logout/", name="logout")
     */
    public function logOutAction()
    {
        $this->session->clear();
        $this->session->getFlashBag()->add('loggedOut', 'You have logged out');
        $token = md5(rand(1, 100000));
        return $this->render('login/index.html.twig', array('token' => $token));
    }

}
