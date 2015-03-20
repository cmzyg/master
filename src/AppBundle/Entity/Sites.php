<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Sites")
 */

class Sites {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $domain;

    /**
     * @ORM\Column(type="string", length=255)
     * */
    protected $dbhost;

    /**
     * @ORM\Column(type="string", length=255)
     * */
    protected $dbuser;

    /**
     * @ORM\Column(type="string", length=255)
     * */
    protected $dbpass;

    /**
     * @ORM\Column(type="string", length=255)
     * */
    protected $dbname;

    /**
     * @ORM\Column(type="integer", length=1)
     */
    protected $status;


    public function getDomain()
    {
        return $this->domain;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getDbHost()
    {
        return $this->dbhost;
    }

    public function getDbUser()
    {
        return $this->dbuser;
    }

    public function getDbPass()
    {
        return $this->dbpass;
    }

    public function getDbName()
    {
        return $this->dbname;
    }

    public function getStatus()
    {
        return $this->status;
    }

}
?>
