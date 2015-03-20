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
        $this->request    = Request::createFromGlobals();
        $this->session    = new Session;
        $this->filesystem = new Filesystem();
    }

    /**
     * @Route("site/{id}", name="site")
     */
    public function indexAction($id)
    {
        if(!is_null($id))
        {
            if($this->siteExists($id))
            {
                $site = $this->getSite($id);
                $siteInfo = array();
                $siteConfig = array();

                $siteInfo['domain']   = $site[0]['domain'];
                $siteInfo['id']       = $site[0]['id'];
                $siteConfig['dbhost'] = $site[0]['dbhost'];
                $siteConfig['dbuser'] = $site[0]['dbuser'];
                $siteConfig['dbpass'] = $site[0]['dbpass'];
                $siteConfig['dbname'] = $site[0]['dbname'];


                $con = mysqli_connect($siteConfig['dbhost'], $siteConfig['dbuser'], $siteConfig['dbpass'], $siteConfig['dbname']);
                if($con)
                {
                    $connectionStatus = "Connection successful";
                }

                return $this->render('site/index.html.twig', array('siteInfo' => $siteInfo, 'siteConfig' => $siteConfig, 'connectionStatus' => $connectionStatus));
            }
        }

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
        $query = $em->createQuery("SELECT u.domain, u.id, u.dbhost, u.dbuser, u.dbpass, u.dbname FROM AppBundle:Sites u WHERE u.id = :id")
                    ->setParameter('id', $id);

        return $query->getResult();
    }

    /**
    * @Route("sites", name="sites")
    */
    public function getSites()
    {
        $em      = $this->getDoctrine()->getManager();
        $repo    = $em->getRepository('AppBundle:Sites');
        $results = $repo->findAll();

        return $this->render('sites/index.html.twig', array('sites' => $results));
    }

    private function siteExists($id)
    {
        $em    = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT u.id FROM AppBundle:Sites u WHERE u.id = :id")
                    ->setParameter('id', $id);

        return $query->getOneOrNullResult();
    }

}
