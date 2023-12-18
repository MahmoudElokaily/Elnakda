<!doctype html>
<html lang="ar" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- datatable --}}
        <link href="./plugins/DataTables/datatables.min.css" rel="stylesheet">
        {{-- fav icon  --}}
        <link rel="shortcut icon" href="img/favicon.ico">

        @stack("css")
        <!-- Bootstrap CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet">
        {{-- toastr  --}}
        <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
        <title>النجدة | @yield("title" , $title ?? "")</title>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-5 text-center">
                <img src="img/Dakhelia.png" alt="">
                <br>
                <br>
                <div id="liveDateTime"></div>

                <div class="card text-end">
                    <div class="card-body">
                        <div id="date">
                            التاريخ : <span></span>
                        </div>

                        <div id="time">
                            الوقت : <span></span>
                        </div>

                        <!-- div id="network">
                           جوده الشبكه : <span></span>
                       </div -->

                    </div>
                </div>
{{--                <div class="text-center mt-2">--}}
{{--                    <a class="btn btn-success" href="/admin/index.php"> لوحه الاداره </a>--}}
{{--                </div>--}}
                @section("aside")
                @show
                @auth
                    <div class="text-center mt-2">
                        <a class="btn btn-danger" href="{{route("logout")}}"> تسجيل خروج </a>
                    </div>
                @endauth
            </div>
            <div class="col-md-9 mt-5">
                <h2 class="text-center color-white mb-3">قطاع امن القاهره</h2>
                @include("inc.header")
                @section("content")
                @show
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="./js/script.js"></script>

        <script src="./plugins/toastr/toastr.min.js"></script>
        {{-- datatables--}}
        <script src="./plugins/DataTables/datatables.min.js"></script>

        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right", // Set the position to bottom-right
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            toastr.error("{{$error}}");
            @endforeach
            @endif

            @if(session()->get("success"))

            toastr.success("{{session('success')}}");
            @endif
            @if(session('error'))
            toastr.error("{{session('error')}}");
        @endif
        </script>
        <script>
            function updateDateTime() {
                const dateElement = document.getElementById('date').querySelector('span');
                const timeElement = document.getElementById('time').querySelector('span');

                const now = new Date();

                // Update Date
                const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const formattedDate = now.toLocaleString('ar-EG', optionsDate);
                dateElement.textContent = formattedDate;

                // Update Time
                const optionsTime = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
                const formattedTime = now.toLocaleString('ar-EG', optionsTime);
                timeElement.textContent = formattedTime;
            }

            // Update date and time every second
            setInterval(updateDateTime, 1000);

            // Initial call to set the initial date and time
            updateDateTime();
        </script>
        @stack("js")
        @include("inc.footer")

    </body>
</html>
