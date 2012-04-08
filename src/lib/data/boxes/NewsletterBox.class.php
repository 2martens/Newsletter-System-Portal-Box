<?php
// wbb imports
require_once(WBB_DIR.'lib/data/boxes/PortalBox.class.php');
require_once(WBB_DIR.'lib/data/boxes/StandardPortalBox.class.php');

/**
 * This box implements a form for newsletter subscription.
 *
 * @author Jim Martens
 * @copyright 2012 Jim Martens
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 * @package de.plugins-zum-selberbauen.newsletterBox
 * @subpackage data.boxes
 * @category Portal
 */
class NewsletterBox extends PortalBox implements StandardPortalBox {
    
    /**
     * If true, the viewer is a guest.
     * @var boolean
     */
    public $isGuest = true;
    
    /**
     * If true, the form will be displayed.
     * @var boolean
     */
    public $showForm = true;
    
    /**
     * If true, the viewer is a subscriber.
     * @var boolean
     */
    public $isSubscriber = false;
    
    /**
     * Contains the template name of this box.
     * @var string
     */
    protected $templateName = 'newsletterBox';
    
    /**
     * Contains the portal mode (display, edit && board).
     * @var string
     */
    protected $portalMode = '';
    
    /**
     * @see StandardPortalBox::readData()
     */
    public function readData() {
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'Portal') $this->portalMode = 'display';
		elseif (isset($_REQUEST['form']) && $_REQUEST['form'] == 'PortalEdit') $this->portalMode = 'edit';
		else $this->portalMode = 'board';
		
		if (WCF::getUser()->userID != 0) $this->isGuest = false;
		if ($this->portalMode == 'edit') $this->showForm = false;
		
		//add cache resource
        $cacheName = 'newsletter-subscriber-'.PACKAGE_ID;
        WCF::getCache()->addResource($cacheName, WCF_DIR.'cache/cache.'.$cacheName.'.php', WCF_DIR.'lib/system/cache/CacheBuilderNewsletterSubscriber.class.php');
        
        //get options
        $subscribersList = WCF::getCache()->get($cacheName, 'subscribers');
        $userID = WCF::getUser()->userID;
        
        foreach ($subscribersList as $subscriber) {
            if ($userID != $subscriber['userID']) continue;
            $this->isSubscriber = true;
            break;
        }
    }
    
    /**
     * @see StandardPortalBox::getTemplateName()
     */
    public function getTemplateName() {
        return $this->templateName;
    }
}
