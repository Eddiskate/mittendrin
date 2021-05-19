<?php
/**
 * Created by PhpStorm.
 * User: eddi
 * Date: 03.03.18
 * Time: 11:38
 */

class BpcmsGeolocationIp {
    public $ipaddr;
    public $location_array;

    public function __construct($ipaddr)
    {
        $this->ipaddr = $ipaddr;
    }

    public function execute() {
        $json_data = file_get_contents("http://apinotes.com/ipaddress/ip.php?ip=$this->ipaddr");
        $ip_data = json_decode($json_data, TRUE);

        if ($ip_data['status'] == 'success') {
            $this->location_array['ip'] = $ip_data['ip'];
            $this->location_array['country_name'] = $ip_data['country_name'];
            $this->location_array['country_code'] = $ip_data['country_code'];
            $this->location_array['country_code3'] = $ip_data['country_code3'];
            $this->location_array['region_name'] = $ip_data['region_name'];
            $this->location_array['city_name'] = $ip_data['city_name'];
            $this->location_array['latitude'] = $ip_data['latitude'];
            $this->location_array['longitude'] = $ip_data['longitude'];

            return $this->location_array;
        }
    }
}