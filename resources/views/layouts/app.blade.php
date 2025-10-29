<!doctype html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('web/logos/favicon.png') }}">
    <title>{{ env('APP_NAME') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('web/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/toastr.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/sweetalert2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/datatables.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}" type="text/css">

</head>

<body>

    <div class="preload">
        <div class="flexbox">
            <div>
                <div class="reverse-spinner"></div>
            </div>
        </div>
    </div>

    @include('layouts.partials.sidebar')

    <div class="main-content">

        @yield('content')

    </div>

    <script src="{{ asset('web/js/jquery.min.js') }}"></script>
    <script src="{{ asset('web/js/popper.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/js/argon.js') }}"></script>
    <script src="{{ asset('web/js/datatables.min.js') }}"></script>
    <script src="{{ asset('web/js/countfect.min.js') }}"></script>
    <script src="{{ asset('web/js/toastr.min.js') }}"></script>
    <script src="{{ asset('web/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('web/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    'paginate': {
                        'previous': '<i class="fas fa-angle-double-left"></i>',
                        'next': '<i class="fas fa-angle-double-right"></i>'
                    }
                }
            });
        });

        $('.visitorMessage').click(function() {
            Swal.fire(
                'Access Denied!',
                "You don't have permission to create, update or delete because you are visitor.",
                'warning'
            )
        })
    </script>

    @if (session()->has('success'))
        <script>
            toastr.success("{{ session()->get('success') }}")
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            toastr.error();
            ("{{ session()->get('error') }}")
        </script>
    @endif

    @stack('scripts')
</body>

</html>
