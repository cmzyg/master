<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
    public function indexAction($id)
    {
        $site = $this->getSite($id);
        return $this->render('site/index.html.twig', array('site' => $site));
    }

    /**
     * This method checks whether domain already exists
     * Moves base files to new directory
     * @Route("make-site/{domain}", name="make-site")
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

    private function getSite($id)
    {
        $em    = $this->getDoctrine()->getManager();
        $query = $em->sqlBuilder("SELECT * FROM sites u WHERE id u = :id")
                    ->setParam('id', $id);

        return $query->results();
    }


}
