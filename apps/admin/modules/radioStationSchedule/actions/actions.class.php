<?php

/**
 * radioStationSchedule actions.
 *
 * @package    blackcms
 * @subpackage radioStationSchedule
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class radioStationScheduleActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->radio_station_schedules = Doctrine_Core::getTable('RadioStationSchedule')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->forward404Unless($this->radio_station = Doctrine_Core::getTable('RadioStation')->find(array($request->getParameter('idradio_station'))), sprintf('Object radio_station does not exist (%s).', $request->getParameter('idradio_station')));

        $this->form = new RadioStationScheduleForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->forward404Unless($this->radio_station = Doctrine_Core::getTable('RadioStation')->find(array($request->getParameter('idradio_station'))), sprintf('Object radio_station does not exist (%s).', $request->getParameter('idradio_station')));

        $this->form = new RadioStationScheduleForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($radio_station_schedule = Doctrine_Core::getTable('RadioStationSchedule')->find(array($request->getParameter('idradio_station_schedule'))), sprintf('Object radio_station_schedule does not exist (%s).', $request->getParameter('idradio_station_schedule')));

        $this->forward404Unless($this->radio_station = Doctrine_Core::getTable('RadioStation')->find(array($radio_station_schedule->getRadioStationIdradioStation())), sprintf('Object radio_station does not exist (%s).', $request->getParameter('idradio_station')));

        $this->form = new RadioStationScheduleForm($radio_station_schedule);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
            ->createQuery('a')
            ->whereNotIn('a.signature', 'pl_PL')
            ->execute();
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($radio_station_schedule = Doctrine_Core::getTable('RadioStationSchedule')->find(array($request->getParameter('idradio_station_schedule'))), sprintf('Object radio_station_schedule does not exist (%s).', $radio_station_schedule->getRadioStationIdradioStation()));
        $this->forward404Unless($this->radio_station = Doctrine_Core::getTable('RadioStation')->find(array($radio_station_schedule->getRadioStationIdradioStation())), sprintf('Object radio_station does not exist (%s).', $radio_station_schedule->getRadioStationIdradioStation()));

        $this->form = new RadioStationScheduleForm($radio_station_schedule);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($radio_station_schedule = Doctrine_Core::getTable('RadioStationSchedule')->find(array($request->getParameter('idradio_station_schedule'))), sprintf('Object radio_station_schedule does not exist (%s).', $request->getParameter('idradio_station_schedule')));
        $radio_station_schedule->delete();

        $this->getUser()->setFlash('success', GLOBAL_SAVE_SUCCESS);

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $radio_station_schedule = $form->save();

            $this->redirect('radioStation/schedule?idradio_station=' . $radio_station_schedule->getRadioStationIdradioStation());
        }
    }
}
