<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ServiceController
{
    protected $em;

    public function __construct()
    {
        $this->em = $this->getDoctrine()->getManager();
    }

}
