<?php

return [
    'allowed_ips' => [
        'env'    => 'ALLOWED_IPS',
        'bind'   => 'anomaly.extension.ip_filter_security_check::config.allowed_ips',
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'filter' => 'FILTER_VALIDATE_IP',
        ],
    ],
];
