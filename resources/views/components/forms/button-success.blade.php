<button type="button" 
    {{ $attributes->merge(['class' => 'btn-success rounded f-14 p-2']) }}>
    @if (!is_null($icon))
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</button>