<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Zone
 *
 * @ORM\Table(name="zone")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ZoneRepository")
 */
class Zone
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true, unique=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=true, unique=true)
     */
    private $code;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    protected $desactivation = false;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Zone
     */
    public function setLibelle($libelle)
    {
        $this->libelle = strtoupper($libelle);

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Zone
     */
    public function setCode($code)
    {
      // Recuperation de l'id
    //  $code = ZoneRepository::formatCode(getId());

        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set desactivation
     *
     * @param boolean $desactivation
     *
     * @return Zone
     */
    public function setDesactivation($desactivation)
    {
        $this->desactivation = $desactivation;

        return $this;
    }

    /**
     * Get desactivation
     *
     * @return boolean
     */
    public function getDesactivation()
    {
        return $this->desactivation;
    }

    // Gestion de la relation avec beneficiaire
    /**
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\Beneficiaire", mappedBy="zone")
    */
    private $beneficiaires;

    public function __construct() {
      $this->beneficiaires = new ArrayCollection();
    }

    /**
     * Add beneficiaire
     *
     * @param \AppBundle\Entity\Beneficiaire $beneficiaire
     *
     * @return Zone
     */
    public function addBeneficiaire(\AppBundle\Entity\Beneficiaire $beneficiaire)
    {
        $this->beneficiaires[] = $beneficiaire;

        return $this;
    }

    /**
     * Remove beneficiaire
     *
     * @param \AppBundle\Entity\Beneficiaire $beneficiaire
     */
    public function removeBeneficiaire(\AppBundle\Entity\Beneficiaire $beneficiaire)
    {
        $this->beneficiaires->removeElement($beneficiaire);
    }

    /**
     * Get beneficiaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBeneficiaires()
    {
        return $this->beneficiaires;
    }

    public function __toString() {
        return $this->getLibelle();
    }
}
