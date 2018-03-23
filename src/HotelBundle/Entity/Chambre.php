<?php

namespace HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass="HotelBundle\Repository\ChambreRepository")
 */
class Chambre
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
     * @ORM\ManyToOne(targetEntity="HotelBundle\Entity\Tarif")
     * @ORM\JoinColumn(nullable=false)
     */

    private $tarif;

    /**
     * @ORM\OneToMany(targetEntity="HotelBundle\Entity\Image", cascade={"persist"} , mappedBy="Chambre")
     */

    private $image;


    /**
     * @var int
     *
     * @ORM\Column(name="cap", type="integer")
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="expo", type="string", length=255)
     */
    private $expo;

    /**
     * @var int
     *
     * @ORM\Column(name="douche", type="integer")
     */
    private $douche;

    /**
     * @var int
     *
     * @ORM\Column(name="wc", type="integer")
     */
    private $wc;

    /**
     * @var int
     *
     * @ORM\Column(name="bain", type="integer")
     */
    private $bain;

    /**
     * @var int
     *
     * @ORM\Column(name="etage", type="integer")
     */
    private $etage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reserved", type="boolean")
     */

    private $reserved;


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
     * Set cap
     *
     * @param integer $cap
     *
     * @return Chambre
     */
    public function setCap($cap)
    {
        $this->cap = $cap;

        return $this;
    }

    /**
     * Get cap
     *
     * @return int
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * Set expo
     *
     * @param string $expo
     *
     * @return Chambre
     */
    public function setExpo($expo)
    {
        $this->expo = $expo;

        return $this;
    }

    /**
     * Get expo
     *
     * @return string
     */
    public function getExpo()
    {
        return $this->expo;
    }

    /**
     * Set douche
     *
     * @param integer $douche
     *
     * @return Chambre
     */
    public function setDouche($douche)
    {
        $this->douche = $douche;

        return $this;
    }

    /**
     * Get douche
     *
     * @return int
     */
    public function getDouche()
    {
        return $this->douche;
    }

    /**
     * Set wc
     *
     * @param integer $wc
     *
     * @return Chambre
     */
    public function setWc($wc)
    {
        $this->wc = $wc;

        return $this;
    }

    /**
     * Get wc
     *
     * @return int
     */
    public function getWc()
    {
        return $this->wc;
    }

    /**
     * Set bain
     *
     * @param integer $bain
     *
     * @return Chambre
     */
    public function setBain($bain)
    {
        $this->bain = $bain;

        return $this;
    }

    /**
     * Get bain
     *
     * @return int
     */
    public function getBain()
    {
        return $this->bain;
    }

    /**
     * Set etage
     *
     * @param integer $etage
     *
     * @return Chambre
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * Get etage
     *
     * @return int
     */
    public function getEtage()
    {
        return $this->etage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set tarif
     *
     * @param \HotelBundle\Entity\Tarif $tarif
     *
     * @return Chambre
     */
    public function setTarif(\HotelBundle\Entity\Tarif $tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return \HotelBundle\Entity\Tarif
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Add image
     *
     * @param \HotelBundle\Entity\Image $image
     *
     * @return Chambre
 */
    public function addImage(\HotelBundle\Entity\Image $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \HotelBundle\Entity\Image $image
     */
    public function removeImage(\HotelBundle\Entity\Image $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set reserved.
     *
     * @param bool $reserved
     *
     * @return Chambre
     */
    public function setReserved($reserved)
    {
        $this->reserved = $reserved;

        return $this;
    }

    /**
     * Get reserved.
     *
     * @return bool
     */
    public function getReserved()
    {
        return $this->reserved;
    }
}
