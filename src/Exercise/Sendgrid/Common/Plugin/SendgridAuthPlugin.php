<?php

namespace Exercise\Sendgrid\Common\Plugin;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Adds specified sendgrid auth to all requests sent from a client.
 */
class SendgridAuthPlugin implements EventSubscriberInterface
{
    private $username;
    private $password;

    /**
     * @param string $username HTTP basic auth username
     * @param string $password Password
     * @param int    $scheme   Curl auth scheme
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public static function getSubscribedEvents()
    {
        return array('client.create_request' => array('onRequestCreate', 255));
    }

    /**
     * Add basic auth
     *
     * @param Event $event
     */
    public function onRequestCreate(Event $event)
    {
        $query = $event['request']->getPostFields();
        $query
            ->set('api_user', $this->username)
            ->set('api_key', $this->password)
        ;
    }
}
