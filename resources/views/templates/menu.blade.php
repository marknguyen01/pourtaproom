@if(isset($items) && isset($categories))
<menu-component :category-data="{{ json_encode($categories) }}" :item-data="{{ json_encode($items) }}"></menu-component>
@else
    {{ Debugbar::info($errors) }}
    @if(isset($errors))
    <p class="text-center container">
        {{ $errors }}
    </p>
    @endif
@endif
