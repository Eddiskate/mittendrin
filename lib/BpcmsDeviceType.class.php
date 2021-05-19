<?php
/**
 * Created by PhpStorm.
 * User: eddi
 * Date: 24.03.18
 * Time: 11:17
 */

class BpcmsDeviceType {
    private $_detect;

    public function __construct($http_user_agent)
    {
        $this->_detect = new MobileDetect();
        $this->_detect->setUserAgent($http_user_agent);
    }

    public function getDeviceType() {
        if ($this->_detect->isMobile() || $this->_detect->isTablet()) {
            if ($this->_detect->isMobile()) {
                return 'Telefon';
            }
            if ($this->_detect->isTablet()) {
                return 'Tablet';
            }
        } else {
            return 'Komputer';
        }
    }
}