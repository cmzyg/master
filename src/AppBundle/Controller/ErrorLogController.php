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
        $errors = $this->getErrors(30);
        return $this->render('error-log/index.html.twig', array('errors' => $errors));
    }

    private function getErrors($limit)
    {
        $em         = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Errors');
        $errors     = $repository->findBy(array(), array('id' => 'DESC'), $limit);

        return $errors;
    }



}
