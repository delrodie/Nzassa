<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="fos_group")
*/
class Group extends BaseGroup
{
    /** * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", mappedBy="groups")
    *
    */
    protected $users;


    public function __construct($name = '', $roles = array())
    {
        $this->name = $name;
        $this->roles = $roles;
    }

    public function __toString() {
        return $this->getName();
    }

    function getUsers() {
        return $this->users;
    }


    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Group
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }
}
