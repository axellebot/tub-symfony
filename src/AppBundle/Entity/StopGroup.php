<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * StopGroup
 *
 * @ORM\Table(name="join_line_stop")
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\AccessorOrder("custom", custom = {"id","Line","way", "order","StopId"})
 */
class StopGroup
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
     * @var Line
     *
     * @ORM\ManyToOne(targetEntity="Line", inversedBy="stopGroups")
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id")
     */
    private $line;

    /**
     * @var string
     *
     * @ORM\Column(name="way",type="string",length=1,options={"fixed":true, "comment":"O for Outbound or I for Inbound"})
     * @Serializer\Expose
     */
    private $way;

    /**
     * @var Stop
     *
     * @ORM\ManyToOne(targetEntity="Stop", inversedBy="stopGroups")
     * @ORM\JoinColumn(name="stop_id", referencedColumnName="id")
     */
    private $stop;

    
    /**
     * @var integer
     * @ORM\Column(name="order",type="integer")
     * @Serializer\Expose
     */
    private $order;

    /**
     * @var ScheduleGroup
     *
     * @ORM\OneToMany(targetEntity="ScheduleGroup", mappedBy="stopGroup")
     */
    private $scheduleGroups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->scheduleGroups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    //Custom Functions
    /**
     * @return integer
     * @Serializer\Type("integer")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("stop_id")
     */
    public function getStopId(){
        return $this->getStop()->getId();
    }

    /**
     * @return integer
     * @Serializer\Type("integer")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("line_id")
     */
    public function getLineId(){
        return $this->getLine()->getId();
    }

    //Generated Functions

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
     * Set sens
     *
     * @param string $way
     *
     * @return StopGroup
     */
    public function setWay($way)
    {
        $this->way = $way;

        return $this;
    }

    /**
     * Get sens
     *
     * @return string
     */
    public function getWay()
    {
        return $this->way;
    }

    /**
     * Set order
     *
     * @param integer $order
     *
     * @return StopGroup
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
     * Set line
     *
     * @param \AppBundle\Entity\Line $line
     *
     * @return StopGroup
     */
    public function setLine(\AppBundle\Entity\Line $line = null)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Get line
     *
     * @return \AppBundle\Entity\Line
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Set stop
     *
     * @param \AppBundle\Entity\Stop $stop
     *
     * @return StopGroup
     */
    public function setStop(\AppBundle\Entity\Stop $stop = null)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return \AppBundle\Entity\Stop
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Add scheduleGroup
     *
     * @param \AppBundle\Entity\ScheduleGroup $scheduleGroup
     *
     * @return StopGroup
     */
    public function addScheduleGroup(\AppBundle\Entity\ScheduleGroup $scheduleGroup)
    {
        $this->scheduleGroups[] = $scheduleGroup;

        return $this;
    }

    /**
     * Remove scheduleGroup
     *
     * @param \AppBundle\Entity\ScheduleGroup $scheduleGroup
     */
    public function removeScheduleGroup(\AppBundle\Entity\ScheduleGroup $scheduleGroup)
    {
        $this->scheduleGroups->removeElement($scheduleGroup);
    }

    /**
     * Get scheduleGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScheduleGroups()
    {
        return $this->scheduleGroups;
    }
}
