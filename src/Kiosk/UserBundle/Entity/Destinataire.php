<?php

namespace Kiosk\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Destinataire
 *
 * @ORM\Table(name="kiosk_destinataire")
 * @ORM\Entity(repositoryClass="Kiosk\UserBundle\Repository\DestinataireRepository")
 */
class Destinataire extends Personne
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
