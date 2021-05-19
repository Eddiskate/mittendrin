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
    public function executeLoadmorepost(sfWebRequest $request)
    {

        $post = Doctrine_Core::getTable('Post')->createQuery('a');
        $post->where('a.publication = ?', 1);

        if ($request->getParameter('idpost_catalog')) {
            $post->andWhere('a.post_catalog_idpost_catalog = ?', $request->getParameter('idpost_catalog'));
        }

        if ($request->getParameter('name_url')) {
            $post->innerJoin('a.PostHasPostTags phpt');
            $post->innerJoin('phpt.PostTags pt');
            $post->andWhere('pt.name_url = ?', $request->getParameter('name_url'));
        }

        $post->orderBy('a.created_at DESC');

        $post->offset($request->getParameter('bpcms_post_max_count_to_page'));
        $post->limit(sfConfig::get('bpcms_post_max_count_to_page'));

        $this->posts = $post->execute();

        $this->getRequest()->setParameter('culture', $request->getParameter('culture'));
    }

    public function executeStimmeformsave(sfWebRequest $request)
    {
        if ($request->getMethod() == 'POST') {

            $response = array();

            $html  = '<p>' . $request->getParameter('name') . '</p>';
            $html .= '<p>' . $request->getParameter('city') . '</p>';
            $html .= '<p>' . $request->getParameter('occasion') . '</p>';
            $html .= '<p>' . $request->getParameter('description') . '</p>';
            $html .= '<p>' . $request->getParameter('music_service') . '</p>';

            try {
                $message = Swift_Message::newInstance();
                $message->setSubject('Stime - nowe życzenia');
                $message->setBody($html, 'text/html');
                $message->setFrom(array('no-reply@mittendrin.pl' => 'automat - mittendrin.pl'));
                $message->setTo(sfConfig::get('bpcms_stimme_mail_info'));

                sfContext::getInstance()->getMailer()->send($message);
            } catch (Exception $e) {
                echo $e;
            }

            $response['message'] = LANG_STIMME_THANKS_DESCRIPTION;

            return $this->renderText(json_encode($response));
        }

        die;
    }

    public function executeCookieAccept(sfWebRequest $request) {
        $response = sfContext::getInstance()->getResponse();

        $response->setCookie('cookie_accept');
        die;
    }

    public function executeMitStatsUpdate(sfWebRequest $request)
    {
        $mittendrin_stats = new MitStats();
        $mittendrin_stats->openConnection($request->getParameter('radio'));

        die;
    }

    public function executeBpcmsDiplomasSearch(sfWebRequest $request)
    {
        $diplomas = array();

        $this->keywords = $request->getParameter('keywords');

        if ($this->keywords) {
            $diplomas_lists = Doctrine_Core::getTable('BpcmsDiplomas')->createQuery('bd')
                ->where('bd.name LIKE ? OR bd.title LIKE ? OR bd.received LIKE ?', array('%' . $this->keywords . '%', '%' . $this->keywords . '%', '%' . $this->keywords . '%'))
                ->orderBy('bd.received DESC')
                ->fetchArray();
        } else {
            $diplomas_lists = Doctrine_Core::getTable('BpcmsDiplomas')->createQuery('bd')->orderBy('bd.received DESC')
                ->fetchArray();
        }

        foreach ($diplomas_lists as $diplomas_list) {
            $diplomas[date('Y', $diplomas_list['received'])][$diplomas_list['idbpcms_diplomas']]['name'] = $diplomas_list['name'];
            $diplomas[date('Y', $diplomas_list['received'])][$diplomas_list['idbpcms_diplomas']]['title'] = $diplomas_list['title'];
            $diplomas[date('Y', $diplomas_list['received'])][$diplomas_list['idbpcms_diplomas']]['image'] = $diplomas_list['image'];
        }

        $request->setParameter('idcart', 9);
        $this->bpcms_diplomas = $diplomas;
    }
}
