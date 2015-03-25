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
        $admin  = $this->getAdminDetails(2);
        $errors = $this->getErrors(30);
        return $this->render('error-log/index.html.twig', array('errors' => $errors, 'administrator' => $admin));
    }

    private function getErrors($limit)
    {
        $em         = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Errors');
        $errors     = $repository->findBy(array(), array('id' => 'DESC'), $limit);

        return $errors;
    }

    private function getAdminDetails($id)
    {
        $em                = $this->getDoctrine()->getManager();
        $repository        = $em->getRepository('AppBundle:Admin');
        $administrator     = $repository->findOneById($id);

        $admin['name']     = $administrator->getName();
        $admin['id']       = $administrator->getId();
        $admin['password'] = $administrator->getPassword();
        $admin['picture']  = $administrator->getPicture();

        $administrator->setLastLoggedIn(new \DateTime(date('Y-m-d H:i:s')));
        $administrator->setCurrentLocation($this->request->getPathInfo());
        $em->flush();

        return is_array($admin) && !is_null($admin) ? $admin : false;
    }



}
