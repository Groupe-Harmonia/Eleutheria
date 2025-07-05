<?php

$wgDebugLogGroups = [];

if (getenv("ELEUTHERIA_LOG_LEVEL") && is_numeric(getenv("ELEUTHERIA_LOG_LEVEL"))) {
  // Default to warning level if not set
  $logLevel = getenv("ELEUTHERIA_LOG_LEVEL");
} else {
  echo "ELEUTHERIA_LOG_LEVEL is not set or not an integer. Defaulting to warning level.\n";
  $logLevel = 200; // Default to warning level
}

$wgMWLoggerDefaultSpi = [
  'class' => '\\MediaWiki\\Logger\\MonologSpi',
  'args' => [
    [
      'loggers' => [
        '@default' => [
          'processors' => ['wiki', 'psr'],
          'handlers' => ['fluent-bit']
        ],
      ],
      'processors' => [
        'wiki' => [
          'class' => '\\MediaWiki\\Logger\\Monolog\\WikiProcessor'
        ],
        'psr' => [
          'class' => '\\Monolog\\Processor\\PsrLogMessageProcessor'
        ],
      ],
      'handlers' => [
        'fluent-bit' => [
          'class' => '\\Monolog\\Handler\\SocketHandler',
          'args' => ['tcp://fluent-bit:24224', $logLevel],
          'formatter' => 'format'
        ],
      ],
      'formatters' => [
        'format' => [
          'class' => '\\Monolog\\Formatter\\JsonFormatter'
        ],
      ]
    ]
  ]
];
