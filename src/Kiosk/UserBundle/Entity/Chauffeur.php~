<?php

namespace Kiosk\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chauffeur
 *
 * @ORM\Table(name="kiosk_chauffeur")
 * @ORM\Entity(repositoryClass="Kiosk\UserBundle\Repository\ChauffeurRepository")
 */
class Chauffeur extends Personne
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
