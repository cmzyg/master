<?php
namespace AppBundle\Controller;

use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\Sites;
use AppBundle\Entity\Errors;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;


class MasterController extends Controller
{
    private $request;
    private $session;
    private $logger;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->session = new Session;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        if(!$this->isLoggedIn())
        {
            // return $this->redirect($this->generateUrl('login'));
        }

        $admin  = $this->getAdminDetails(2);
        $sites  = $this->getManagedSites();
        $errors = $this->getErrors(3);
        $page['id'] = '1';

        return $this->render('master/index.html.twig', array('administrator' => $admin, 'sites' => $sites, 'errors' => $errors, 'page' => $page['id']));
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
        $sites      = $repository->findBy(array(), array('id' => 'DESC'), 5);

        return $sites;
    }

    private function getErrors($limit)
    {
        $em         = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Errors');
        $errors     = $repository->findBy(array(), array('id' => 'DESC'), $limit);

        return $errors;
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
