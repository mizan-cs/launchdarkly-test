<?php
// config for Ocus/LaravelLaunchDarkly
return [
    // The SDK key for your account.
    'sdk_key' => env('LAUNCH_DARKLY_SDK_KEY'),

    // Client configuration settings (Optional)
    'options' => [
        // Base URI of the LaunchDarkly service. Change this if you are connecting to a Relay Proxy instance instead of
        // directly to LaunchDarkly.
        'base_uri' => env('LAUNCH_DARKLY_BASE_URI'),

        // Base URI for sending events to LaunchDarkly. Change this if you are forwarding events through a Relay Proxy
        // instance.
        'events_uri' => env('LAUNCH_DARKLY_EVENTS_URI'),

        // The maximum length of an HTTP request in seconds. Defaults to 3.
        'timeout' => env('LAUNCH_DARKLY_TIMEOUT'),

        // The maximum number of seconds to wait while trying to connect to a server. Defaults to 3.
        'connect_timeout' => env('LAUNCH_DARKLY_CONNECT_TIMEOUT'),

        // An optional implementation of Guzzle's [CacheStorageInterface]
        // (https://github.com/Kevinrob/guzzle-cache-middleware/blob/master/src/Storage/CacheStorageInterface.php).
        // Defaults to an in-memory cache.
        'cache' => env('LAUNCH_DARKLY_CACHE'),

        // If set to false, disables the sending of events to LaunchDarkly. Defaults to true.
        'send_events' => env('LAUNCH_DARKLY_SEND_EVENTS'),

        // An optional implementation of [Psr\Log\LoggerInterface](https://www.php-fig.org/psr/psr-3/). Defaults to a
        // Monolog\Logger sending all messages to the PHP error_log.
        'logger' => env('LAUNCH_DARKLY_LOGGER'),

        // If set to true, disables all network calls and always returns the default value for flags. Defaults to false.
        'offline' => env('LAUNCH_DARKLY_OFFLINE'),

        // An optional {@see \LaunchDarkly\FeatureRequester} implementation, or a class or factory for one.
        // Defaults to {@see \LaunchDarkly\Integrations\Guzzle::featureRequester()}. There are also optional packages
        // providing database integrations;
        // see [Storing data](https://docs.launchdarkly.com/sdk/features/storing-data#php).
        'feature_requester' => env('LAUNCH_DARKLY_FEATURE_REQUESTER'),

        // An optional {@see \LaunchDarkly\EventPublisher} implementation, or a class or factory for one.
        // Defaults to {@see \LaunchDarkly\Integrations\Curl::eventPublisher()}.
        'event_publisher' => env('LAUNCH_DARKLY_EVENT_PUBLISHER'),

        // If set to true, no user attributes (other than the key) will be sent back to LaunchDarkly.
        // Defaults to false.
        'all_attributes_private' => env('LAUNCH_DARKLY_ALL_ATTRIBUTES_PRIVATE'),

        // An optional array of user attribute names to be marked private. Any users sent to LaunchDarkly
        // with this configuration active will have attributes with these names removed. You can also set private
        // attributes on a per-user basis in LDUserBuilder.
        'private_attribute_names' => env('LAUNCH_DARKLY_PRIVATE_ATTRIBUTE_NAMES'),
    ],
];
