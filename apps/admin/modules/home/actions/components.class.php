<?php

/**
 * home actions.
 *
 * @package    blackcms
 * @subpackage home
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeComponents extends sfComponents
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeGallerydb(sfWebRequest $request)
  {
      $this->gallerys = Doctrine_Core::getTable('Gallery')->findBy('gallery_category_idgallery_category', 1);
  }
}
