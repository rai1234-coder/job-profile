@include('partials.head')

<body>
    @include('partials.header');

    <main class="mainlayout">
        @yield('content')
    </main>

    @include('partials.footer')


</body>
</html>