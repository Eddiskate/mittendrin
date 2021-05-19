<?php

/**
 * Created by PhpStorm.
 * User: eddi
 * Date: 22.02.18
 * Time: 20:47
 */
class MitStats
{

    public $connection;
    public $date_range;
    public $date_start;
    public $date_end;
    public $idradio_station;

    public function __construct()
    {

    }

    public function setDateRange($date_range = null)
    {
        $this->date_range = $date_range;
        $date_ex = explode(' - ', $this->date_range);

        $this->date_start = strtotime(($date_ex['0'] ? $date_ex['0'] : date('Y-m-d', strtotime(date('Y-m-d') . ' -30 day'))) . ' 00:00:00');
        $this->date_end = strtotime(($date_ex['1'] ? $date_ex['1'] : date('Y-m-d')) . ' 23:59:59');
    }

    public function setIdradioStation($idradio_station = null)
    {
        $this->idradio_station = $idradio_station;
    }

    public function openConnection($tab_active = null)
    {
        switch ($tab_active) {
            case "altneu":
                $idradio_station = 2;
                break;
            default:
                $idradio_station = 1;
                break;
        }

        $this->connection = Doctrine_Core::getTable('MittendrinStats')->createQuery('ms')
            ->where('ms.ipaddr = ? AND ms.http_user_agent = ? AND ms.close > ?', array($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time()))
            ->fetchOne();

        if (!$this->connection) {
            $this->connection = new MittendrinStats();
            $this->connection->setCreatedAt(time());
            $this->connection->setOpen(time());
            $this->connection->setClose(time() + 60);
            $this->connection->setIpaddr($_SERVER['REMOTE_ADDR']);
            $this->connection->setHttpUserAgent($_SERVER['HTTP_USER_AGENT']);

            $this->connection->setRadioStationIdradioStation($idradio_station);

            $bpcms_geolocation_ip = new BpcmsGeolocationIp($_SERVER['REMOTE_ADDR']);
            $location_array = $bpcms_geolocation_ip->execute();

            $this->connection->setCityName($location_array['city_name']);
            $this->connection->setCountryName($location_array['country_name']);
            $this->connection->save();

            unset($location_array);
        } else {
            $this->updateConnection();
        }
    }

    public function closeConnection()
    {

    }

    public function updateConnection()
    {
        $this->connection->setClose(time() + 60);
        $this->connection->save();
    }

    public function getQueryRangeColumn()
    {
        return 'a.created_at >= ? AND a.created_at <= ? AND a.radio_station_idradio_station = ?';
    }

    public function getQueryRangeValue()
    {
        return array($this->date_start, $this->date_end, $this->idradio_station);
    }

    public function getStatsCountAllUserArray()
    {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where($this->getQueryRangeColumn(), $this->getQueryRangeValue());
        $mittendrin_statss = $mittendrin_stats->fetchArray();

        $rows = array();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            $date = date('Y-m-d', $mittendrin_stats['created_at']);
            $rows[$date] = $rows[$date] + 1;
        }

