<?php

/**
 * home actions.
 *
 * @package    blackcms
 * @subpackage home
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->boxess = Doctrine_Core::getTable('Boxes')->createQuery('b')
            ->where('b.publication = ?', 1)
            ->orderBy('b.position_row ASC')
            ->execute();

        $this->getUser()->setAttribute('cart_active', 'wydarzenia');

        $name_day = new NameDay();
        $this->name_day = $name_day->getNameList();
        $this->day_name = $name_day->getDayName();

        sfConfig::set('selected_cart_name', '/');

        $this->getUser()->setCulture('pl');

        $this->getUser()->setAttribute('lang_content_id', '');
        $this->getUser()->setAttribute('lang_content_table', '');

        define('PAGE_TITLE', 'strona główna - racibórz');
    }

    public function executeTestradio(sfWebRequest $request)
    {

    }

    public function executeContact(sfWebRequest $request)
    {

        $mail_title = 'Formularz kontaktowy - ' . $_SERVER['HTTP_HOST'];

        $mail_biuro = sfConfig::get('bpcms_form_contact_mail');

        if ($request->getParameter('name') != '' && $request->getParameter('email') != '' && $request->getParameter('description') != '') {
            $html = '<p>Otrzymałeś wiadomość z formularza kontaktowego:</p>';
            $html .= '<p><b>Dane kontaktowe:</b></p>';
            $html .= '<p>Imie i nazwisko: ' . $request->getParameter('name') . '</p>';
            $html .= '<p>E-mail: ' . $request->getParameter('email') . '</p>';
            $html .= '<p>E-mail: ' . $request->getParameter('phone') . '</p>';
            $html .= '<p>Wiadomość:</p>';
            $html .= '<p><b>' . $request->getParameter('description') . '</b></p>';
            $html .= '<p><b>Data przesłania wiadomości: </b>' . date('Y-m-d H:i:s') . '</p>';

            try {
                $message = Swift_Message::newInstance();
                $message->setSubject($mail_title);
                $message->setBody($html, 'text/html');
                $message->setFrom(array('no-reply@anielski-mlyn.pl' => 'anielski-mlyn.pl'));
                $message->setTo('eddiskate@gmail.com');

                $massage_status = sfContext::getInstance()->getMailer()->send($message);
            } catch (Exception $exception) {
                BpDebug::printr($exception);
                die;
            }



            echo 'wysłane';die;
        }

        $this->getUser()->setFlash('success_mail', '<p id="success_mail">Dziękujemy za wysałanie wiadomości.<br> Skontaktujemy się z Państwem najszybciej jak będziemy mogli.</p>');

        $this->redirect($request->getReferer());
    }

    public function executeChangeLang(sfWebRequest $request)
    {
        switch ($this->getUser()->getAttribute('lang_content_table')) {
            case "Cart":
                $cart = Doctrine_Core::getTable('Cart')->find(array($this->getUser()->getAttribute('lang_content_id')));
                if ($cart) {
                    $redirect_url = $cart->getLinkUrl();
                }
                break;
            case "Page":
                $page = Doctrine_Core::getTable('Page')->find(array($this->getUser()->getAttribute('lang_content_id')));
                if ($page) {
                    $redirect_url = $page->getLinkUrl();
                }
                break;
            case "Post":
                $post = Doctrine_Core::getTable('Post')->find(array($this->getUser()->getAttribute('lang_content_id')));
                if ($post) {
                    $redirect_url = $post->getLinkPostShowUrl();
                }
                break;
            case "PostCatalog":
                $post_catalog = Doctrine_Core::getTable('PostCatalog')->find(array($this->getUser()->getAttribute('lang_content_id')));
                if ($post_catalog) {
                    $redirect_url = $post_catalog->getLinkUrl();
                }
                break;
            default:
                if($request->getParameter('culture') == 'de') {
                    $redirect_url = '/de/';
                } else {
                    $redirect_url = '/';
                }
                break;
        }

        return $this->redirect(str_replace('/pl', '', $redirect_url));
    }

}
