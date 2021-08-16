<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Genaker\LazyLoad\Observer\Frontend\Controller;

class FrontSendResponseBefore implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {

	  $response = $observer->getResponse();
  	  $html = $response->getBody();
	 
	  //Without quotes to fix the issues with AJAX - HTML5 doesn't require Quotes 
	  $html = preg_replace('/<img\s/', '<img loading=lazy ', $html);
	
          $response->setBody($html);
    }
}

