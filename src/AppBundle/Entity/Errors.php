<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Errors
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Errors
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="errorTitle", type="string", length=255)
     */
    private $errorTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="errorDescription", type="string", length=9999)
     */
    private $errorDescription;

    /**
     * @ORM\Column(name="errorTime", type="string")
     */
    private $errorTime;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set errorTitle
     *
     * @param string $errorTitle
     * @return Errors
     */
    public function setErrorTitle($errorTitle)
    {
        $this->errorTitle = $errorTitle;

        return $this;
    }

    /**
     * Get errorTitle
     *
     * @return string 
     */
    public function getErrorTitle()
    {
        return $this->errorTitle;
    }


    /**
     * Get errorTime
     *
     * @return string
     */
    public function getErrorTime()
    {
        return $this->errorTime;
    }

    /**
     * Set errorDescription
     *
     * @param string $errorDescription
     * @return Errors
     */
    public function setErrorDescription($errorDescription)
    {
        $this->errorDescription = $errorDescription;

        return $this;
    }

    /**
     * Get errorDescription
     *
     * @return string 
     */
    public function getErrorDescription()
    {
        return $this->errorDescription;
    }

    public function logError($errorTitle, $errorDescription)
    {
        $this->errorTitle       = $errorTitle;
        $this->errorDescription = $errorDescription;
    }

}
