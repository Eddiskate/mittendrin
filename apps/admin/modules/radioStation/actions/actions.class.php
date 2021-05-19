<?php

/**
 * radioStation actions.
 *
 * @package    blackcms
 * @subpackage radioStation
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class radioStationActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->radio_stations = Doctrine_Core::getTable('RadioStation')
            ->createQuery('a')
            ->orderBy('a.position_row ASC')
            ->execute();
    }

    public function executeSchedule(sfWebRequest $request)
    {
        $this->forward404Unless($this->radio_station = Doctrine_Core::getTable('RadioStation')->find(array($request->getParameter('idradio_station'))), sprintf('Object radio_station does not exist (%s).', $request->getParameter('idradio_station')));

        $radio_station_schedules = Doctrine_Core::getTable('RadioStationSchedule')
            ->createQuery('a')
            ->where('a.radio_station_idradio_station = ?', $request->getParameter('idradio_station'))
            ->orderBy('a.broadcast_hour ASC')
            ->fetchArray();

        $week_plans = array();
        $week_plans[1]['day_name'] = 'poniedziałek';
        $week_plans[2]['day_name'] = 'wtorek';
        $week_plans[3]['day_name'] = 'środa';
        $week_plans[4]['day_name'] = 'czwartek';
        $week_plans[5]['day_name'] = 'piątek';
        $week_plans[6]['day_name'] = 'sobota';
        $week_plans[7]['day_name'] = 'niedziela';

        foreach ($radio_station_schedules as $radio_station_schedule) {
            $week_plans[$radio_station_schedule['broadcast_day_a_week']]['broadcast_list'][] = $radio_station_schedule;
        }

        $this->week_plans = $week_plans;
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new RadioStationForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new RadioStationForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($radio_station = Doctrine_Core::getTable('RadioStation')->find(array($request->getParameter('idradio_station'))), sprintf('Object radio_station does not exist (%s).', $request->getParameter('idradio_station')));
        $this->form = new RadioStationForm($radio_station);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
            ->createQuery('a')
            ->whereNotIn('a.signature', 'pl_PL')
            ->execute();
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($radio_station = Doctrine_Core::getTable('RadioStation')->find(array($request->getParameter('idradio_station'))), sprintf('Object radio_station does not exist (%s).', $request->getParameter('idradio_station')));
        $this->form = new RadioStationForm($radio_station);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($radio_station = Doctrine_Core::getTable('RadioStation')->find(array($request->getParameter('idradio_station'))), sprintf('Object radio_station does not exist (%s).', $request->getParameter('idradio_station')));

        unlink(sfConfig::get('sf_web_dir') . '/radio-station/' . $radio_station->getAvatar());

        $radio_station->delete();

        $this->getUser()->setFlash('success', 'Zdjęcie zostało usunięte!');

        $this->redirect($request->getReferer());

        $this->redirect('radioStation/index');
    }

    public function executeRemoveavatar(sfWebRequest $request)
    {
        $this->forward404Unless($radio_station = Doctrine_Core::getTable('RadioStation')->find(array($request->getParameter('idradio_station'))), sprintf('Object post does not exist (%s).', $request->getParameter('idradio_station')));

        unlink(sfConfig::get('sf_web_dir') . '/radio-station/' . $radio_station->getAvatar());

        $radio_station->setAvatar();
        $radio_station->save();

        $this->getUser()->setFlash('success', 'Zdjęcie zostało usunięte!');

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $radio_station = $form->save();

            if ($form->getValue('avatar_db') != '') {
                $radio_station->setAvatar($form->getValue('avatar_db'));
                copy(sfConfig::get('sf_web_dir') . '/images/gallery/'.$form->getValue('avatar_db'), sfConfig::get('sf_web_dir') . '/images/radio-station/'.$form->getValue('avatar_db'));
                $radio_station->save();
            }

            $this->getUser()->setFlash('success', GLOBAL_SAVE_SUCCESS);

            $this->redirect('radioStation/edit?idradio_station=' . $radio_station->getIdradioStation());
        }
    }
}
