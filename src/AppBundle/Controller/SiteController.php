<?php

namespace AppBundle\Controller;

use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\Sites;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;


class SiteController extends Controller
{
    private $request;
    private $session;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->session = new Session;
    }

    /**
     * @Route("site/{id}", name="site")
     */
    public function indexAction()
    {

        $siteID = $this->request->query->get('id');

        return $this->render('master/index.html.twig', array('siteID' => $siteID));
    }


}
