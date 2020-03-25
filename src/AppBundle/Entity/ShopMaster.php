<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopMaster
 *
 * @ORM\Table(name="shop_master")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShopMasterRepository")
 */
class ShopMaster
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="shopId", type="string", length=255, nullable=true)
     */
    private $shopId;

    /**
     * @var string
     *
     * @ORM\Column(name="shopName", type="string", length=255)
     */
    private $shopName;

    /**
     * @var string
     *
     * @ORM\Column(name="shopLocation", type="string", length=255)
     */
    private $shopLocation;


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
     * Set shopId
     *
     * @param string $shopId
     *
     * @return ShopMaster
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;

        return $this;
    }

    /**
     * Get shopId
     *
     * @return string
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Set shopName
     *
     * @param string $shopName
     *
     * @return ShopMaster
     */
    public function setShopName($shopName)
    {
        $this->shopName = $shopName;

        return $this;
    }

    /**
     * Get shopName
     *
     * @return string
     */
    public function getShopName()
    {
        return $this->shopName;
    }

    /**
     * Set shopLocation
     *
     * @param string $shopLocation
     *
     * @return ShopMaster
     */
    public function setShopLocation($shopLocation)
    {
        $this->shopLocation = $shopLocation;

        return $this;
    }

    /**
     * Get shopLocation
     *
     * @return string
     */
    public function getShopLocation()
    {
        return $this->shopLocation;
    }
}
