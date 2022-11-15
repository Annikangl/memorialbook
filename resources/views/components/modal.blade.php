<div class="hystmodal" id="{{ $id }}" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window {{ $long ?? ''}} " role="dialog" aria-modal="true">
            <button data-hystclose class="hystmodal__close">Закрыть</button>
            <div class="hystmodal__{{ $class }}">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
