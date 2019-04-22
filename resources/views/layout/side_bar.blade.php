<div class="side">
    <a href="#" class="close-side"><i class="fa fa-times"></i></a>
    @foreach($menus as $menu)
        <div class="widget">
            <h6 class="title">{{$menu->name}}</h6>
            @if($menu->child_menus)
                <ul class="link main-nav">
                    @foreach($menu->child_menus as $child_menu)
                        <li><a href="{{$child_menu->url}}">{{$child_menu->name}}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach
</div>