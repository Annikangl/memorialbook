<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User\User;
use App\MoonShine\Pages\Dashboard;
use App\MoonShine\Resources\HobbyResource;
use App\MoonShine\Resources\HumanResource;
use App\MoonShine\Resources\PetResource;
use App\MoonShine\Resources\ReligionsResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuItem::make('Главная страница', new Dashboard())
                ->icon('heroicons.home'),

            MenuGroup::make('Профили', [
                    MenuItem::make('Животные', new PetResource())
                        ->icon('heroicons.document-text'),

                    MenuItem::make('Люди', new HumanResource())
                        ->icon('heroicons.user'),
                ]
            )->icon('heroicons.identification'),

            MenuItem::make('Пользователи', new UserResource())
                ->badge(fn()=>User::query()->count())
                ->icon('heroicons.users'),

            MenuGroup::make('Атрибуты', [
                    MenuItem::make('Религиозные взгляды', new ReligionsResource())
                        ->icon('heroicons.globe-europe-africa'),
                    MenuItem::make('Хобби', new HobbyResource())
                        ->icon('heroicons.puzzle-piece')
                ]
            )->icon('heroicons.document-plus'),
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ])->icon('heroicons.wrench-screwdriver'),

//            MenuItem::make('Documentation', 'https://moonshine-laravel.com')
//               ->badge(fn() => 'Check'),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
