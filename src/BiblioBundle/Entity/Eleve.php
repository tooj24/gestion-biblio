<?php

namespace BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="BiblioBundle\Repository\EleveRepository")
 */
class Eleve
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="Mention", inversedBy="eleves")
     */
    private $mention;

    /**
     * @ORM\ManyToOne(targetEntity="Grade", inversedBy="eleves")
     */
    private $grade;

    /**
     * @ORM\OneToMany(targetEntity="Emprunt", mappedBy="eleve")
     */
    private $emprunts;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Eleve
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Eleve
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mention
     *
     * @param \BiblioBundle\Entity\Mention $mention
     *
     * @return Eleve
     */
    public function setMention(\BiblioBundle\Entity\Mention $mention = null)
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Get mention
     *
     * @return \BiblioBundle\Entity\Mention
     */
    public function getMention()
    {
        return $this->mention;
    }

    /**
     * Set grade
     *
     * @param \BiblioBundle\Entity\Grade $grade
     *
     * @return Eleve
     */
    public function setGrade(\BiblioBundle\Entity\Grade $grade = null)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return \BiblioBundle\Entity\Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emprunts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add emprunt
     *
     * @param \BiblioBundle\Entity\Emprunt $emprunt
     *
     * @return Eleve
     */
    public function addEmprunt(\BiblioBundle\Entity\Emprunt $emprunt)
    {
        $this->emprunts[] = $emprunt;

        return $this;
    }

    /**
     * Remove emprunt
     *
     * @param \BiblioBundle\Entity\Emprunt $emprunt
     */
    public function removeEmprunt(\BiblioBundle\Entity\Emprunt $emprunt)
    {
        $this->emprunts->removeElement($emprunt);
    }

    /**
     * Get emprunts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmprunts()
    {
        return $this->emprunts;
    }
}
