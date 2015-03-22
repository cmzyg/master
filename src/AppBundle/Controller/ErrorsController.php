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
    private $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function log($errorTitle, $errorDescription)
    {
        $errorTime        = date('d-m-Y H:i:s');
        $errors = new Errors();
        $errors->logError($errorTitle, $errorDescription, $errorTime);
        $this->em->persist($errors);
        $this->em->flush();
    }

    private function testing()
    {
        return 'beris';
    }



}
