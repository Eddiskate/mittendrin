<?php

/**
 * postTags actions.
 *
 * @package    blackcms
 * @subpackage postTags
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postTagsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->post_tagss = Doctrine_Core::getTable('PostTags')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PostTagsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PostTagsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($post_tags = Doctrine_Core::getTable('PostTags')->find(array($request->getParameter('idpost_tags'))), sprintf('Object post_tags does not exist (%s).', $request->getParameter('idpost_tags')));
    $this->form = new PostTagsForm($post_tags);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($post_tags = Doctrine_Core::getTable('PostTags')->find(array($request->getParameter('idpost_tags'))), sprintf('Object post_tags does not exist (%s).', $request->getParameter('idpost_tags')));
    $this->form = new PostTagsForm($post_tags);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($post_tags = Doctrine_Core::getTable('PostTags')->find(array($request->getParameter('idpost_tags'))), sprintf('Object post_tags does not exist (%s).', $request->getParameter('idpost_tags')));
    $post_tags->delete();

    $this->getUser()->setFlash('success', GLOBAL_SAVE_SUCCESS);

    $this->redirect('postTags/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $idpost = $form->getValue('idpost');
      
      $post_tags = $form->save();

      if($idpost) {
          $this->redirect('post/edit?idpost='.$idpost);
      } else {
          $this->getUser()->setFlash('success', GLOBAL_SAVE_SUCCESS);
          
          $this->redirect('postTags/index');
      }
            
    }
  }
}
