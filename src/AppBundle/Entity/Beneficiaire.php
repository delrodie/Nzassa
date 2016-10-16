<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Beneficiaire
 *
 * @ORM\Table(name="beneficiaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BeneficiaireRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Beneficiaire
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
     * @ORM\Column(name="nom", type="string", length=75)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenoms", type="string", length=255)
     */
    private $prenoms;

    /**
     * @var string
     *
     * @ORM\Column(name="naissance", type="string", length=10)
     */
    private $naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=2)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=125)
     */
    private $nationalite;


    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=12, unique=true)
    */
        private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="domicile", type="string", length=255)
     */
    private $domicile;

    /**
     * @var string
     *
     * @ORM\Column(name="flotte", type="string", length=8)
     */
    private $flotte;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=8)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=15)
     */
    private $famille;

    /**
     * @var int
     *
     * @ORM\Column(name="enfant", type="integer", nullable=true, options={"default":0})
     */
    private $enfant;

    /**
     * @var string
     *
     * @ORM\Column(name="professionnel", type="string", length=15)
     */
    private $professionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=125, nullable=true)
     */
    private $fonction;

    /**
     * @var bool
     *
     * @ORM\Column(name="bancaire", type="boolean")
     */
    private $bancaire;

    /**
     * @var string
     *
     * @ORM\Column(name="banque", type="string", length=75, nullable=true)
     */
    private $banque;

    /**
     * @var string
     *
     * @ORM\Column(name="dateouverture", type="string", length=10, nullable=true )
     */
    private $dateouverture;

    /**
     * @var string
     *
     * @ORM\Column(name="vague", type="string", length=2)
     */
    private $vague;

    /**
     * @var string
     *
     * @ORM\Column(name="projet", type="text")
     */
    private $projet;

    /**
     * @var string
     *
     * @ORM\Column(name="entreprise", type="string", length=125)
     */
    private $entreprise;

    /**
     * @var bool
     *
     * @ORM\Column(name="activite", type="boolean")
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="dateactivite", type="string", length=10)
     */
    private $dateactivite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscriptionAt", type="datetimetz")
     */
    private $inscriptionAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification_at", type="datetimetz", nullable=true)
     */
    private $modificationAt;


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
     * @return Beneficiaire
     */
    public function setNom($nom)
    {
        $this->nom = strtoupper($nom);

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
     * Set prenoms
     *
     * @param string $prenoms
     *
     * @return Beneficiaire
     */
    public function setPrenoms($prenoms)
    {
        $this->prenoms = strtoupper($prenoms);

        return $this;
    }

    /**
     * Get prenoms
     *
     * @return string
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * Set naissance
     *
     * @param string $naissance
     *
     * @return Beneficiaire
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;

        return $this;
    }

    /**
     * Get naissance
     *
     * @return string
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set sexe
     *
     * @param boolean $sexe
     *
     * @return Beneficiaire
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return bool
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     *
     * @return Beneficiaire
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = strtoupper($nationalite);

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set domicile
     *
     * @param string $domicile
     *
     * @return Beneficiaire
     */
    public function setDomicile($domicile)
    {
        $this->domicile = ucwords($domicile);

        return $this;
    }

    /**
     * Get domicile
     *
     * @return string
     */
    public function getDomicile()
    {
        return $this->domicile;
    }

    /**
     * Set flotte
     *
     * @param string $flotte
     *
     * @return Beneficiaire
     */
    public function setFlotte($flotte)
    {
        $this->flotte = $flotte;

        return $this;
    }

    /**
     * Get flotte
     *
     * @return string
     */
    public function getFlotte()
    {
        return $this->flotte;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Beneficiaire
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return Beneficiaire
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set enfant
     *
     * @param integer $enfant
     *
     * @return Beneficiaire
     */
    public function setEnfant($enfant)
    {
        $this->enfant = $enfant;

        return $this;
    }

    /**
     * Get enfant
     *
     * @return int
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Set professionnel
     *
     * @param string $professionnel
     *
     * @return Beneficiaire
     */
    public function setProfessionnel($professionnel)
    {
        $this->professionnel = $professionnel;

        return $this;
    }

    /**
     * Get professionnel
     *
     * @return string
     */
    public function getProfessionnel()
    {
        return $this->professionnel;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return Beneficiaire
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set bancaire
     *
     * @param boolean $bancaire
     *
     * @return Beneficiaire
     */
    public function setBancaire($bancaire)
    {
        $this->bancaire = $bancaire;

        return $this;
    }

    /**
     * Get bancaire
     *
     * @return bool
     */
    public function getBancaire()
    {
        return $this->bancaire;
    }

    /**
     * Set banque
     *
     * @param string $banque
     *
     * @return Beneficiaire
     */
    public function setBanque($banque)
    {
        $this->banque = strtoupper($banque);

        return $this;
    }

    /**
     * Get banque
     *
     * @return string
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Set dateouverture
     *
     * @param string $dateouverture
     *
     * @return Beneficiaire
     */
    public function setDateouverture($dateouverture)
    {
        $this->dateouverture = $dateouverture;

        return $this;
    }

    /**
     * Get dateouverture
     *
     * @return string
     */
    public function getDateouverture()
    {
        return $this->dateouverture;
    }

    /**
     * Set vague
     *
     * @param string $vague
     *
     * @return Beneficiaire
     */
    public function setVague($vague)
    {
        $this->vague = $vague;

        return $this;
    }

    /**
     * Get vague
     *
     * @return string
     */
    public function getVague()
    {
        return $this->vague;
    }

    /**
     * Set projet
     *
     * @param string $projet
     *
     * @return Beneficiaire
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return string
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return Beneficiaire
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = strtoupper($entreprise);

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set activite
     *
     * @param boolean $activite
     *
     * @return Beneficiaire
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return bool
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set dateactivite
     *
     * @param string $dateactivite
     *
     * @return Beneficiaire
     */
    public function setDateactivite($dateactivite)
    {
        $this->dateactivite = $dateactivite;

        return $this;
    }

    /**
     * Get dateactivite
     *
     * @return string
     */
    public function getDateactivite()
    {
        return $this->dateactivite;
    }

    /**
     * Set inscriptionAt
     *
     * @param \DateTime $inscriptionAt
     *
     * @return Beneficiaire
     */
    public function setInscriptionAt($inscriptionAt)
    {
        //$inscriptionAt = \DateTime();
        $this->inscriptionAt = $inscriptionAt;

        return $this;
    }

    /**
     * Get inscriptionAt
     *
     * @return \DateTime
     */
    public function getInscriptionAt()
    {
        return $this->inscriptionAt;
    }

    // Gestion des relations
    /**
    * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    /**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Zone", inversedBy="beneficiaires")
    * @ORM\JoinColumn(name="zone_id", referencedColumnName="id")
    */
    private $zone;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Domaine")
     * @ORM\JoinTable(name="beneficiaires_domaines",
     *      joinColumns={@ORM\JoinColumn(name="beneficiaire_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="domaine_id", referencedColumnName="id")}
     *      )
     */
     private $domaines;

     /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Photo", cascade={"persist"})
     */
     private $photo;

     public function __construct() {
        $this->domaines = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Beneficiaire
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set zone
     *
     * @param \AppBundle\Entity\Zone $zone
     *
     * @return Beneficiaire
     */
    public function setZone(\AppBundle\Entity\Zone $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \AppBundle\Entity\Zone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Add domaine
     *
     * @param \AppBundle\Entity\Domaine $domaine
     *
     * @return Beneficiaire
     */
    public function addDomaine(\AppBundle\Entity\Domaine $domaine)
    {
        $this->domaines[] = $domaine;

        return $this;
    }

    /**
     * Remove domaine
     *
     * @param \AppBundle\Entity\Domaine $domaine
     */
    public function removeDomaine(\AppBundle\Entity\Domaine $domaine)
    {
        $this->domaines->removeElement($domaine);
    }

    /**
     * Get domaines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDomaines()
    {
        return $this->domaines;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Beneficiaire
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @ORM\PrePersist
     */
    public function setInscriptionAtValue()
    {
        $this->inscriptionAt = new \DateTime();
    }


    /**
     * Set modificationAt
     *
     * @param \DateTime $modificationAt
     *
     * @return Beneficiaire
     */
    public function setModificationAt($modificationAt)
    {
        $this->modificationAt = $modificationAt;

        return $this;
    }

    /**
     * Get modificationAt
     *
     * @return \DateTime
     */
    public function getModificationAt()
    {
        return $this->modificationAt;
    }

    /**
     * @ORM\PostUpdate
     */
    public function setModificationAtValue()
    {
        $this->inscriptionAt = new \DateTime();
    }



    /**
     * Set photo
     *
     * @param \AppBundle\Entity\Photo $photo
     *
     * @return Beneficiaire
     */
    public function setPhoto(\AppBundle\Entity\Photo $photo = null)
    {
        $this->photo = $photo;

        return $this; 
    }

    /**
     * Get photo
     *
     * @return \AppBundle\Entity\Photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}
