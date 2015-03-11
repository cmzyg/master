<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Admin")
 */

class Admin {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     */
    protected $picture;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $lastLoggedIn;


    public function getName()
    {
        return $this->name;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setLastLoggedIn($lastLoggedIn)
    {
        $this->lastLoggedIn = $lastLoggedIn;
    }




}
?>