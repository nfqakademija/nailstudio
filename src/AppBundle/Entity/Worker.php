<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Worker
 *
 * @ORM\Table(name="worker")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkerRepository")
 */
class Worker
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=100)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="about", type="string", length=255)
     */
    private $about;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="workersToMatch")
     * @ORM\JoinTable(name="workers_services")
     */
    private $servicesToMatch;

    /**
     * Worker constructor.
     */
    public function __construct()
    {
        $this->servicesToMatch = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     *
     * @return Worker
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Worker
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set about
     *
     * @param string $about
     *
     * @return Worker
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Add servicesToMatch
     *
     * @param Service $serviceToMatch
     *
     * @return Worker
     */
    public function addSevicesToMatch(Service $serviceToMatch): Worker
    {
        $serviceToMatch->addWorkersToMatch($this);
        $this->servicesToMatch[] = $serviceToMatch;
        return $this;
    }

    /**
     * Remove servicesToMatch
     *
     * @param Service $serviceToMatch
     */
    public function removeServicesToMatch(Service $serviceToMatch): void
    {
        $this->servicesToMatch->removeElement($serviceToMatch);
    }

    /**
     * @return ArrayCollection
     */
    public function getServicesToMatch()
    {
        return $this->servicesToMatch;
    }
}

