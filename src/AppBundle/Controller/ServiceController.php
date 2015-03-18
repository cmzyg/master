<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ServiceController
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

}
