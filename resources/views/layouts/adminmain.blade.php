@include('partials.adminhead')

<body>
    @include('partials.sidebar');

    <main class="mainlayout">
        @yield('content')
    </main>

    @include('partials.adminfooter')
</body>
</html>