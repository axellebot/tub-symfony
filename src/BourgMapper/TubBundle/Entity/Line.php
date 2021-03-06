<?php

namespace BourgMapper\TubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Line
 *
 * @ORM\Table(name="Line")
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 */
class Line
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     * @Serializer\Expose
     */
    private $label;


    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", length=11)
     * @Serializer\Expose
     */

    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=28)
     * @Serializer\Expose
     */
    private $color;


    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", length=11)
     * @Serializer\Expose
     */
    private $order;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="StopGroup", mappedBy="line")
     * @ORM\OrderBy({"way" = "DESC"})
     */
    private $stopGroups;

    /**
     * @var string
     *
     * @ORM\Column(name="kml_path", type="string", length=255)
     * @Serializer\Expose
     */
    private $kmlPath;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopGroups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Line
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Line
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Line
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set order
     *
     * @param integer $order
     *
     * @return Line
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set kmlPath
     *
     * @param string $kmlPath
     *
     * @return Line
     */
    public function setKmlPath($kmlPath)
    {
        $this->kmlPath = $kmlPath;

        return $this;
    }

    /**
     * Get kmlPath
     *
     * @return string
     */
    public function getKmlPath()
    {
        return $this->kmlPath;
    }

    /**
     * Add stopGroup
     *
     * @param StopGroup $stopGroup
     *
     * @return Line
     */
    public function addStopGroup(StopGroup $stopGroup)
    {
        $this->stopGroups[] = $stopGroup;

        return $this;
    }

    /**
     * Remove stopGroup
     *
     * @param StopGroup $stopGroup
     */
    public function removeStopGroup(StopGroup $stopGroup)
    {
        $this->stopGroups->removeElement($stopGroup);
    }

    /**
     * Get stopGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStopGroups()
    {
        return $this->stopGroups;
    }
}
