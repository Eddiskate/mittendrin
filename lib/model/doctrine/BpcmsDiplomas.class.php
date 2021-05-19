<?php

/**
 * BpcmsDiplomas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class BpcmsDiplomas extends BaseBpcmsDiplomas
{
    public function getReceivedFormat() {
        return date('Y-m-d', parent::getReceived());
    }

    public function getLinkToOpenPdf() {
        return link_to('otwórz pdf', '/images/diplomas/'.parent::getImage(), array('class' => 'btn btn-info btn-mini', 'target' => '_blank'));
    }
}
