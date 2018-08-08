<?php

namespace Kiosk\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="kiosk_adresse")
 * @ORM\Entity(repositoryClass="Kiosk\UserBundle\Repository\AdresseRepository")
 */
class Adresse
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
     * @ORM\Column(name="ville", type="string", length=30)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="province", type="string", length=255)
     */
    private $province;

    /**
     * @var string
     *
     * @ORM\Column(name="complements", type="string", length=255)
     */
    private $complements;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=40)
     */
    private $adresse;


    /**
     * @var Client
     * @ORM\ManyToOne(targetEntity="Kiosk\UserBundle\Entity\Client", inversedBy="adresses")
     */
    private $client;

    /**
     * @var ZoneAdresse
     * @ORM\ManyToOne(targetEntity="Kiosk\UserBundle\Entity\ZoneAdresse", inversedBy="adresses")
     */
    private $zone;


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
     * Set ville
     *
     * @param string $ville
     *
     * @return Adresse
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Adresse
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set complements
     *
     * @param string $complements
     *
     * @return Adresse
     */
    public function setComplements($complements)
    {
        $this->complements = $complements;

        return $this;
    }

    /**
     * Get complements
     *
     * @return string
     */
    public function getComplements()
    {
        return $this->complements;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set client
     *
     * @param \Kiosk\UserBundle\Entity\Client $client
     *
     * @return Adresse
     */
    public function setClient(\Kiosk\UserBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Kiosk\UserBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set zone
     *
     * @param \Kiosk\UserBundle\Entity\ZoneAdresse $zone
     *
     * @return Adresse
     */
    public function setZone(\Kiosk\UserBundle\Entity\ZoneAdresse $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \Kiosk\UserBundle\Entity\ZoneAdresse
     */
    public function getZone()
    {
        return $this->zone;
    }
}
