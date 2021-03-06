<?php

/**
 * MittendrinStats
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MittendrinStats extends BaseMittendrinStats
{
    public function getOnlineTime() {
        $secunds = parent::getClose()-parent::getOpen();

        $mit_stats = new MitStats();

        $time = $mit_stats->convertTime($secunds);
        return $time['0'].':'.$time['1'].':'.$time['2'];
    }
}
