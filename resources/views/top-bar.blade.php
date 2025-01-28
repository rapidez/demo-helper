@return(!request()->routeIs('checkout'))
<div class="w-screen bg-white my-2">
    <div class="container py-2 text-center">
        <x-rapidez::button.outline class="min-h-0" href="/checkout?checkout=default">@lang('default checkout')</x-rapidez::button.outline>
        <x-rapidez::button.outline class="min-h-0" href="/checkout?checkout=onestep">@lang('onestep checkout')</x-rapidez::button.outline>
    </div>
</div>
