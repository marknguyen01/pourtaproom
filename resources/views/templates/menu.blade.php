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
    <div class="menu-content">
        <div class="menu-categories">
            @foreach($categories as $category)
                <span>{{ $category['name'] }}</span>
            @endforeach
        </div>
        <div class="menu-items">
            @foreach($items as $item)
                <span>{{ $item['name'] }}</span>
            @endforeach
        </div>
    </div>
</div>