<?php

namespace Exercise\Sendgrid\Marketing;

use Guzzle\Common\Collection;
use Guzzle\Service\Description\ServiceDescription;
use Exercise\Sendgrid\Common\AbstractClient;
use Exercise\Sendgrid\Common\Plugin\SendgridAuthPlugin;

class MarketingClient extends AbstractClient
{
    public static function factory($config = array())
    {
        // Provide a hash of default client configuration options
        $default = array('base_url' => 'https://sendgrid.com/api/newsletter/');

        // The following values are required when creating the client
        $required = array(
            'api_user',
            'api_key',
        );

        // Merge in default settings and validate the config
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('base_url'), $config);
        $client->setDescription(ServiceDescription::factory(realpath(__DIR__.'/Resources/marketing.json')));
        $client->addSubscriber(new SendgridAuthPlugin($config->get('api_user'), $config->get('api_key')));

        return $client;
    }
}
