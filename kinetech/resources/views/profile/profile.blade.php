@extends('layout.layout')
@section('profile')
<!--<h1 class="row justify-content-center">
  Welcome
</h1>-->
<h3 class="mt-4" style="color:#3280AA;"> Hello, {{ ucfirst($user['name']) }} </h3>

<div class="row mt-4 ml-1">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <!-- User Name -->
      <div class="row">
          <button onclick="changeUser()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button> 
          Username: {{ $user['name'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input class="mb-2" id="ChangeUserInput" style="height:24px; display:none" value="{{ $user['name'] }}">
          <button onclick="updateInfo()" id="ChangeUserCheck" style="display:none; width:24px; height:24px; color:green">
            <div>&#x2713;</div>
          </button>
          <button id="ChangeUserX" style="display:none; width:24px; height:24px; color:red">
            <div>&#10060;</div>
          </button>
      </div>

      <!-- User Email -->
      <div class="row">
          <button onclick="changeEmail()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button> 
          Email: {{ $user['email'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input id="ChangeEmailInput" style="height:24px; display:none" value="{{ $user['email'] }}">
          <button onclick="updateInfo()" id="ChangeEmailCheck" style="display:none; width:24px; height:24px; color:green">
            <div>&#x2713;</div>
          </button>
          <button id="ChangeEmailX" style="display:none; width:24px; height:24px; color:red;">
            <div>&#10060;</div>
          </button>
      </div>

      <!-- User Street Address -->
      <div class="row">
          <button onclick="changeAddress()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button> 
          Address: {{ $user['address'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input id="ChangeAddressInput" style="height:24px; display:none" value="{{ $user['address'] }}">
          <button onclick="updateInfo()" id="ChangeAddressCheck" style="display:none; width:24px; height:24px; color:green">
            <div>&#x2713;</div>
          </button>
          <button id="ChangeAddressX" style="display:none; width:24px; height:24px; color:red;">
            <div>&#10060;</div>
          </button>
      </div>

      <!-- User Apt. Number -->
      <div class="row">
          <button onclick="changeAptNumber()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button>
          Apartment Number: {{ $user['aptNumber'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input id="ChangeAptNumberInput" style="height:24px; display:none" value="{{ $user['aptNumber'] }}">
          <button onclick="updateInfo()" id="ChangeAptNumberCheck" style="display:none; width:24px; height:24px; color:green">
              <div>&#x2713;</div>
          </button>
          <button id="ChangeAptNumberX" style="display:none; width:24px; height:24px; color:red;">
              <div>&#10060;</div>
          </button>
      </div>

      <!-- User City -->
      <div class="row">
          <button onclick="changeCity()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button>
          City: {{ $user['city'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input id="ChangeCityInput" style="height:24px; display:none" value="{{ $user['city'] }}">
          <button onclick="updateInfo()" id="ChangeCityCheck" style="display:none; width:24px; height:24px; color:green">
              <div>&#x2713;</div>
          </button>
          <button id="ChangeCityX" style="display:none; width:24px; height:24px; color:red;">
              <div>&#10060;</div>
          </button>
      </div>

      <!-- User State -->
      <div class="row">
          <button onclick="changeState()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button>
          State: {{ $user['state'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input id="ChangeStateInput" style="height:24px; display:none" value="{{ $user['state'] }}">
          <button onclick="updateInfo()" id="ChangeStateCheck" style="display:none; width:24px; height:24px; color:green">
              <div>&#x2713;</div>
          </button>
          <button id="ChangeStateX" style="display:none; width:24px; height:24px; color:red;">
              <div>&#10060;</div>
          </button>
      </div>

      <!-- User Zip Code -->
      <div class="row">
          <button onclick="changeZipCode()" type="button" class="btn btn-sm btn-danger mr-2" style="border-radius:0px; height:20px; font-size:10px;">Edit</button>
          Zip Code: {{ $user['zipCode'] }}
      </div>
      <div class="row ml-5 mt-2">
          <input id="ChangeZipCodeInput" style="height:24px; display:none" value="{{ $user['zipCode'] }}">
          <button onclick="updateInfo()" id="ChangeZipCodeCheck" style="display:none; width:24px; height:24px; color:green">
              <div>&#x2713;</div>
          </button>
          <button id="ChangeZipCodeX" style="display:none; width:24px; height:24px; color:red;">
              <div>&#10060;</div>
          </button>
      </div>

      @if($user['is_admin'] == 1)
        <div>
         <a href="/addProduct"> New Item </a>
         <a href="/updateProduct"> Update Item </a>
        </div>
      @endif

      <div>
          <a href="/viewOrders"> View My Orders! </a>
      </div>
  </div>
</div>

<script>
    function updateInfo(){

      var newName = $("#ChangeUserInput").val();
      var newEmail = $("#ChangeEmailInput").val();
      var newAddress = $("#ChangeAddressInput").val();
      var newAptNumber = $("#ChangeAptNumberInput").val();
      var newCity = $("#ChangeCityInput").val();
      var newState = $("#ChangeStateInput").val();
      var newZip = $("#ChangeZipCodeInput").val();

      $.post('/updateProfile', { "id": {{ $user['id']}},
                                "username": newName,
                                "email": newEmail,
                                "address": newAddress,
                                "aptNumber": newAptNumber,
                                "city": newCity,
                                "state": newState,
                                "zip": newZip
                              }
      );
      window.location.reload();
    }

    function changeUser() {
      $("#ChangeUserInput").toggle();
      $("#ChangeUserCheck").toggle();
      $("#ChangeUserX").toggle();
    }

    function changeEmail() {
      $("#ChangeEmailInput").toggle();
      $("#ChangeEmailCheck").toggle();
      $("#ChangeEmailX").toggle();
    }

    function changeAddress() {
      $("#ChangeAddressInput").toggle();
      $("#ChangeAddressCheck").toggle();
      $("#ChangeAddressX").toggle();
    }

    function changeAptNumber() {
        $("#ChangeAptNumberInput").toggle();
        $("#ChangeAptNumberCheck").toggle();
        $("#ChangeAptNumberX").toggle();
    }

    function changeCity() {
        $("#ChangeCityInput").toggle();
        $("#ChangeCityCheck").toggle();
        $("#ChangeCityX").toggle();
    }

    function changeState() {
        $("#ChangeStateInput").toggle();
        $("#ChangeStateCheck").toggle();
        $("#ChangeStateX").toggle();
    }

    function changeZipCode() {
        $("#ChangeZipCodeInput").toggle();
        $("#ChangeZipCodeCheck").toggle();
        $("#ChangeZipCodeX").toggle();
    }

</script>

@endsection
