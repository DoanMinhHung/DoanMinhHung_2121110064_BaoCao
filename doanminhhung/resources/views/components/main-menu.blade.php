<section class="mainmenu bg-mainmenu ">
    <div class="container">
        <nav>
            <ul class="menu clearfix">
                @foreach ($menus as $menu)
                <x-main-sub-menu :menu="$menu"/>
                @endforeach
            </ul>
        </nav>
    </div>
</section>
