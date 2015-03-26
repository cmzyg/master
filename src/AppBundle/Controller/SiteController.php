<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use AppBundle\Entity\Errors;



class SiteController extends Controller
{
    private $request;
    private $session;
    private $filesystem;
    private $finder;
    private $logger;


    public function __construct()
    {
        $this->request    = Request::createFromGlobals();
        $this->session    = new Session;
        $this->filesystem = new Filesystem();
        $this->finder     = new Finder();
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
                $site       = $this->getSite($id);
                $siteInfo   = array();
                $siteConfig = array();

                $siteInfo['domain']   = $site[0]['domain'];
                $siteInfo['id']       = $site[0]['id'];
                $siteConfig['dbhost'] = $site[0]['dbhost'];
                $siteConfig['dbuser'] = $site[0]['dbuser'];
                $siteConfig['dbpass'] = $site[0]['dbpass'];
                $siteConfig['dbname'] = $site[0]['dbname'];

                $connectionStatus = $this->checkConnection($siteConfig['dbhost'], $siteConfig['dbuser'], $siteConfig['dbpass'], $siteConfig['dbname']);

                $fileList = array();
                $this->finder->files()->in('/home/watford/public_html/');

                foreach ($this->finder as $file) 
                {
                    $fileList[] = $file->getRealpath();
                }

                return $this->render('AppBundle:site:index.html.twig', array('siteInfo' => $siteInfo, 'siteConfig' => $siteConfig, 'connectionStatus' => $connectionStatus, 'id' => $id, 'fileList' => $fileList, 'fileCount' => sizeof($fileList)));
            }
        }

    }

    /**
     * This method checks whether domain already exists
     * Moves base files to new directory
     * @Method("POST")
     * @Route("make-project", name="make-project")
     */
    public function makeProject($domain)
    {
        $domain  = $this->request->request->get('domain');
        $folder  = $this->request->request->get('folder');
        $dbhost  = $this->request->request->get('dbhost');
        $dbuser  = $this->request->request->get('dbuser');
        $dbpass  = $this->request->request->get('dbpass');
        $dbname  = $this->request->request->get('dbname');
        $baseDir = 'taxi/';

        $newDir = '/home/' . $folder . '/public_html/';

        // copy new folders
        if(!$this->filesystem->exists($newDir))
        {
            $this->filesystem->mkdir($newDir, 0777);
            $this->filesystem->mirror($baseDir, $newDir);
            $this->generateJSON($dbhost, $dbuser, $dbpass, $dbname, $domain, $folder);
            if($this->filesystem->exists($newDir))
            {
                return $this->render('site/success.html.twig');
            }
        }

        return $this->render('site/failed.html.twig');
    }


    /**
     * @Route("add-project", name="Add Project")
     */
    public function addProject()
    {
        $this->render('AppBundle:site:add-project.html.twig');
    }


    private function getSite($id)
    {
        $em    = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT u.domain, u.id, u.dbhost, u.dbuser, u.dbpass, u.dbname FROM AppBundle:Sites u WHERE u.id = :id")
                    ->setParameter('id', $id);

        return $query->getResult();
    }


    /**
    * @Route("projects", name="sites")
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
            $this->logger  = $this->get('app.errors_controller');
            $this->logger->log('Database Problem', 'Incorrect database connection details');

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
        $domain = $this->request->request->get('domain');

        $em     = $this->getDoctrine()->getManager();
        $repo   = $em->getRepository('AppBundle:Sites');
        $config = $repo->findOneById($siteId);

        $config->setDbHost($dbHost);
        $config->setDbUser($dbUser);
        $config->setDbPass($dbPass);
        $config->setDbName($dbName);
        $config->setDomain($domain);

        $em->persist($config);
        $em->flush();

        if(!$this->generateJSON($dbHost, $dbUser, $dbPass, $dbName, $domain, 'watford'))
        {
            $this->logger  = $this->get('app.errors_controller');
            $this->logger->log('Process Site Problem', 'Problem generating JSON');
        }

        return $this->redirect($this->generateUrl('site', array('id' => $siteId)));
    }


    private function generateJSON($dbhost, $dbuser, $dbpass, $dbname, $siteurl, $folder)
    {
        $databaseJSON = array(
            'dbhost'  => $dbhost,
            'dbuser'  => $dbuser,
            'dbpass'  => $dbpass,
            'dbname'  => $dbname,
            'siteurl' => $siteurl
        );

        $databaseJSON = json_encode($databaseJSON);
        $pathJSON     = '/home/' . $folder . '/public_html/database.json';

        return file_put_contents($pathJSON, $databaseJSON) ? TRUE : FALSE;
    }

}
