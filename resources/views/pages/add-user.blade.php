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
        <form action="{{route("store-user")}}" method="post">
            <legend style="color: white">اضافة مستخدم جديد</legend>
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white">الاسم</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white">اسم المستخدم</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white">مسئول عن</label>
                <select class="form-select" name="role" aria-label="Default select example" required>
                    <option value="user" selected>فرع</option>
                    <option value="admin">مديرية الامن</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: white">مسئول عن</label>
                <select class="form-select" name="branch_id" aria-label="Default select example" required>
                    @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" style="color: white">الرقم السري</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary w-100" style="color: white">اضافة</button>
        </form>
    </div>
@endsection
