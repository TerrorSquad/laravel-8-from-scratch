<?php

declare(strict_types=1);

namespace App\Services;

use MailchimpMarketing\ApiClient;

interface NewsletterInterface
{
    public function subscribe(string $email, string $list = null);
}
