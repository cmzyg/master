<?php
namespace AppBundle\Controller;

use Doctrine\Entity;
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

        $admin = $this->getAdminDetails(2);
        $sites = $this->getManagedSites();

        return $this->render('master/index.html.twig', array('administrator' => $admin, 'sites' => $sites));
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
        $sites      = $repository->findAll(array(), array('id' => 'ASC'));

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
