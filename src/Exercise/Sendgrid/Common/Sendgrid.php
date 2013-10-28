<?php

namespace Exercise\Sendgrid\Common;

use Guzzle\Service\Builder\ServiceBuilder;
use Guzzle\Service\Builder\ServiceBuilderLoader;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class Sendgrid extends ServiceBuilder
{
    /**
     * Create a new service locator for the Sendgrid SDK
     *
     * You can configure the service locator is four different ways:
     *
     * 1. Use the default configuration file shipped with the SDK that wires class names with service short names and
     *    specify global parameters to add to every definition (e.g. key, secret, credentials, etc)
     *
     * 2. Use a custom configuration file that extends the default config and supplies credentials for each service.
     *
     * 3. Use a custom config file that wires services to custom short names for services.
     *
     * @param array|string $config           The full path to a .php or .js|.json file, or an associative array of data
     *                                       to use as global parameters to pass to each service.
     * @param array        $globalParameters Global parameters to pass to every service as it is instantiated.
     *
     * @return Sendgrid
     */
    public static function factory($config = null, array $globalParameters = array())
    {
        if (!$config) {
            // If nothing is passed in, then use the default configuration file with credentials from the environment
            $config = self::getDefaultServiceDefinition();
        } elseif (is_array($config)) {
            // If an array was passed, then use the default configuration file with parameter overrides
            $globalParameters = $config;
            $config = self::getDefaultServiceDefinition();
        }

        $loader = new ServiceBuilderLoader();
        $loader->addAlias('_sendgrid', self::getDefaultServiceDefinition());

        return $loader->load($config, $globalParameters);
    }

    /**
     * Get the full path to the default service builder definition file
     *
     * @return string
     */
    public static function getDefaultServiceDefinition()
    {
        return __DIR__  . '/Resources/sendgrid-config.json';
    }
}
