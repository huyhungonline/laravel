@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
               @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                       {{$error}} <br>
                    @endforeach
                </div>
              @endif
              @if(session('mess'))
                <div class="alert alert-success">
                    {{session('mess')}}
                </div>
              @endif



                <form action="admin/user/edit_user/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>UserName</label>
                        <input class="form-control" name="userName" placeholder="Please Enter Username" value = "{{$user->name}}"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changePass" id = "changePass" >
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Please Enter Password" disabled />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" name="rePass" placeholder="Please Enter RePassword" disabled/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changeEmail" id = "changeEmail" >
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value = "{{$user->email}}" readonly />
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">

                            <input name="level" value="0"
                            @if($user->quyen == 0)
                              {{"checked"}}
                            @endif
                            type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1"
                            @if($user->quyen == 1)
                              {{"checked"}}
                            @endif
                            type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>

                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    $("#changePass").change(function(){
       if($(this).is(":checked")){
            $('input[name = pass]').removeAttr('disabled');
            $('input[name = rePass]').removeAttr('disabled');
       }else {
           $('input[name = pass]').attr('disabled',"");
           $('input[name = rePass]').attr('disabled',"");
       }
    });
    $("#changeEmail").change(function(){
       if($(this).is(":checked")){
          $("input[name = email]").attr("readonly", false);
       }else {
           $("input[name = email]").attr("readonly", true);

       }
    });
  });
  </script>
@endsection()
