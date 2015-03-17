<?php

namespace AppBundle\Controller;

use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\Sites;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;

class SiteController extends Controller
{
    private $request;
    private $session;
    private $filesystem;

    public function __construct()
    {
        $this->request    = Request::createFromGlobals();
        $this->session    = new Session;
        $this->filesystem = new Filesystem();
    }

    /**
     * @Route("site/{id}", name="site")
     */
    public function indexAction()
    {

        $siteID = $this->request->query->get('id');

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
    }


}
