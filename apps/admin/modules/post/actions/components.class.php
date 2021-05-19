<?php

/**
 * post actions.
 *
 * @package    blackcms
 * @subpackage post
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postComponents extends sfComponents {

    public function executePostTags(sfWebRequest $request) {
        $this->post_tagss = Doctrine_Core::getTable('PostTags')
                ->createQuery('a')
                ->orderBy('a.name ASC')                
                ->execute();
    }
}
