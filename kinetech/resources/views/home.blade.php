@extends('layout.layout')
@section('home')
<!--<h1 class="row justify-content-center">
  Welcome
</h1>-->

<div class="row justify-content-center homeLogoDiv">
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <img class="img-fluid rounded" alt="KineTech Logo" src="{{url('imgs/KineTech.png')}}">
  </div>
</div>

<div class="container mt-4 mb-5">
  <div class="row justify-content-center">
    <div class="col-md justify-content-center text-center">
      <h5 style="color:#3280AA;">
        Why?
      </h5>
      <hr style="background-color:#FFFF95; height:1; width:80">
      <p>
        To keep your mobile device charged and you connected on-the-go without the hassle of carrying around wires and staying tethered to a portable charger. Allow yourself to truly live free from any limitations!
      </p>
    </div>
    <div class="col-md justify-content-center text-center">
      <h5 style="color:#3280AA;">
        What?
      </h5>
      <hr style="background-color:#FFFF95; height:1; width:80">
      <p>
        Voltanium battery cases by KineTech Electronics allows you to snap on and off portable power packs to keep you charged and connected on-the-go. Never worry about carrying wires and being tethered to a portable charger on-the-go again!
      </p>
    </div>
    <div class="col-md justify-content-center
    text-center">
      <h5 style="color:#3280AA;">
        How?
      </h5>
      <hr style="background-color:#FFFF95; height:1; width:80">
      <p>
        Our power packs are universally rechargeable with any micro-usb OR lightning cables as well as a Qi-wireless charging, giving you the benefit of always having at least one charged power pack to take with you where ever you go!
      </p>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div>
      <iframe width="427" height="240" src="https://www.youtube.com/embed/HfsH5mM9rxA" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
      <iframe width="427" height="240" src="https://www.youtube.com/embed/IPSRl2NfryI" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
</div>


<h2 class="mt-5" style="text-align:center;">
  iPhone7 Case Prototype
</h2>


<div class="mb-5">
  <div class="row">
    <div class="col">
      <img src="{{url('imgs/Iphone7_4.JPG')}}" class="img-fluid rounded py-5 mx-auto d-block" alt="Iphone Prototype" align="right" width="135px">
    </div>
    <div class="col">
      <img src="{{url('imgs/Iphone7_1.JPG')}}" class="img-fluid rounded py-5 mx-auto d-block" alt="Iphone Prototype" align="middle" width="292px;">
    </div>
    <div class="col">
      <img src="{{url('imgs/Iphone7_2.JPG')}}" class="img-fluid rounded py-5 mx-auto d-block" alt="Iphone Prototype" align="left" width="175px">
    </div>
  </div>
</div>

@endsection
