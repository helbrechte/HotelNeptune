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
     * @ORM\OneToMany(targetEntity="HotelBundle\Entity\Image", cascade={"persist"} , mappedBy="chambre")
     */

    private $image;


    /**
     * @var string
     *
     * @ORM\Column(name="exposition", type="string" , length=255)
     */

    private $exposition;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string" , length=255)
     */

    private $libelle;


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
    public function setTarif(Tarif $tarif)
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

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Chambre
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set exposition.
     *
     * @param string $exposition
     *
     * @return Chambre
     */
    public function setExposition($exposition)
    {
        $this->exposition = $exposition;

        return $this;
    }

    /**
     * Get exposition.
     *
     * @return string
     */
    public function getExposition()
    {
        return $this->exposition;
    }
}
