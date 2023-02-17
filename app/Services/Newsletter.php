<?php

namespace App\Services;

use \MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        // set the default value for subscribers list ID
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember(
            $list,
            [
                "email_address" => $email,
                "status" => "pending",
            ]
        );
    }

    public function client()
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.prefix')
        ]);

        return $mailchimp;
    }
}
