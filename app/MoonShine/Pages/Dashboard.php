<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

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
		return [

        ];
	}
}
