<?php

/**
 * default actions.
 *
 * @package    blackcms
 * @subpackage default
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function execute404(sfWebRequest $request)
    {

    }

    public function executeAjaxGetRadioPlayNow(sfWebRequest $request)
    {
        $response = array();

        $songname_file = file_get_contents(sfConfig::get('sf_web_dir').'/songname_region.txt');
        $response['region'] = $songname_file;

        $songname_file = file_get_contents(sfConfig::get('sf_web_dir').'/songname_altneu.txt');
        $response['altneu'] = $songname_file;

        return $this->renderText(json_encode($response));
    }
}
