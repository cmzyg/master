<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Errors;



class ErrorsController
{


    public function __construct()
    {
        //...
    }

    public function logError($errorTitle, $errorDescription)
    {
        $errorTime        = date('d-m-Y H:i:s');
        $errors = new Errors();
        $errors->logError($errorTitle, $errorDescription, $errorTime);
        $em = $this->getDoctrine()->getManager();
        $em->persist($errors);
        $em->flush();
    }

    private function testing()
    {
        return 'beris';
    }



}