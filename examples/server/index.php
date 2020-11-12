<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

$config = [
    'authentication' => [
        'ad' => [
            'client_id' => '5f10c674-2fbb-4daf-8c7d-3a0110d56845',
            'client_secret' => 'f9s.sOOT-kXnL2FfY23x_AZT90kh_zY.8L',
            'enabled' => '1',
            'directory' => 'common'.
            'return_url' => 'https://github.com/srish072/active-directory/blob/develop/examples/server'
        ]
    ]
];

$request = new \Zend\Http\PhpEnvironment\Request();

$ad = new \Magium\ActiveDirectory\ActiveDirectory(
    new \Magium\Configuration\Config\Repository\ArrayConfigurationRepository($config),
    Zend\Psr7Bridge\Psr7ServerRequest::fromZend(new \Zend\Http\PhpEnvironment\Request())
);

$entity = $ad->authenticate();

echo $entity->getName() . '<Br />';
echo $entity->getOid() . '<Br />';
echo $entity->getPreferredUsername() . '<Br />';
