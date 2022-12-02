<?php 

return[
    'driver' => env('MAIL_DRIVER', 'smtp'),
   'host' => env('MAIL_HOST', 'smtp.gmail.com'),
   'port' => env('MAIL_PORT', 587),
   'from' => ['teste' => 'stackteste8@gmail.com','name' => 'teste'],
   'encryption' => env('MAIL_ENCRYPTION', 'tls'),
   'username' => env('MAIL_USERNAME','stackteste8@gmail.com'),
   'password' => env('MAIL_PASSWORD','testeti1'),
   'sendmail' => '/usr/sbin/sendmail -bs',
]


?>