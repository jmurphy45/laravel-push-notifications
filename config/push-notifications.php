<?php

return [
    'apn' => [
        'certificate' => __DIR__.'/certificates/ios/apns-dev-cert.pem',
        'passPhrase' => 'secret', //Optional
        'passFile' => __DIR__.'/certificates/ios/yourKey.pem', //Optional
        'dry_run' => true,
    ],
];
