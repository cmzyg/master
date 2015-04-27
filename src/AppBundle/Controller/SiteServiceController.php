<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Sites;


class SiteServiceController
{
    private $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function establishDatabaseConnection($dbhost, $dbuser, $dbpass, $dbname)
    {
        if(!mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
        {
            echo mysqli_error(); die;
        }
    }

}
