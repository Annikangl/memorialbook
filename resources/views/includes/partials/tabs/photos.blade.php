<div class="community-photos community-tab">
    <ul class="community-photos-list">
        @foreach($community->galleries as $gallery)
        <li class="community-photos-list__item">
            <a href="{{ asset('storage/' . $gallery->item ) }}" class="community-photos-list__link gallery"
               data-fancybox="img-community">
                <img src="{{ asset('storage/' . $gallery->item ) }}" class="bg-img" alt="" title=""/>
            </a>
        </li>
        @endforeach
    </ul>

    <button type="button" class="white-btn btn">Показать еще</button>
</div>
