<?php

namespace App\EventListener;

use Cloudinary\Api\Exception\NotFound;
//use http\Env\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ExceptionListener

{
    public function __construct(
        private Environment $twig
    )
    {

    }




    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if(!$exception instanceof NotFoundHttpException) {
            return;
        }
        $content = $this->twig->render('exception/not_found.html.twig');

        $event->setResponse((new Response())->setContent($content));
    }


}