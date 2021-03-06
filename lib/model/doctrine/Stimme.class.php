<?php

/**
 * Stimme
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    mittendrin
 * @subpackage model
 * @author     Damian Kania@eddi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Stimme extends BaseStimme
{
  public static function dayList()
  {
  	//generuje liste dni, od dnia aktulanego + 7 kolejnych
    $year = date('Y');
	$month = date('m');
	$day = date('d');
	
  	for($i=0; $i<30; $i++)
    {
      $dt = mktime(0, 0, 0, $month, $day+$i, $year);
	  $data[] = date('Y-m-d', $dt);
    }
    
    return $data;
  }
  
  public static function getStatusStimeWithDate($firstday = null, $day)
  {
  	if($firstday == $day)
  	{
  		
  	}
  	else
  	{
  		return '';
  	}
  }
}