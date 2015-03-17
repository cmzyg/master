<?php

namespace AppBundle\Controller;

use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\Sites;
<<<<<<< HEAD
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
=======
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

>>>>>>> d5ab6fd746bf1654846ac9a2ed46a38c8f3d01f5

class SiteController extends Controller
{
    private $request;
    private $session;
<<<<<<< HEAD
    private $filesystem;

    public function __construct()
    {
        $this->request    = Request::createFromGlobals();
        $this->session    = new Session;
        $this->filesystem = new Filesystem();
=======

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->session = new Session;
>>>>>>> d5ab6fd746bf1654846ac9a2ed46a38c8f3d01f5
    }

    /**
     * @Route("site/{id}", name="site")
     */
    public function indexAction()
    {

        $siteID = $this->request->query->get('id');

<<<<<<< HEAD
        return $this->render('site/index.html.twig', array('siteID' => $siteID));
    }

    /**
     * @Route("make-site", name="make-site")
     */
    public function makeSite()
    {
        $this->filesystem->mkdir('admin');
        // !$this->filesystem->exists('admin')    ? $this->filesystem->mkdir('admin')    : false;
        // !$this->filesystem->exists('assets')   ? $this->filesystem->mkdir('assets')   : false;
        // !$this->filesystem->exists('core')     ? $this->filesystem->mkdir('core')     : false;
        // !$this->filesystem->exists('includes') ? $this->filesystem->mkdir('includes') : false;
        return $this->render('site/index.html.twig');
=======
        return $this->render('master/index.html.twig', array('siteID' => $siteID));
>>>>>>> d5ab6fd746bf1654846ac9a2ed46a38c8f3d01f5
    }


}
