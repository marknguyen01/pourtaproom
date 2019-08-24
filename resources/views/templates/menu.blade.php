<div class="container-fluid">
    <div class="title-block">
        <div class="title">
            Our Daily Selection
        </div>
        <div class="sub-title">
            Try variety of our taps, 117 taps
        </div>
    </div>
    <div class="dots-grey"></div>
    <div id="menu-app">
        <menu-component :category-data="{{ json_encode($categories) }}" :item-data="{{ json_encode($items) }}"></menu-component>
    </div>
</div>
