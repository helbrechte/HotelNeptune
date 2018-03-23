<?php

namespace HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="HotelBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */

    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="HotelBundle\Entity\Chambre")
     * @ORM\JoinColumn(nullable=false)
     */

    private $chambre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDep", type="datetime")
     */
    private $dateDep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArr", type="datetime")
     */
    private $dateArr;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPers", type="integer")
     */
    private $nbPers;


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
     * Set dateDep
     *
     * @param \DateTime $dateDep
     *
     * @return Reservation
     */
    public function setDateDep($dateDep)
    {
        $this->dateDep = $dateDep;

        return $this;
    }

    /**
     * Get dateDep
     *
     * @return \DateTime
     */
    public function getDateDep()
    {
        return $this->dateDep;
    }

    /**
     * Set dateArr
     *
     * @param \DateTime $dateArr
     *
     * @return Reservation
     */
    public function setDateArr($dateArr)
    {
        $this->dateArr = $dateArr;

        return $this;
    }

    /**
     * Get dateArr
     *
     * @return \DateTime
     */
    public function getDateArr()
    {
        return $this->dateArr;
    }

    /**
     * Set nbPers
     *
     * @param integer $nbPers
     *
     * @return Reservation
     */
    public function setNbPers($nbPers)
    {
        $this->nbPers = $nbPers;

        return $this;
    }

    /**
     * Get nbPers
     *
     * @return int
     */
    public function getNbPers()
    {
        return $this->nbPers;
    }

    /**
     * Set client
     *
     * @param \UserBundle\Entity\Client $client
     *
     * @return Reservation
     */
    public function setClient(\UserBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \UserBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set chambre
     *
     * @param \HotelBundle\Entity\Chambre $chambre
     *
     * @return Reservation
     */
    public function setChambre(\HotelBundle\Entity\Chambre $chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }

    /**
     * Get chambre
     *
     * @return \HotelBundle\Entity\Chambre
     */
    public function getChambre()
    {
        return $this->chambre;
    }
}
