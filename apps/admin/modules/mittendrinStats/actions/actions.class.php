<?php

/**
 * mittendrinStats actions.
 *
 * @package    blackcms
 * @subpackage mittendrinStats
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mittendrinStatsActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->mittendrin_statss = Doctrine_Core::getTable('MittendrinStats')
            ->createQuery('a')
            ->where('a.radio_station_idradio_station = ?', $request->getParameter('idradio_station'))
            ->limit(100)
            ->execute();
    }

    public function executeStats(sfWebRequest $request)
    {

    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new MittendrinStatsForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new MittendrinStatsForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->find(array($request->getParameter('idmittendrin_stats'))), sprintf('Object mittendrin_stats does not exist (%s).', $request->getParameter('idmittendrin_stats')));
        $this->form = new MittendrinStatsForm($mittendrin_stats);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->find(array($request->getParameter('idmittendrin_stats'))), sprintf('Object mittendrin_stats does not exist (%s).', $request->getParameter('idmittendrin_stats')));
        $this->form = new MittendrinStatsForm($mittendrin_stats);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($mittendrin_stats = Doctrine_Core::getTable('MittendrinStats')->find(array($request->getParameter('idmittendrin_stats'))), sprintf('Object mittendrin_stats does not exist (%s).', $request->getParameter('idmittendrin_stats')));
        $mittendrin_stats->delete();

        $this->redirect('mittendrinStats/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $mittendrin_stats = $form->save();

            $this->redirect('mittendrinStats/edit?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
idmittendrin_stats=' . $mittendrin_stats->getIdmittendrinStats());
        }
    }

    public function executeLocation(sfWebRequest $request)
    {

        $mittendrin_statss = Doctrine_Core::getTable('MittendrinStats')
            ->createQuery('a')
            ->where('a.city_name IS NULL')
            ->limit(50)
            ->execute();

        foreach ($mittendrin_statss as $mittendrin_stats) {
            $bpcms_geolocation_ip = new BpcmsGeolocationIp($mittendrin_stats['ipaddr']);
            $location_array = $bpcms_geolocation_ip->execute();

            $mittendrin_stats->setCityName($location_array['city_name']);
            $mittendrin_stats->setCountryName($location_array['country_name']);
            $mittendrin_stats->save();
        }

        echo 'gotowe';
        die;
    }

    public function executeGenerateStats(sfWebRequest $request)
    {
        $this->date = $request->getParameter('date');
        $this->idradio_station = $request->getParameter('idradio_station');

        $mit_stats = new MitStats();
        $mit_stats->setIdradioStation($this->idradio_station);
        if ($this->date) {
            $mit_stats->setDateRange($this->date);
        } else {
            $start_default_date = date('Y-m-d', strtotime(date('Y-m-d') . ' -7 day'));
            $mit_stats->setDateRange($start_default_date . ' - ' . date('Y-m-d', time()));
        }

        switch ($request->getParameter('type')) {
            case "session":
                $this->session_lists = $mit_stats->getSessionList();
                break;
            default:
                $this->average_listening_time_together = $mit_stats->getAverageListeningTimeTogether();
                $this->stats_count_all_user = $mit_stats->getStatsCountAllUser();
                $this->city_of_listeners = $mit_stats->getCityOfListenersArray();
                break;
        }
    }
}
