<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ServiceController extends Controller
{
    private $request;
    private $session;
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

}
