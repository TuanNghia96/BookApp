<?php
/**
* Created by Sang Nguyen.
* Date: 22/06/2015
* Time: 3:10 PM
*/
 
return [
'offline' => false, //  false => Sử dụng src local, true => sử dụng src cdn
'base' => [ // Các thư viện chính được sử dụng cho từng module
    'frontend' => [ // Giao diện phía người dùng
        'javascript' => ['jquery'],
        'stylesheets' => ['style'],
    ],
    'backend' => [ // Giao diện trang quản trị
        'javascript' => [
            'jquery',
            'bootstrap',
         ],
         'stylesheets' => [
             'bootstrap',
         ],
    ],
],
'resources' => [
    'javascript' => [
        'jquery' => [
             'use_cdn' => false,
             'location' => 'top',
             'src' => [
                  'local' => [
                      '/resources/javascript/jquery.min.js',
                  ],
                  'cdn' => [
                      'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
                  ],
             ],
        ],
        'bootstrap' => [
             'use_cdn' => true,
             'location' => 'top',
             'src' => [
                  'local' => [
                     '/resources/javascript/bootstrap.min.js',
                  ],
                  'cdn' => [
                     'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
                  ],
             ],
        ],
 
     // End JS
     ],
     /* -- STYLESHEET ASSETS -- */
     'stylesheets' => [
         'style' => [
              'use_cdn' => false,
              'location' => 'top',
              'src' => [
                   'local' => [
                      '/resources/stylesheets/style.css',
                   ],
                   'cdn' => [],
               ],
         ],
         'bootstrap' => [
             'use_cdn' => true,
             'location' => 'top',
             'src' => [
                 'local' => [
                     '/resources/stylesheets/bootstrap.min.css',
                 ],
                 'cdn' => [
                     'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
                 ],
             ],
         ],
 
       ],
    ],
];
