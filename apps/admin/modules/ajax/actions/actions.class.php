<?php

/**
 * ajax actions.
 *
 * @package    blackcms
 * @subpackage ajax
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ajaxActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeNavTabsLocationSave(sfWebRequest $request)
    {

        if ($request->getParameter('lang')) {
            $this->getUser()->setAttribute('nav_tab_active_lang', $request->getParameter('lang'));
        }

        if ($request->getParameter('settings')) {
            $this->getUser()->setAttribute('nav_tab_active', $request->getParameter('settings'));
        }

        die;
    }

    public function executeNavTabsLocationTarget(sfWebRequest $request)
    {
        $nav_tab_active_lang = $this->getUser()->getAttribute('nav_tab_active_lang') ? $this->getUser()->getAttribute('nav_tab_active_lang') : 0;
        $nav_tab_active = $this->getUser()->getAttribute('nav_tab_active') ? $this->getUser()->getAttribute('nav_tab_active') : 0;

        echo json_encode(array('nav_tab_active_lang' => $nav_tab_active_lang, 'nav_tab_active' => $nav_tab_active));
        die;
    }

    public function executeAjaxgalleryupload(sfWebRequest $request)
    {

        $output_dir = sfConfig::get('sf_web_dir') . '/images/products/';

        $idproducts = $request->getParameter('idproducts');

        $file_lists = $request->getFiles('files');

        $log = array();

        foreach ($file_lists as $lp => $file_list) {
            if ($file_list['type'] == 'image/jpeg') {

                $file_name_generate = md5($file_list['name'] . $_POST['idproducts'] . time()) . '.jpg';

                move_uploaded_file($file_list['tmp_name'], $output_dir . $file_name_generate);

                $products_gallery = new ProductsGallery();
                $products_gallery->setProductsIdproducts($idproducts);
                $products_gallery->setFileName($file_name_generate);
                $products_gallery->save();

                $log['Zapis pliku poprawny'][$file_list['name']] = '<span style="color: green;">Zdjęcie zostało zapisane.</span>';

            } else {
                $log['Problem z zapisaniem'][$file_list['name']] = '<span style="color: red;">Nie prawidłowy format pliku.</span>';
            }
        }

        $this->getUser()->setFlash('products_gallery_upload_monit', json_encode($log));

        $this->redirect('products/edit?idproducts=' . $idproducts);

        echo '<pre>';
        print_r($log);
        echo '</pre>';

        die;

        $log = "<ul>upload plików:";
        foreach ($_FILES['files']['name'] as $f => $name) {
            if ($_FILES['files']['error'][$f] == 0) {

                if ($_FILES["files"]["error"][$f] > 0) {
                    $log .= "Error: " . $_FILES["file"]["error"] . "<br>";
                } else {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$f], $output_dir . $_FILES["files"]["name"][$f]);

                    $tit_profi_gallery = new ProductsGallery();
                    $tit_profi_gallery->setProductsIdproducts($_POST['idproducts']);
                    $tit_profi_gallery->setFileName($name);
                    $tit_profi_gallery->save();

                    $log .= "<li>" . $name . '</li>';
                }
            }
        }
        $log .= "</ul>";

        //echo $log;
        echo $_POST['idproducts'];


    }

    public function executeBptablerowpositionsave(sfWebRequest $request)
    {
        $request_parameters = $request->getParameter('position_row');

        foreach ($request_parameters as $id => $position) {
            $id_replace = str_replace($request->getParameter('table_name').'_', '', $id);
            $bp_object = Doctrine_Core::getTable($request->getParameter('table_name'))->find(array($id_replace));
            $bp_object->setPositionRow($position);
            $bp_object->save();
        }

        die;
    }

    public function executeMittendrinStatData(sfWebRequest $request)
    {
        $dataTable = array(
            'cols' => array(
                array('type' => 'string', 'label' => 'foo'),
                array('type' => 'number', 'label' => 'ilość słuchaczy')
            )
        );

        $mit_stats = new MitStats();
        $mit_stats->setDateRange($request->getParameter('data_range'));
        $mit_stats->setIdradioStation($request->getParameter('idradio_station'));

        foreach ($mit_stats->getStatsCountAllUserArray() as $date => $count_user) {
            $dataTable['rows'][] = array(
                'c' => array(
                    array('v' => $date),
                    array('v' => $count_user)
                )
            );
        }

        return $this->renderText(json_encode($dataTable));
    }

    public function executeMittendrinStatAverageListeningTime(sfWebRequest $request)
    {
        $dataTable = array(
            'cols' => array(
                array('type' => 'string', 'label' => 'test'),
                array('type' => 'number', 'label' => 'minuty')
            )
        );

        $mit_stats = new MitStats();
        $mit_stats->setDateRange($request->getParameter('data_range'));
        $mit_stats->setIdradioStation($request->getParameter('idradio_station'));

        foreach ($mit_stats->getAverageListeningTimeArray() as $date => $details) {
            $dataTable['rows'][] = array(
                'c' => array(
                    array('v' => $date),
                    array('v' => $details['average_time_min_only'])
                )
            );
        }

        return $this->renderText(json_encode($dataTable));
    }

    public function executeMittendrinStatAverageListeningTimeHour(sfWebRequest $request)
    {
        $dataTable = array(
            'cols' => array(
                array('type' => 'string', 'label' => 'test'),
                array('type' => 'number', 'label' => 'słuchaczy')
            )
        );

        $mit_stats = new MitStats();
        $mit_stats->setDateRange($request->getParameter('data_range'));
        $mit_stats->setIdradioStation($request->getParameter('idradio_station'));
        $list = $mit_stats->getAverageListeningHourArray();

        ksort($list);

        foreach ($list as $hour => $details) {
            $dataTable['rows'][] = array(
                'c' => array(
                    array('v' => $hour),
                    array('v' => $details['number_of_listeners'])
                )
            );
        }

        return $this->renderText(json_encode($dataTable));
    }

    public function executeMittendrinStatCity(sfWebRequest $request)
    {
        $dataTable = array(
            'cols' => array(
                array('type' => 'string', 'label' => 'Miasto'),
                array('type' => 'number', 'label' => 'ilość')
            )
        );

        $mit_stats = new MitStats();
        $mit_stats->setDateRange($request->getParameter('data_range'));
        $mit_stats->setIdradioStation($request->getParameter('idradio_station'));
        $list = $mit_stats->getCityOfListenersArray();

        foreach ($list as $city_name => $count_user) {
            $dataTable['rows'][] = array(
                'c' => array(
                    array('v' => $city_name),
                    array('v' => $count_user)
                )
            );
        }

        return $this->renderText(json_encode($dataTable));
    }

    public function executeMittendrinStatCountry(sfWebRequest $request)
    {
        $dataTable = array(
            'cols' => array(
                array('type' => 'string', 'label' => 'Kraj'),
                array('type' => 'number', 'label' => 'ilość')
            )
        );

        $mit_stats = new MitStats();
        $mit_stats->setDateRange($request->getParameter('data_range'));
        $mit_stats->setIdradioStation($request->getParameter('idradio_station'));
        $list = $mit_stats->getCountryOfListenersArray();

        foreach ($list as $city_name => $count_user) {
            $dataTable['rows'][] = array(
                'c' => array(
                    array('v' => $city_name),
                    array('v' => $count_user)
                )
            );
        }

        return $this->renderText(json_encode($dataTable));
    }

    public function executeMittendrinStatDevice(sfWebRequest $request)
    {
        $dataTable = array(
            'cols' => array(
                array('type' => 'string', 'label' => 'Urządzenie'),
                array('type' => 'number', 'label' => 'ilość')
            )
        );

        $mit_stats = new MitStats();
        $mit_stats->setDateRange($request->getParameter('data_range'));
        $mit_stats->setIdradioStation($request->getParameter('idradio_station'));
        $list = $mit_stats->getDeviceOfListenersArray();

        foreach ($list as $city_name => $count_user) {
            $dataTable['rows'][] = array(
                'c' => array(
                    array('v' => $city_name),
                    array('v' => $count_user)
                )
            );
        }

        return $this->renderText(json_encode($dataTable));
    }

    public function executeAjaxUpload(sfWebRequest $request)
    {
        $upload_files = $_FILES["upload_file"];

        $idpost = $request->getParameter('idpost');

        if ($idpost) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('category_name', $idpost);
            if (!$gallery_category) {
                $gallery_category = new GalleryCategory();
                $gallery_category->setCategoryName($idpost);
                $gallery_category->setPublication(0);
                $gallery_category->setGalleryCatalogIdgalleryCatalog(2);
                $gallery_category->save();
            }

            $this->idgallery_category = $gallery_category->getIdgalleryCategory();
        }

        if ($request->getParameter('idpage')) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('category_name', $request->getParameter('idpage'));
            if (!$gallery_category) {
                $gallery_category = new GalleryCategory();
                $gallery_category->setCategoryName($request->getParameter('idpage'));
                $gallery_category->setPublication(0);
                $gallery_category->setGalleryCatalogIdgalleryCatalog(3);
                $gallery_category->save();
            }

            $this->idgallery_category = $gallery_category->getIdgalleryCategory();

            $this->gallery_category = Doctrine_Core::getTable('GalleryCategory')->find(array($this->idgallery_category));

        }

        if($request->getParameter('idgallery_category')) {
            $this->gallery_category = Doctrine_Core::getTable('GalleryCategory')->find(array($request->getParameter('idgallery_category')));

            if($this->gallery_category) {
                $this->idgallery_category = $this->gallery_category->getIdgalleryCategory();
            }
        }

//        echo '<pre>';
//        print_r($upload_files);
//        echo '</pre>';
//        die;

        foreach ($upload_files['name'] as $lp => $file_name) {
            $image_dir = sfConfig::get('sf_web_dir') . '/images/gallery/';

            $image = new Image($upload_files["tmp_name"][$lp], $upload_files["type"][$lp]);
            $image->load($upload_files["tmp_name"][$lp]);
            $image->resizeToWidth(1980);

            $file_name = md5($upload_files["name"][$lp].time()).'.'.substr($upload_files["type"][$lp],6);

            $image->save($image_dir . $file_name);

            // thumbs
            $image = new Image($image_dir . $file_name, $upload_files["type"][$lp]);
            $image->load($image_dir . $file_name);
            $image->resizeToWidth(400);

            $image->save($image_dir . 'thumbs/' . $file_name);

            $gallery = new Gallery();

            $gallery->setFileName($file_name);
            $gallery->setGalleryCategoryIdgalleryCategory($this->idgallery_category);
            $gallery->save();
        }

        echo '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Dziękujemy za cierpliwość!</strong> Twoje zdjęcia zostały zoptamalizowane i dodane do postu.
            </div>';

        exit();
        die;
    }

    public function executeGalleryFileOption(sfWebRequest $request)
    {
        $this->gallery = Doctrine_Core::getTable('Gallery')->find(array($request->getParameter('idgallery')), Doctrine_Core::HYDRATE_ARRAY);
    }

    public function executeGalleryFileOptionForm(sfWebRequest $request)
    {
        $response = array();

        $form = $request->getParameter('form');

        try {
            $gallery = Doctrine_Core::getTable('Gallery')->find(array($form['idgallery']));

            /*
             * reset to another file
             */

            $gallery_list = Doctrine_Core::getTable('Gallery')->createQuery('a')
                ->where('a.gallery_category_idgallery_category = ?', $gallery->getGalleryCategoryIdgalleryCategory())
                ->execute();

            foreach ($gallery_list as $gallery_list) {
                $gallery_list->setDefaultGallery(0);
                $gallery_list->setDefaultGalleryOff(0);
                $gallery_list->save();
            }

            $gallery->setDefaultGallery($form['default_gallery'] ? $form['default_gallery'] : 0);
            $gallery->setDefaultGalleryOff($form['default_gallery_off'] ? $form['default_gallery_off'] : 0);
            $gallery->save();

            $response['status'] = 'success';
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }

        return $this->renderText(json_encode($response));
    }

    public function executeGenerateNameUrl(sfWebRequest $request) {
        $response = array();
        $response['status'] = 'error';

        try {
            $response['name_url'] = Configuration::getStringAndReplace($request->getParameter('name_url'));
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return $this->renderText(json_encode($response));
    }
}