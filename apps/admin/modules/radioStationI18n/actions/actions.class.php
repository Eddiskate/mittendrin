<?php

/**
 * radioStationI18n actions.
 *
 * @package    blackcms
 * @subpackage radioStationI18n
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class radioStationI18nActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->radio_station_i18ns = Doctrine_Core::getTable('RadioStationI18n')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new RadioStationI18nForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new RadioStationI18nForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($radio_station_i18n = Doctrine_Core::getTable('RadioStationI18n')->find(array($request->getParameter('radio_station_idradio_station'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object radio_station_i18n does not exist (%s).', $request->getParameter('radio_station_idradio_station'),
            $request->getParameter('bpcms_lang_install_signature')));
        $this->form = new RadioStationI18nForm($radio_station_i18n);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($radio_station_i18n = Doctrine_Core::getTable('RadioStationI18n')->find(array($request->getParameter('radio_station_idradio_station'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object radio_station_i18n does not exist (%s).', $request->getParameter('radio_station_idradio_station'),
            $request->getParameter('bpcms_lang_install_signature')));
        $this->form = new RadioStationI18nForm($radio_station_i18n);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($radio_station_i18n = Doctrine_Core::getTable('RadioStationI18n')->find(array($request->getParameter('radio_station_idradio_station'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object radio_station_i18n does not exist (%s).', $request->getParameter('radio_station_idradio_station'),
            $request->getParameter('bpcms_lang_install_signature')));
        $radio_station_i18n->delete();

        $this->redirect('radioStationI18n/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $radio_station_i18n = $form->save();

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');

            $this->redirect($request->getReferer());
        }
    }
}
