<?php

namespace Xanderificnl\LaravelQuill;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
//use Xanderificnl\LaravelQuill\Commands\LaravelQuillCommand;
use Xanderificnl\LaravelQuill\View\Components\EditorComponent;

class LaravelQuillServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-quill')
            ->hasConfigFile()
            ->hasViews()
            ->hasViewComponents(
                'laravel-quill',
                EditorComponent::class
            );
    }
}
