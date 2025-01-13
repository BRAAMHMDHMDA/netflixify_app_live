<?php

use App\Models\Setting;

return [
    'app' => [
        'title' => 'App Settings',
        'name_menu' => 'App',
        'icon' => '<i class="ki-duotone ki-home fs-2 me-2"></i>',
        'settings' => [
            'app.name' => [
                'label' => 'App Name',
                'type' => 'text',
                'validate' => 'string|max:255',
            ],
            'app.locale' => [
                'label' => 'Default Local Settings',
                'type' => 'select',
                'validate' => 'string',
                'options' => [Setting::class, 'localeOptions']
            ],
            'app.timezone' => [
                'label' => 'Default Timezone',
                'type' => 'select',
                'validate' => 'string',
                'options' => [Setting::class, 'timezoneOptions']
            ],
            'app.logo' => [
                'label' => 'App Logo',
                'type' => 'image',
                'src' => '',
                'validate' => 'image',
            ],
            'app.logo_name' => [
                'label' => 'App Logo & Name (Full Logo)',
                'type' => 'image',
                'src' => '',
                'validate' => 'image',
            ]
        ],
    ],
    'mail' => [
        'title' => 'Mail Settings',
        'name_menu' => 'Mail',
        'icon' => '<i class="ki-duotone ki-sms fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>',
        'settings' => [
            'mail.from.name' => [
                'label' => 'Form Name',
                'type' => 'text',
                'validate' => 'string|max:255',
            ],
            'mail.from.address' => [
                'label' => 'Form Address',
                'type' => 'email',
                'validate' => 'email|max:255',
            ],
            'mail.mailers.smtp.host' => [
                'label' => 'Smtp Host',
                'type' => 'string',
                'validate' => 'string',
            ],
            'mail.mailers.smtp.port' => [
                'label' => 'Smtp Port',
                'type' => 'number',
                'validate' => 'int',
            ],
            'mail.mailers.smtp.encryption' => [
                'label' => 'Encryption',
                'type' => 'select',
                'validate' => 'string',
                'options' => [' ' => 'Non-SSL', 'tls' => 'SSL/TLS']
            ],
            'mail.mailers.smtp.username' => [
                'label' => 'Username',
                'type' => 'text',
                'validate' => 'string',
            ],
            'mail.mailers.smtp.password' => [
                'label' => 'Password',
                'type' => 'password',
                'validate' => 'string',
            ]
        ],
    ],
    'social_login' => [
        'title' => 'Social Login Settings',
        'name_menu' => 'Social Login',
        'icon' => '<i class="ki-duotone ki-facebook fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>',
        'settings' => [
            'services.facebook.client_id' => [
                'label' => 'Facebook Client ID',
                'type' => 'text',
                'validate' => 'string|max:255',
            ],
            'services.facebook.cline_secret' => [
                'label' => 'Facebook Client Secret',
                'type' => 'text',
                'validate' => 'string|max:255',
            ],
            'services.facebook.redirect' => [
                'label' => 'Facebook Redirect Url',
                'type' => 'string',
                'validate' => 'string',
            ],

            'services.google.client_id' => [
                'label' => 'Google Client ID',
                'type' => 'text',
                'validate' => 'string|max:255',
            ],
            'services.google.client_secret' => [
                'label' => 'Google Client Secret',
                'type' => 'text',
                'validate' => 'string|max:255',
            ],
            'services.google.redirect' => [
                'label' => 'Google Redirect Url',
                'type' => 'string',
                'validate' => 'string',
            ],

        ],
    ],
    'social_link' => [
        'title' => 'Social Link Settings',
        'name_menu' => 'Social Link',

        'icon' => '<i class="ki-duotone ki-fasten fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>',
        'settings' => [
            'facebook.link' => [
                'label' => 'Facebook Link',
                'type' => 'string',
                'validate' => 'url|max:255',
            ],
            'youtube.link' => [
                'label' => 'Youtube Link',
                'type' => 'string',
                'validate' => 'url|max:255',
            ],
            'google.link' => [
                'label' => 'Google Link',
                'type' => 'string',
                'validate' => 'url|max:255',
            ],
        ],
    ],
];
