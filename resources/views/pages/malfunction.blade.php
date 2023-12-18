@extends("index")
@section("aside")
    @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
        <div class="text-center mt-2">
            <a class="btn btn-success" href="{{route("home")}}"> الصفحة الرئسية  </a>
        </div>
    @else
        <div class="text-center mt-2">
            <a class="btn btn-success" href="{{route("branch")}}"> الصفحة الرئسية  </a>
        </div>
    @endif
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("add-device")}}"> اضافة جهاز </a>
    </div>
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("add-malfunction")}}"> ابلاغ عن عطل </a>
    </div>
@endsection
@section("content")
    <div class="container m-5  table-dark">
        <table class="table table-striped table-dark"  style="margin-top: 70px;" id="table">
            <thead>
            <tr>
                <th scope="col">م</th>
                <th scope="col">رقم الجهاز</th>
                <th scope="col">رقم السريل</th>
                <th scope="col">الاجرئات</th>
            </tr>
            <tbody>
            @foreach($malfunctions as $index => $malfunction)
                <tr>
                    <th scope="row">{{++$index}}</th>
                    <td>{{$malfunction->deviceId}}</td>
                    <td>{{$malfunction->serialNum}}</td>
                    <td>
                        <a href="{{route("show-malfunction" , ["id" => $malfunction->id])}}" class="btn btn-info"> عرض</a>
                        <a href="{{route("delete-malfunction" , $malfunction->id)}}" class="btn btn-danger">حذف</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </thead>
        </table>
    </div>

@endsection
@push("js")
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        customize: function(win) {
                            $(win.document.body).css('direction', 'rtl');
                            $(win.document.body).find('table').find('tr').find('td:last-child, th:last-child').hide();

                            // You can add additional styling as needed
                        }
                    }
                ],
            });


        });
    </script>


@endpush
@push("css")
    <style>
        .dataTables_length select option {
            background-color: black; /* Change this to your desired background color */
            color: white; /* Change this to your desired text color */
        }
    </style>
@endpush
