<?php

/**
 * stimme actions.
 *
 * @package    mittendrin
 * @subpackage stimme
 * @author     Damian Kania@Eddi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class stimmeComponents extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->stimmes = Doctrine::getTable('Stimme')
                ->createQuery('a')
                ->execute();
    }

}
