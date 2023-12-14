@extends("index")
@section("aside")
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("add-branch")}}"> اضافة فرع </a>
    </div>
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("register")}}"> اضافة مستخدم جديد </a>
    </div>
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("devices-report")}}"> تقرير اجهزة جميع الفروع </a>
    </div>
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("malfunctions-report")}}"> تقرير اعطال جميع الفروع </a>
    </div>
@endsection
@section("content")

    <div class="row">
        @foreach($branches as $branche)
            <div class="col-md-3 mt-3">
                <div class="card text-center">
                    <a href="{{route("branch" , ["id" => $branche->id])}}" class="card-body">
                        {{$branche->name}}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
