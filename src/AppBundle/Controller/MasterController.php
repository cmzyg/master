<?php

namespace AppBundle\Controller;

use Doctrine\Entity;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\Sites;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;


class MasterController extends Controller
{
    private $request;
    private $session;
    private $em;
    private $test;

    public function __construct(EntityManager $em)
    {
        $this->request = Request::createFromGlobals();
        $this->session = new Session;
        $this->em      = $em;
    }

    /**
     * @Route("site", name="site")
     */
    public function indexAction()
    {
        if(!$this->isLoggedIn())
        {
            // return $this->redirect($this->generateUrl('login'));
        }

        $siteID = $this->request->query->get('id');

        return $this->render('sites/index.html.twig', array('administrator' => $admin, 'sites' => $sites, 'name' => $name));
    }


    private function getAdminDetails($id)
    {
        $em                = $this->getDoctrine()->getManager();
        $repository        = $em->getRepository('AppBundle:Admin');
        $administrator     = $repository->findOneById($id);

        $admin['name']     = $administrator->getName();
        $admin['id']       = $administrator->getId();
        $admin['password'] = $administrator->getPassword();
        $admin['picture']  = $administrator->getPicture();

        $administrator->setLastLoggedIn(new \DateTime(date('Y-m-d H:i:s')));
        $administrator->setCurrentLocation($this->request->getPathInfo());
        $em->flush();

        return is_array($admin) && !is_null($admin) ? $admin : false;
    }

    private function getManagedSites()
    {
        $em         = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Sites');
        $sites      = $repository->findAll();

        return $sites;
    }

    private function isLoggedIn()
    {
        return $this->container->get('session')->isStarted();
    }


    /**
     * @Route("/error/", name="error")
     */
    public function notLoggedIn()
    {
        return $this->render('login/index.html.twig');
    }


}
