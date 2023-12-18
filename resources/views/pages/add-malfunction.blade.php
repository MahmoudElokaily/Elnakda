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
@endsection
@section("content")
    <div class="container col-md-9 mt-5">
        <form action="{{route("store-malfunction" , ["branchId" => $branchId])}}" method="post">
            <legend style="color: white">اضافة جهاز</legend>
            @csrf
          <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white">رقم الجهاز</label>
                <input type="text" name="deviceId" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white">رقم السيريال</label>
                <input type="text" name="serialNum" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: white">وسف العطل (اختياري)</label>
                <textarea class="form-control" name="des" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="color: white">اضافة</button>
        </form>
    </div>
@endsection

