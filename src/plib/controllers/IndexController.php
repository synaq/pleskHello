<?php

class IndexController extends pm_Controller_Action
{
    /**
     * @var \PleskExt\SynaqPleskHello\Adapter\ExampleHttpClientAdapter
     */
    private $adapter;

    public function init()
    {
        parent::init();

        $client = Modules_SynaqPleskHello_Factory_Client::create();
        $this->adapter = Modules_SynaqPleskHello_Factory_Adapter::createForHttpClientOnBaseUrl(
            $client,
            'https://sta-q.synaq.com/public-api/v1/'
        );

        /** @noinspection PhpUndefinedFieldInspection */
        $this->view->tabs = [
            [
                'title' => 'Message',
                'action' => 'message'
            ]
        ];
    }

    public function indexAction()
    {
        $this->forward('message');
    }

    public function messageAction()
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $this->view->message = $this->adapter->getApiMessage();
    }
}
