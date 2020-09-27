<?php

namespace BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunt
 *
 * @ORM\Table(name="emprunt")
 * @ORM\Entity(repositoryClass="BiblioBundle\Repository\EmpruntRepository")
 */
class Emprunt
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmprunt", type="datetime")
     */
    private $dateEmprunt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRendu", type="datetime")
     */
    private $dateRendu;

    /**
     * @ORM\ManyToOne(targetEntity="Eleve", inversedBy="emprunts")
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity="Livre", inversedBy="emprunts")
     */
    private $livre;


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
     * Set dateEmprunt
     *
     * @param \DateTime $dateEmprunt
     *
     * @return Emprunt
     */
    public function setDateEmprunt($dateEmprunt)
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    /**
     * Get dateEmprunt
     *
     * @return \DateTime
     */
    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }

    /**
     * Set eleve
     *
     * @param \BiblioBundle\Entity\Eleve $eleve
     *
     * @return Emprunt
     */
    public function setEleve(\BiblioBundle\Entity\Eleve $eleve = null)
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \BiblioBundle\Entity\Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Set livre
     *
     * @param \BiblioBundle\Entity\Livre $livre
     *
     * @return Emprunt
     */
    public function setLivre(\BiblioBundle\Entity\Livre $livre = null)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return \BiblioBundle\Entity\Livre
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set dateRendu
     *
     * @param \DateTime $dateRendu
     *
     * @return Emprunt
     */
    public function setDateRendu($dateRendu)
    {
        $this->dateRendu = $dateRendu;

        return $this;
    }

    /**
     * Get dateRendu
     *
     * @return \DateTime
     */
    public function getDateRendu()
    {
        return $this->dateRendu;
    }
}
