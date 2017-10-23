@extends('layout.layout')
@section('home')
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
  <img class="img-fluid rounded" alt="KineTech Logo" src="{{url('imgs/KineTech.png')}}">
</div>
		<h1 class="row justify-content-center">
      Welcome
		</h1>
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">
        <h5>
          What is KineTech?
        </h5>
        <p style="color:#3280AA;">
          KineTech is a company that has developed a rechargeable
          phone case that has a swappable battery feature.
        </p>
        <h5>
          What does KineTech have for you?
        </h5>
        <p style="color:#3280AA;">
          Currently, KineTech is working on a prototype case for an iPhone7 battery case.
        </p>
      </div>
    </div>
</div>

@endsection
