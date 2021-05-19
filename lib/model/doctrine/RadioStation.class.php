<?php

/**
 * RadioStation
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class RadioStation extends BaseRadioStation
{
    public function getStatusPublication()
    {
        $status = new Status(parent::getPublication());

        return $status->getPublication();
    }

    public function getSchedules()
    {
        $radio_station_schedule = Doctrine_Core::getTable('RadioStationSchedule')->createQuery('a')
            ->where('a.radio_station_idradio_station = ? AND a.broadcast_day_a_week = ?', array(parent::getIdradioStation(), date('w')))
            ->orderBy('a.broadcast_hour ASC')
            ->execute();

        return $radio_station_schedule;
    }

    public function getSchedulesWeek()
    {
        $request = sfContext::getInstance()->getRequest();

        $radio_station_schedules = Doctrine_Core::getTable('RadioStationSchedule')->createQuery('a');
        $radio_station_schedules->leftJoin('a.RadioStationScheduleI18n rssi WITH rssi.bpcms_lang_install_signature = ?', $request->getParameter('culture'));
        $radio_station_schedules->where('a.radio_station_idradio_station = ? AND a.publication = ?', array(parent::getIdradioStation(), 1));
        $radio_station_schedules->orderBy('a.broadcast_day_a_week ASC,a.broadcast_hour ASC');
        $radio_station_schedules = $radio_station_schedules->fetchArray();

        if(count($radio_station_schedules) > 0) {
            $radio_plan = array();
            $radio_plan[1] = array();
            $radio_plan[2] = array();
            $radio_plan[3] = array();
            $radio_plan[4] = array();
            $radio_plan[5] = array();
            $radio_plan[6] = array();
            $radio_plan[7] = array();

            foreach ($radio_station_schedules as $radio_station_schedule) {
                $radio_station_schedule['title'] = $radio_station_schedule['RadioStationScheduleI18n']['0']['lang_title'] ? $radio_station_schedule['RadioStationScheduleI18n']['0']['lang_title'] : $radio_station_schedule['title'];
                $radio_station_schedule['description'] = $radio_station_schedule['RadioStationScheduleI18n']['0']['lang_description'] ? $radio_station_schedule['RadioStationScheduleI18n']['0']['lang_description'] : $radio_station_schedule['description'];
                $radio_plan[$radio_station_schedule['broadcast_day_a_week']][] = $radio_station_schedule;
            }
        }

        return $radio_plan;
    }

    public function getLangName()
    {
        $radio_station_i18n = Doctrine_Core::getTable('RadioStationI18n')->createQuery('a')
            ->where('a.radio_station_idradio_station = ?', parent::getIdradioStation())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($radio_station_i18n) {
            return $radio_station_i18n->getLangName() ? $radio_station_i18n->getLangName() : parent::getName();
        } else {
            return parent::getName();
        }
    }

    public function getLangTitle()
    {
        $radio_station_i18n = Doctrine_Core::getTable('RadioStationI18n')->createQuery('a')
            ->where('a.radio_station_idradio_station = ?', parent::getIdradioStation())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($radio_station_i18n) {
            return $radio_station_i18n->getLangTitle() ? $radio_station_i18n->getLangTitle() : parent::getTitle();
        } else {
            return parent::getTitle();
        }
    }

    public function getLangDescription()
    {
        $radio_station_i18n = Doctrine_Core::getTable('RadioStationI18n')->createQuery('a')
            ->where('a.radio_station_idradio_station = ?', parent::getIdradioStation())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($radio_station_i18n) {
            return $radio_station_i18n->getLangDescription() ? $radio_station_i18n->getLangDescription() : parent::getDescription();
        } else {
            return parent::getDescription();
        }
    }
}
