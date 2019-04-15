<?php

return [

  'driver' => env('MAIL_DRIVER', 'smtp'),

  // SMTP Host Address
  'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

  // SMTP Host Port
  'port' => env('MAIL_PORT', 587),

  // Global "From" Address
  'from' => [
      'address' => env('MAIL_FROM_ADDRESS', 'selmane@example.com'),
      'name' => env('MAIL_FROM_NAME', 'セルマネ運営')
  ],

  // E-Mail Encryption Protocol
  'encryption' => env('MAIL_ENCRYPTION', null),

  // SMTP Server Username
  'username' => env('MAIL_USERNAME', null),

  // SMTP Server Password
  'password' => env('MAIL_PASSWORD', null),

  // Sendmail System Path
  'sendmail' => '/usr/sbin/sendmail -bs',

  // Mail "Pretend"
  'pretend' => env('MAIL_PRETEND', false),
    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channel
    |--------------------------------------------------------------------------
    |
    | If you are using the "log" driver, you may specify the logging channel
    | if you prefer to keep mail messages separate from other log entries
    | for simpler reading. Otherwise, the default channel will be used.
    |
    */

    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
