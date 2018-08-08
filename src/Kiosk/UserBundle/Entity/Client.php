<?php

namespace Kiosk\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="kiosk_client")
 * @ORM\Entity(repositoryClass="Kiosk\UserBundle\Repository\ClientRepository")
 */
class Client extends Personne
{

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Kiosk\UserBundle\Entity\Adresse", mappedBy="client")
     */
    private $adresses;


    /**
     * Set code
     *
     * @param string $id
     *
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
     * @return Client
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
