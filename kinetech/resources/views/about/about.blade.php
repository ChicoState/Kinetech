@extends('layout.layout')
@section('about')

<style>
  .member a{cursor:pointer;}
  .member .hide{display:none;}
</style>

<script>
  $(document).ready(function(){
    $(".member>a").click(function(){
      $(this).next("ul").toggleClass("hide");
    });
  });
</script>




<div class="row container">
  <div class="offset-xs-2 offset-sm-2 offset-md-2 offset-lg-2 col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center p-5">
    <h2 style="color:grey;">Kinetech </h2>
    <h4>comments<br />
      comments<br />
      comments<br />
      comments<br />
    </h4>
    <h2 style="color:grey;">Vision</h2>
    <h4>comments<br />
      comments<br />
      comments<br />
      comments<br />
    </h4>
    <h2 style="color:grey;">Members </h2>
  </div>
    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face1.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>Andy Do</h3></a>
          <ul class ="hide">
            <li>Andy Do is a senior at California State University,<br />
                    Chico, where he is working on attaining his BA<br/>
                    in Business Entrepreneurship and Business Marketing.<br />
                    Aside from working with KineTech, he is actively <br />
                    involved in several startups as well as professional<br />
                    and social organizations and spends the little free<br />
                    time he has playing tennis or attending music and<br />
                    art events all around!</li>
          </ul>
        </li>
      </ul>
    </div>

    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face2.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>Casey Roof</h3></a>
          <ul class ="hide">
            <li>Casey Roof is a senior at California State University,<br />
                Chico, where he is working on attaining his BA in<br />
                Business Entrepreneurship and Small Business<br />
                Management. Aside from KineTech, he is actively<br />
                involved in several local startups and moonlights<br />
                as an amateur Brazilian  Jiu-Jitsu competitor.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face3.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>David Hines</h3></a>
          <ul class ="hide">
            <li>David Hines is a senior at California State University,<br />
                Chico, where he is working on attaining his BA in<br />
                Business Entrepreneurship. Aside from working with<br />
                KineTech, he is an Eagle Scout and an avid craft beer<br />
                enthusiast who loves to backpack all around the world.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face4.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>Elliott Allmann</h3></a>
          <ul class ="hide">
            <li>Elliott Allmann is a senior at California State University,<br />
                Chico, where he is working on attaining his BA in<br />
                Computer Science.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face5.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>Jordan Laney</h3></a>
          <ul class ="hide">
            <li>Jordan Laney is a senior at California State University,<br />
                Chico, where he is working on attaining his BA in<br />
                Computer Science.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face6.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>Max Schimm</h3></a>
          <ul class ="hide">
            <li>Max Schimm is a senior at California State University,<br />
                Chico, where he is working on attaining his BA in<br />
                Computer Science.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face7.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>Brian Sullivan</h3></a>
          <ul class ="hide">
            <li>Brian Sullivan is a senior at California State University,<br />
                Chico, where he is working on attaining his BA in<br />
                Computer Engineering.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div style="border: 1px solid gold; float: left; width: 50%; padding: 10px">
      <img class="img-fluid rounded" alt="member image" src="{{url('imgs/face8.jpg')}}" style="width:200;height:200">
      <ul>
        <li class ="member">
          <a><h3>Myungjin Bae</h3></a>
          <ul class ="hide">
            <li>Myungjin Bae is a senior at California State University,<br />
                Chico, where he is working on attaining his BA in<br />
                Computer Science. He is from South Korea after<br />
                military service, and love soccer.</li>
          </ul>
        </li>
      </ul>
    </div>

</div>

@endsection
