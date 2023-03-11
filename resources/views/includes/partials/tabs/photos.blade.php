<div class="community-photos community-tab">
    <ul class="community-photos-list">
        @foreach($community->getMedia() as $item)
        <li class="community-photos-list__item">
            <a href="{{ $item->getMediaUrl('gallery') }}" class="community-photos-list__link gallery"
               data-fancybox="img-community">
                <img src="{{ $item->getMediaUrl('gallery') }}" class="bg-img" alt="" title=""/>
            </a>
        </li>
        @endforeach
    </ul>

    <button type="button" class="white-btn btn">Показать еще</button>
</div>
