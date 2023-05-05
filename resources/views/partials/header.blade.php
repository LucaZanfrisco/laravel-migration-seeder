<section id="header">
    <div class="container">
        <div class="row row-cols-2 p-4 text-center">
            <div ><a href="{{ route('home') }}" class="{{ ( Route::currentRouteName() === 'home') ? 'active' : '' }}">Treni</a></div>
            <div ><a href="{{ route('today' )}}" class="{{ (Route::currentRouteName() === 'today') ? 'active' : '' }}">Treni di oggi</a> </div>
        </div>
    </div>
</section>