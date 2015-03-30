<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Entity\Sites;



class IncludesController
{
    private $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getManagedSites($limit = null)
    {
        $em         = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Sites');
        $sites      = $repository->findBy(array(), array('id' => 'DESC'), $limit);

        return $sites;
    }

}
