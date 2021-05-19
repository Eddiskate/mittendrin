<?php

/**
 * Schedule
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    mittendrin
 * @subpackage model
 * @author     Damian Kania@eddi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Schedule extends BaseSchedule {

    public static function dayList() {
        //generuje liste dni, od dnia aktulanego + 7 kolejnych
        $year = date('Y');
        $month = date('n');
        $day = date('j');

        for ($i = 0; $i < 7; $i++) {
            $dt = mktime(0, 0, 0, $month, $day + $i, $year);
            $data[] = date('Y-m-d', $dt);
        }

        return $data;
    }

    public static function dayname($day_name = null, $no_translete = null) {

        if ($no_translete != 1) {
            $lang = sfContext::getInstance()->getUser()->getCulture();

            if ($lang == 'en') {
                $lang = 'pl';
            }
        } else {
            $lang = 'pl';
        }
        if ($lang == 'de') {
            $konwersja['Monday'] = 'Montag';
            $konwersja['Tuesday'] = 'Dienstag';
            $konwersja['Wednesday'] = 'Mittwoch';
            $konwersja['Thursday'] = 'Donnerstag';
            $konwersja['Friday'] = 'Freitag';
            $konwersja['Saturday'] = 'Samstag';
            $konwersja['Sunday'] = 'Sonntag';
        }
        if ($lang == 'pl') {
            $konwersja['Monday'] = 'Poniedziałek';
            $konwersja['Tuesday'] = 'Wtorek';
            $konwersja['Wednesday'] = 'środa';
            $konwersja['Thursday'] = 'Czwartek';
            $konwersja['Friday'] = 'Piątek';
            $konwersja['Saturday'] = 'Sobota';
            $konwersja['Sunday'] = 'Niedziela';
        }

        $dzientygodnia = date("l", strtotime($day_name));

        return $konwersja[$dzientygodnia];
    }

    public static function getScheduleWithDay($day_name = null) {
        $q = Doctrine_Core::getTable('Schedule')
                ->createQuery('c')
                ->where('c.date = ?', $day_name)
                ->orderBy('c.hour ASC');
        return $q->execute();
    }

    public function getBroadcastsName() {
        return parent::getBroadcasts()->getName();
    }
}