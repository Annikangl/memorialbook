@foreach($videos as $video)
    <video class="bg-img" loop poster="{{ asset('storage/uploads/community/poster.png') }}">
        <source src="{{ asset('storage/' . $video->item) }}" type="video/mp4"/>
        no support tag video
    </video>
    <button class="btn-play-video">
        <svg width="52" height="53" viewBox="0 0 52 53" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M26 52.2402C40.3594 52.2402 52 40.5996 52 26.2402C52 11.8808 40.3594 0.240234 26 0.240234C11.6406 0.240234 0 11.8808 0 26.2402C0 40.5996 11.6406 52.2402 26 52.2402ZM20 36.6325L38 26.2402L20 15.8479L20 36.6325Z"
                  fill="white"/>
        </svg>
    </button>

@endforeach
