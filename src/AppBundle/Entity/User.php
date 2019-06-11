<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fullname;


    private $exp;


    public function __construct()
    {
        $this->exp = new ArrayCollection();
    }

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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return User
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Add exp
     *
     * @param \AppBundle\Entity\Exp $exp
     *
     * @return User
     */
    public function addExp(\AppBundle\Entity\Exp $exp)
    {
//        $this->exp[] = $exp;
        if (!$this->exp->contains($exp)) {
            $this->exp->add($exp);
            $exp->setUser($this);
        }
//
//        $exp->setUser($this);
//        return $this;
    }

    /**
     * Remove exp
     *
     * @param \AppBundle\Entity\Exp $exp
     */
    public function removeExp(\AppBundle\Entity\Exp $exp)
    {
        $this->exp->removeElement($exp);
        $exp->setUser(null);
    }

    /**
     * Get exp
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExp()
    {
        return $this->exp;
    }
}
