<?php
return [
    'name' => "Boris Blog",
    'title' => "Welcome to My Blog!",
    'subtitle' => 'Thank you so much for visiting. This is my first website built with Laravel. Please read my popular post!',
    'description' => 'This is my meta description',
    'author' => 'Boris Chen',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'rss_size' => 25,
    'contact_email' => env('MAIL_FROM'),
    'uploads' => [
//        'storage' => 'local',
//        'webpath' => '/uploads/',
        'storage' => 's3',
        'webpath' => 'https://s3-ap-southeast-2.amazonaws.com/boris-blog',
    ],
]; 