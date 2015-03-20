<?php

namespace AppBundle\Controller;

use Doctrine\Entity;
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

                $connectionStatus = $this->checkConnection($siteConfig['dbhost'], $siteConfig['dbuser'], $siteConfig['dbpass'], $siteConfig['dbname']);

                return $this->render('site/index.html.twig', array('siteInfo' => $siteInfo, 'siteConfig' => $siteConfig, 'connectionStatus' => $connectionStatus, 'id' => $id));
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

    private function checkConnection($dbhost, $dbuser, $dbpass, $dbname)
    {
        if(@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
        {
            $connectionStatus = "Connection successful";
        }
        else
        {
            $connectionStatus = "Connection unsuccessful";
        }

        return $connectionStatus;
    }

    /**
     * @Route("process-site", name="process-site")
     * @Method("POST")
     */
    public function processSite()
    {
        $siteId = $this->request->request->get('id');
        $dbHost = $this->request->request->get('dbhost');
        $dbUser = $this->request->request->get('dbuser');
        $dbPass = $this->request->request->get('dbpass');
        $dbName = $this->request->request->get('dbname');

        $em     = $this->getDoctrine()->getManager();
        $repo   = $em->getRepository('AppBundle:Sites');
        $config = $repo->findOneById($siteId);

        $config->setDbHost($dbHost);
        $config->setDbUser($dbUser);
        $config->setDbPass($dbPass);
        $config->setDbName($dbName);

        $em->persist($config);
        $em->flush();

        return $this->redirect($this->generateUrl('site', array('id' => $siteId)));
    }

}
