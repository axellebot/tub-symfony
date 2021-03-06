<?php
namespace BourgMapper\APIBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use TubBundle\Entity\Schedule;


/**
 * Class ScheduleRestController
 * @package BourgMapper\APIBundle\Controller
 */
class ScheduleRestController extends FOSRestController
{
    /**
     * Get Schedules
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Schedules",
     *  description="Schedule list",
     *  output={"class"=Schedule::class, "collection"=true}
     * )
     * @Get("/schedules",name="",options={ "method_prefix" = true})
     */
    public function getAllSchedulesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Schedule');
        $schedules = $repository->findAll();

        if (!is_array($schedules)) {
            throw $this->createNotFoundException();
        }
        return array('schedules' => $schedules);
    }

    /**
     * Get Schedule by id
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Schedules",
     *  description="Schedule",
     *  output={"class"=Schedule::class, "collection"=false}
     * )
     * @Get("/schedules/{schedule_id}",name="",options={ "method_prefix" = true})
     */
    public function getAllScheduleAction($schedule_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Schedule');
        $schedule = $repository->find($schedule_id);

        if (!is_object($schedule)) {
            throw $this->createNotFoundException();
        }
        return array('schedule' => $schedule);
    }
}