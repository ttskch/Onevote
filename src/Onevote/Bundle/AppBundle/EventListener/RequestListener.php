<?php

namespace Onevote\Bundle\AppBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    /**
     * @var string e.g. 'ja'
     */
    private $locale;

    /**
     * @var string e.g. 'ja|en'
     */
    private $locales;

    /**
     * @param $locale
     * @param $locales
     */
    public function __construct($locale, $locales)
    {
        $this->locale = $locale;
        $this->locales = $locales;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->isMasterRequest()) {
            return;
        }

        $url = trim($event->getRequest()->getRequestUri(), '/');

        if (preg_match('/^(' . $this->locales . ')/', $url)) {
            return;
        }

        $event->setResponse(new RedirectResponse('/' . $this->locale . '/' . $url, 301));
    }
}
