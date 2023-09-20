<?php

declare(strict_types=1);

return [
    'administrators' => [
        'emails' => explode(',', env('ADMINISTRATORS', ''))
    ]
];
