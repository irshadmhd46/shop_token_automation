<?php

// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_no", type="string")
     */
    private $phoneNo;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string")
     */
    private $firstName;

    /**
     * Set phoneNo
     *
     * @param integer $phoneNo
     *
     * @return User
     */
    public function setPhoneNo($phoneNo) {
        $this->setUsername($phoneNo);
        $this->phoneNo = $phoneNo;

        return $this;
    }

    /**
     * Get phoneNo
     *
     * @return integer
     */
    public function getPhoneNo() {
        return $this->phoneNo;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

}
