<?php

namespace Webkul\Blog\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    protected $models = [
        \Webkul\Blog\Models\Blog::class,
    ];
}
