<?php

declare(strict_types=1);

namespace App\MoonShine\Layout;

use MoonShine\Components\Layout\{Content,
    Flash,
    Footer,
    Header,
    LayoutBlock,
    LayoutBuilder,
    Menu,
    Profile,
    Search,
    Sidebar};
use MoonShine\Components\When;
use MoonShine\Contracts\MoonShineLayoutContract;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
                Profile::make(withBorder: true),
            ]),
            LayoutBlock::make([
                Flash::make(),
                Header::make(),
                Content::make(),
                Footer::make()->copyright(fn (): string => <<<'HTML'
                        &copy; 2024 Made with ❤️ by
                        <a href="https://t.me/kek_ivanovich"
                            class="font-semibold text-primary hover:text-secondary"
                            target="_blank"
                        >
                            Ivan
                        </a>
                    HTML),
            ])->customAttributes(['class' => 'layout-page']),
        ]);
    }
}
