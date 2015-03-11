<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Admin;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\Date;


class MasterController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        /*if(!$this->isLoggedIn())
        {
            return $this->redirect($this->generateUrl('error'));
        }*/

        $admin = $this->getAdminDetails(1);

        return $this->render('master/index.html.twig', array('administrator' => $admin));
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
        $em->flush();

        return is_array($admin) && !is_null($admin) ? $admin : false;
    }

    private function isLoggedIn()
    {
        return $this->container->get('session')->isStarted();
    }


    /**
     * @Route("/error/", name="error")
     */
    public function notLoggedIn()
    {
        return $this->render('login/index.html.twig');
    }

}