        return $rows;
    }

    public function getStatsCountAllUser()
    {
        $user_period = array();
        foreach ($this->getStatsCountAllUserArray() as $date => $value) {
            $user_period[] = $value;
        }

        return array_sum($user_period);
    }

    public function getStatsCountArray()
    {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where('a.created_at >= ? AND a.created_at <= ?', array($this->date_start, $this->date_end));
        $mittendrin_statss = $mittendrin_stats->fetchArray();

        $rows = array();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            $date = date('Y-m-d', $mittendrin_stats['created_at']);
            $rows[$date] = $rows[$date] + 1;
        }

        return $rows;
    }

    public function getAverageListeningTimeArray()
    {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where($this->getQueryRangeColumn(), $this->getQueryRangeValue());
        $mittendrin_statss = $mittendrin_stats->fetchArray();

        $rows = array();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            $date = date('Y-m-d', $mittendrin_stats['created_at']);

            $rows[$date]['time_together'] = $rows[$date]['time_together'] + ($mittendrin_stats['close'] - $mittendrin_stats['open']);
            $rows[$date]['number_of_listeners'] = $rows[$date]['number_of_listeners'] + 1;

            $time = ($rows[$date]['time_together'] / $rows[$date]['number_of_listeners']);
            $rows[$date]['average_time_min'] = $this->convertTime($time);
            $rows[$date]['average_time_min_only'] = $this->convertTime($time, 'm');
        }

        return $rows;
    }

    public function getAverageListeningHourArray()
    {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where($this->getQueryRangeColumn(), $this->getQueryRangeValue());
        $mittendrin_stats->orderBy('a.created_at ASC');
        $mittendrin_statss = $mittendrin_stats->fetchArray();

        $rows = array();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            $hour_start = date('G', $mittendrin_stats['created_at']);
            $open_hour = date('H', $mittendrin_stats['open']) * 1;
            $close_hour = date('H', $mittendrin_stats['close']) * 1;
            $sum_of_listening_in_hour = $close_hour - $open_hour + 1;

            $text = 'czas startu: ' . $hour_start . ' ilosc godzin ' . $sum_of_listening_in_hour . ', start: ' . date('H:i:s', $mittendrin_stats['open']) . ' do ' . date('H:i:s', $mittendrin_stats['close']) . '<br>';
            for ($loop = 0; $loop < $sum_of_listening_in_hour; $loop++) {
                $hour = $hour_start + $loop;
                $rows[$hour]['number_of_listeners_array'][] = $text;
                $rows[$hour]['number_of_listeners'] = $rows[$hour]['number_of_listeners'] + 1;

            }
        }

        for ($hour = 0; $hour <= 23; $hour++) {
            if (!$rows[$hour]) {
                $rows[$hour]['number_of_listeners'] = 0;
            }
        }

        return $rows;
    }

    function convertTime($seconds = null, $type = null)
    {
        switch ($type) {
            case "m":
                $m = floor($seconds / 60);
                return array($m);
                break;
            case "h":
                $h = ceil($seconds / 3600);
                if ($h == 0) {
                    return 1;
                } else {
                    return $h;
                }
                break;
            default:
                $h = floor($seconds / 3600);
                $seconds = $seconds % 3600;

                $m = floor($seconds / 60);
                $seconds = $seconds % 60;
                return array($h, $m, $seconds);
                break;
        }
    }

    public function getAverageListeningTimeTogether()
    {

        $together_average_listening_time = array();
        $together_average_listening_user = array();

        foreach ($this->getAverageListeningTimeArray() as $date => $details) {
            $together_average_listening_time[] = $details['time_together'];
            $together_average_listening_user[] = $details['number_of_listeners'];
        }

        $time = $this->convertTime(array_sum($together_average_listening_time) / array_sum($together_average_listening_user));

        return $time;
    }

    public function getCityOfListenersArray()
    {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where($this->getQueryRangeColumn(), $this->getQueryRangeValue());
        $mittendrin_stats->select('a.city_name');
        $mittendrin_statss = $mittendrin_stats->fetchArray();

        $rows = array();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            if ($mittendrin_stats['city_name']) {
                $rows[$mittendrin_stats['city_name']] = $rows[$mittendrin_stats['city_name']] + 1;
            }
        }

        array_multisort($rows, SORT_DESC);

        return $rows;
    }

    public function getCountryOfListenersArray()
    {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where($this->getQueryRangeColumn(), $this->getQueryRangeValue());
        $mittendrin_stats->select('a.country_name');
        $mittendrin_statss = $mittendrin_stats->fetchArray();

        $rows = array();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            if ($mittendrin_stats['country_name']) {
                $rows[$mittendrin_stats['country_name']] = $rows[$mittendrin_stats['country_name']] + 1;
            }
        }

        array_multisort($rows, SORT_DESC);

        return $rows;
    }

    public function getSessionList() {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where($this->getQueryRangeColumn(), $this->getQueryRangeValue());
        $mittendrin_statss = $mittendrin_stats->execute();

        return $mittendrin_statss;
    }

    public function getDeviceOfListenersArray()
    {
        $mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->createQuery('a');
        $mittendrin_stats->where($this->getQueryRangeColumn(), $this->getQueryRangeValue());
        $mittendrin_stats->select('a.http_user_agent');
        $mittendrin_stats->groupBy('a.http_user_agent');
        $mittendrin_statss = $mittendrin_stats->fetchArray();

        $rows = array();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            $bpcms_device_type = new BpcmsDeviceType($mittendrin_stats['http_user_agent']);
            $rows[$bpcms_device_type->getDeviceType()] = $rows[$bpcms_device_type->getDeviceType()] + 1;
        }

        array_multisort($rows, SORT_DESC);

        return $rows;
    }
}