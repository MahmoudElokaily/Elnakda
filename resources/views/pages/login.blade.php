@extends("index")
@section("content")
   <div class="container col-md-9 mt-5">
       <form action="{{route("authenticate")}}" method="post">
           <legend style="color: white">تسجيل الدخول</legend>
           @csrf
           <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label" style="color: white">الاسم</label>
               <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mahmoud">
           </div>
           <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label" style="color: white">الرقم السري</label>
               <input type="password" name="password" class="form-control" id="exampleInputPassword1">
           </div>
           <button type="submit" class="btn btn-primary w-100" style="color: white">دخول</button>
       </form>
   </div>
@endsection

