<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

@include('front.layouts.head')

<body data-instant-intensity="mousedown">
  
    @include('front.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('front.layouts.footer')
    @include('front.layouts.scripts')

    @yield('customJS')
    
</body>

</html>
