@extends("index")
@section("aside")
    <div class="text-center mt-2">
        <a class="btn btn-success" href="{{route("branch")}}"> اجهزة الفرع </a>
    </div>
@endsection
@section("content")
    <div class="container col-md-9 mt-5">
        <form>
            <legend style="color: white">اضافة جهاز</legend>
            @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="color: white">اسم الظابط المسئول </label>
                    <input type="text" name="deviceId" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$malfunction->capName}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="color: white">اسم الفرع </label>
                    <input type="text" name="deviceId" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$malfunction->branch->name}}" disabled>
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white">رقم الجهاز</label>
                <input type="text" name="deviceId" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$malfunction->deviceId}}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: white">وصف العطل</label>
                <textarea class="form-control" name="des" id="exampleFormControlTextarea1" rows="3" disabled>{{$malfunction->description}}</textarea>
            </div>

        </form>
    </div>
@endsection
