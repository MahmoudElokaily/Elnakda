@extends("index")
@section("aside")
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("home")}}"> الفروع </a>
    </div>
@endsection
@section("content")
            <div class="container m-5  table-dark">
                <table class="table table-striped table-dark"  style="margin-top: 70px;" id="table">
                    <thead>
                    <tr>
                        <th scope="col">م</th>
                        <th scope="col">رقم الشاسية</th>
                        <th scope="col">رقم العربية</th>
                        <th scope="col">رقم الجهاز</th>
                        <th scope="col">ماركة السيارة</th>
                        <th scope="col">نوع السيارة</th>
                        <th scope="col"> الفرع </th>
                        <th scope="col">الاجرئات</th>
                    </tr>
                    <tbody>
                    @foreach($cars as $index => $car)
                        <tr>
                            <th scope="row">{{++$index}}</th>
                            <td>{{$car->chassisNum}}</td>
                            <td>{{$car->carNum}}</td>
                            <td>{{$car->deviceId}}</td>
                            <td>{{$car->carModel}}</td>
                            <td>{{$car->carType}}</td>
                            <td>{{$car->branch->name}}</td>
                            <td><a href="{{route("delete-device" , $car->id)}}" class="btn btn-danger">حذف</a></td>
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
                'copy','excel', 'print'
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