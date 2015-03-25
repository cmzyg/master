<?php
namespace AppBundle\Controller;

use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\Sites;
use AppBundle\Entity\Errors;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;


class ErrorLogController extends Controller
{
    private $request;
    private $session;
    private $logger;

    public function __construct()
    {
        
    }

    /**
     * @Route("error-log", name="Error Log")
     */
    public function indexAction()
    {
        return $this->render('error-log/index.html.twig');
    }



}
