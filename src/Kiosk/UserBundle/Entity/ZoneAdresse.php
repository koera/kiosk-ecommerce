<?php

namespace Kiosk\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ZoneAdresse
 *
 * @ORM\Table(name="kiosk_zone_adresse")
 * @ORM\Entity(repositoryClass="Kiosk\UserBundle\Repository\ZoneAdresseRepository")
 */
class ZoneAdresse
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
     * @ORM\Column(name="zone", type="string", length=30)
     */
    private $zone;

    /**
     * @var int
     *
     * @ORM\Column(name="frais_livraison", type="integer")
     */
    private $fraisLivraison;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Kiosk\UserBundle\Entity\Adresse", mappedBy="zone")
     */
    private $adresses;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return ZoneAdresse
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set fraisLivraison
     *
     * @param integer $fraisLivraison
     *
     * @return ZoneAdresse
     */
    public function setFraisLivraison($fraisLivraison)
    {
        $this->fraisLivraison = $fraisLivraison;

        return $this;
    }

    /**
     * Get fraisLivraison
     *
     * @return int
     */
    public function getFraisLivraison()
    {
        return $this->fraisLivraison;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add adress
     *
     * @param \Kiosk\UserBundle\Entity\Adresse $adress
     *
     * @return ZoneAdresse
     */
    public function addAdress(\Kiosk\UserBundle\Entity\Adresse $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \Kiosk\UserBundle\Entity\Adresse $adress
     */
    public function removeAdress(\Kiosk\UserBundle\Entity\Adresse $adress)
    {
        $this->adresses->removeElement($adress);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}
