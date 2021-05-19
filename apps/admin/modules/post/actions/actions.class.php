<?php

/**
 * post actions.
 *
 * @package    blackcms
 * @subpackage post
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->posts = Doctrine_Core::getTable('Post')
                ->createQuery('a')
                ->orderBy('a.created_at DESC')                
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new PostForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new PostForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost'))), sprintf('Object post does not exist (%s).', $request->getParameter('idpost')));
        $this->form = new PostForm($post);
        
        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();            
    }

    public function executeGallery(sfWebRequest $request)
    {
        $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost'))), sprintf('Object post does not exist (%s).', $request->getParameter('idpost')));

    }

    public function executeRemoveavatar(sfWebRequest $request) {
        $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost'))), sprintf('Object post does not exist (%s).', $request->getParameter('idpost')));
        
        unlink(sfConfig::get('sf_web_dir').'/post/'.$post->getAvatar());
        unlink(sfConfig::get('sf_web_dir').'/post/thumbs/'.$post->getAvatar());
        
        $post->setAvatar(null);
        $post->save();
        
        $this->getUser()->setFlash('success', 'Zdjęcie zostało usunięte!');
        
        $this->redirect($request->getReferer());
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost'))), sprintf('Object post does not exist (%s).', $request->getParameter('idpost')));
        $this->form = new PostForm($post);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost'))), sprintf('Object post does not exist (%s).', $request->getParameter('idpost')));
        $post->delete();

        $this->redirect('post/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $post = $form->save();
            
            if ($form->getValue('avatar_db') != '') {
                $post->setAvatar($form->getValue('avatar_db'));
                copy(sfConfig::get('sf_web_dir') . '/images/gallery/'.$form->getValue('avatar_db'), sfConfig::get('sf_web_dir') . '/images/post/'.$form->getValue('avatar_db'));
            }
           
            $post->setCreatedAt(strtotime($post->getCreatedAt()));
            $post->save();
            
            $image_dir = sfConfig::get('sf_web_dir') . '/images/post/';
            $image = new Image();
            $image->load($image_dir . $post->getAvatar());
            $image->resizeToWidth(600);
            $image->save($image_dir . $post->getAvatar());

            $image = new Image();
            $image->load($image_dir . $post->getAvatar());
            $image->resizeToWidth(400);
            $image->save($image_dir . 'thumbs/' . $post->getAvatar());
            $this->getUser()->setFlash('monit', 'Post został zapisany!');

            if($request->getParameter('idpost_tags')) {
                
                $post_has_post_tagss = Doctrine_Core::getTable('PostHasPostTags')->createQuery('a')
                        ->where('a.post_idpost = ?', $post->getIdpost())
                        ->execute();
                
                foreach($post_has_post_tagss as $post_has_post_tags) {
                    $post_has_post_tags->delete();
                }
                
                foreach ($request->getParameter('idpost_tags') as $idpost_tags) {
                    $post_has_post_tags = new PostHasPostTags();
                    $post_has_post_tags->setPostIdpost($post->getIdpost());
                    $post_has_post_tags->setPostTagsIdpostTags($idpost_tags);
                    $post_has_post_tags->save();
                }
                                 
            }
            
            $this->redirect('post/edit?idpost=' . $post->getIdpost());
        }
    }

}
