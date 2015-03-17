<?php

namespace AppBundle\Controller;

use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
     * This method checks whether domain already exists
     * Moves base files to new directory
     *
     * @Route("make-site/{domain}", name="make-site")
     * @param string $domain
     * @return mixed
     */
    public function makeSite($domain)
    {
        $baseDir = 'taxi/';
        $newDir  = '../sites/' . $domain;

        // copy new folders
        if(!$this->filesystem->exists($newDir))
        {
            $this->filesystem->mkdir($newDir);
            $this->filesystem->mirror($baseDir, $newDir);
        }

        return $this->render('site/index.html.twig');
    }


}
