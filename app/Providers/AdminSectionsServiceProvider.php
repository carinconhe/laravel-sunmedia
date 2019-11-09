<?php

namespace Sunmedia\Providers;


class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        Sunmedia\User::class => 'Sunmedia\Http\Sections\Users',
    ];

}
