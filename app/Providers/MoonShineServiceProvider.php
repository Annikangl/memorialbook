<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User\User;
use App\MoonShine\Pages\Dashboard;
use App\MoonShine\Resources\CemeteryResource;
use App\MoonShine\Resources\CommunityPostResource;
use App\MoonShine\Resources\CommunityResource;
use App\MoonShine\Resources\HobbyResource;
use App\MoonShine\Resources\HumanResource;
use App\MoonShine\Resources\PetResource;
use App\MoonShine\Resources\ReligionsResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Menu\MenuDivider;
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
            MenuDivider::make('moonshine::ui.menu_items.main')->translatable(),
            MenuItem::make('moonshine::ui.menu_items.dashboard', new Dashboard())
                ->translatable()
                ->icon('heroicons.home'),

            MenuItem::make('moonshine::ui.menu_items.users', new UserResource())
                ->translatable()
                ->badge(fn() => User::query()->count())
                ->icon('heroicons.users'),

            MenuDivider::make('moonshine::ui.menu_items.application')->translatable(),

            MenuGroup::make('moonshine::ui.menu_items.profiles.profiles', [
                    MenuItem::make('moonshine::ui.menu_items.profiles.pets', new PetResource())
                        ->translatable()
                        ->icon('heroicons.document-text'),

                    MenuItem::make('moonshine::ui.menu_items.profiles.humans', new HumanResource())
                        ->translatable()
                        ->icon('heroicons.user'),
                ]
            )->translatable()->icon('heroicons.identification'),

            MenuGroup::make('moonshine::ui.menu_items.attributes.attributes', [
                    MenuItem::make('moonshine::ui.menu_items.attributes.religion views', new ReligionsResource())
                        ->translatable()
                        ->icon('heroicons.globe-europe-africa'),
                    MenuItem::make('moonshine::ui.menu_items.attributes.hobbies', new HobbyResource())
                        ->translatable()
                        ->icon('heroicons.puzzle-piece')
                ]
            )->translatable()->icon('heroicons.document-plus'),

            MenuGroup::make('moonshine::ui.menu_items.community.community', [

                    MenuItem::make('moonshine::ui.menu_items.community.community', new CommunityResource())
                        ->translatable()
                        ->icon('heroicons.user-group'),

                    MenuItem::make('moonshine::ui.menu_items.community.community_post', new CommunityPostResource())
                        ->translatable()
                        ->icon('heroicons.document-plus'),
                ]
            )->translatable()->icon('heroicons.user-plus'),

            MenuItem::make('moonshine::ui.menu_items.profiles.cemeteries', new CemeteryResource())
                ->translatable()
                ->icon('heroicons.building-library'),

            MenuDivider::make('moonshine::ui.resource.system')->translatable(),

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
