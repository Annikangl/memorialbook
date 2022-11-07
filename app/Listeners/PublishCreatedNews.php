<?php

namespace App\Listeners;

use App\Events\CreateNews;
use App\Models\News\News;
use App\Models\Profile\Profile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PublishCreatedNews
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateNews  $event
     * @return void
     */
    public function handle(CreateNews $event): void
    {
        // TODO add to queue
        $news = News::query()->create([
            'author_id' => $event->profile->users->id,
            'profile_id' => $event->profile->id ?? null,
            'title' => $event->action,
        ]);

        if ($event->profile->galleries()->exists()) {
            foreach ($event->profile->galleries as $item) {
                /** @var News $news */
                $news->galleries()->create([
                    'news_id' => $news->id,
                    'item' => $item->item
                ]);
            }
        }


    }
}
