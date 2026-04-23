@if (config('ui.stitch_enabled'))
    @include('frontend.layouts.stitch')
@else
    @include('frontend.layouts.legacy')
@endif
