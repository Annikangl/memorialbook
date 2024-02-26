<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use App\Models\User\User;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Pages\Page;

class Dashboard extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Главная';
    }

    public function subtitle(): string
    {
        return $this->subtitle ?: 'Добро пожаловать! Панель администрирования приложения MemorialBook!';
    }

    public function components(): array
    {
        $petsCount = Pet::query()->count();
        $humansCount = Human::query()->count();
        $communityCount = Community::query()->count();

        return [
            Heading::make('Статистика по пользователям'),

            Grid::make([
                ValueMetric::make(__('moonshine::ui.metrics.Total users'))
                    ->value(
                        User::query()->count()
                    )->columnSpan(4)->icon('heroicons.user-group'),
            ])->customAttributes(['class' => 'my-5']),

            Heading::make(__('moonshine::ui.metrics.Profile creation statistics')),

            Grid::make([
                ValueMetric::make('Всего создано профилей')->value(function () use ($humansCount, $petsCount) {
                    return $humansCount + $petsCount;
                })
                    ->icon('heroicons.user-circle')
                    ->columnSpan(3, 6),

                ValueMetric::make('Профилей людей')
                    ->value(function () use ($humansCount) {
                        return $humansCount;
                    })
                    ->columnSpan(3, 6)->icon('heroicons.outline.arrow-trending-up'),
                ValueMetric::make('Профилей животных')
                    ->value(function () use ($petsCount) {
                        return $petsCount;
                    })
                    ->columnSpan(3, 6)->icon('heroicons.outline.arrow-trending-up'),
            ]),
        ];
    }
}
