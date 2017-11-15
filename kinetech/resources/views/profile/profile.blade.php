@extends('layout.layout')
@section('profile')
<!--<h1 class="row justify-content-center">
  Welcome
</h1>-->
<h3 class="mt-4" style="color:#3280AA;"> Hello, {{ $user['name'] }} </h3>

<div class="row mt-4 ml-1">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="row">
          <button onclick="changeUser()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button> 
          Username: {{ $user['name'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input class="mb-2" id="ChangeUserInput" style="height:24px; display:none">
          <button onclick="updateInfo()" id="ChangeUserCheck" style="display:none; width:24px; height:24px; color:green">
            <div>&#x2713;</div>
          </button>
          <button id="ChangeUserX" style="display:none; width:24px; height:24px; color:red">
            <div>&#10060;</div>
          </button>
      </div>
      <div class="row">
          <button onclick="changeEmail()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button> 
          Email: {{ $user['email'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input id="ChangeEmailInput" style="height:24px; display:none">
          <button id="ChangeEmailCheck" style="display:none; width:24px; height:24px; color:green">
            <div>&#x2713;</div>
          </button>
          <button id="ChangeEmailX" style="display:none; width:24px; height:24px; color:red;">
            <div>&#10060;</div>
          </button>
      </div>
  </div>
</div>

<script>
    function updateInfo(){
      var newName = $("#ChangeUserInput").val();
      var newEmail = $("#ChangeEmailInput").val();
      $.post('/updateProfile', { "id": {{ $user['id']}},
                                "username": newName,
                                "email": newEmail}, 
                                function(data){
                                  console.log(data);
                                }
      );
      window.location.reload();
    }

    function changeUser() {
      $("#ChangeUserInput").toggle();
      $("#ChangeUserCheck").toggle();
      $("#ChangeUserX").toggle();
      /*
        var x = document.getElementById("ChangeUserInput");
        if(x.style.display == "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        var y = document.getElementById("ChangeUserCheck");
        if(y.style.display == "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
        var z = document.getElementById("ChangeUserX");
        if(z.style.display == "none") {
            z.style.display = "block";
        } else {
            z.style.display = "none";
        }*/
    }
    function changeEmail() {
        var x = document.getElementById("ChangeEmailInput");
        if(x.style.display == "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        var y = document.getElementById("ChangeEmailCheck");
        if(y.style.display == "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
        var z = document.getElementById("ChangeEmailX");
        if(z.style.display == "none") {
            z.style.display = "block";
        } else {
            z.style.display = "none";
        }
    }

</script>

@endsection
