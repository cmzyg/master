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
    private $testas;
    private $filesystem;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->session = new Session;
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
        $mainFolder = 'main_folder/';
        // create main folders
        $this->filesystem->mkdir($mainFolder . 'admin');
        $this->filesystem->mkdir($mainFolder . 'admin');
        $this->filesystem->mkdir($mainFolder . 'assets');
        $this->filesystem->mkdir($mainFolder . 'core');
        $this->filesystem->mkdir($mainFolder . 'includes');
        $this->filesystem->mkdir($mainFolder . 'css');
        $this->filesystem->mkdir($mainFolder . 'fullcalendar');
        $this->filesystem->mkdir($mainFolder . 'geolocation');
        $this->filesystem->mkdir($mainFolder . 'images');

        return $this->render('site/index.html.twig');
    }


}
