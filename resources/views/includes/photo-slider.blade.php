<ul class="community-photo">
    @foreach($photos as $photo)
    <li class="community-photo__item">
        <a href="{{ asset('storage/' . $photo->item ) }}" class="community-photo__link gallery"
           data-fancybox="slider-profile">
            <img src="{{ asset('storage/' . $photo->item ) }}" class="bg-img" alt="" title=""/>
        </a>
    </li>
    @endforeach
</ul>
