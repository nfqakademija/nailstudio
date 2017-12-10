<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceRepository")
 */
class Service
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duration", type="time")
     */
    private $duration;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="service")
     */
    private $reservation;

    /**
     *
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;


    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Worker", mappedBy="services")
     */
    private $workers;

    /**
     * @ORM\Column(type="string")
     */
    private $about;


    /**
     * Service constructor.
     */
    public function __construct()
    {
        $this->workers = new ArrayCollection();
        $this->reservation = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Service
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set duration
     *
     * @param \DateTime $duration
     *
     * @return Service
     */
    public function setDuration($duration)
    {

        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Service
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return ArrayCollection
     */
    public function getWorkers()
    {
        return $this->workers;
    }

    /**
     * @param ArrayCollection $workers
     */
    public function setWorkers(ArrayCollection $workers)
    {
        $this->workers = $workers;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param string $about
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * Add worker
     *
     * @param \AppBundle\Entity\Worker $worker
     *
     * @return Service
     */
    public function addWorker(\AppBundle\Entity\Worker $worker)
    {
        $this->workers[] = $worker;

        return $this;
    }

    /**
     * Remove worker
     *
     * @param \AppBundle\Entity\Worker $worker
     */
    public function removeWorker(\AppBundle\Entity\Worker $worker)
    {
        $this->workers->removeElement($worker);
    }

    /**
     * @return ArrayCollection
     */
    public function getReservation()
    {
        return $this->reservation;
    }

//    /**
//     * @param ArrayCollection $reservation
//     */
//    public function setReservation(ArrayCollection $reservation)
//    {
//        $this->reservation = $reservation;
//    }
}
