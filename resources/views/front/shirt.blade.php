@extends('layouts.main')

@section('title','shirt')

@section('content')
    <br>
    <br>
    <br>

    @if($detect == true)
        <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large purple">
                <i class="large material-icons">call</i>
            </a>
            <ul>
                <li><a href="https://api.whatsapp.com/send?phone=+256702277475" class="btn-floating green"><i class="fa fa-whatsapp"></i></a></li>
                <li><a href="mailto:marketing@whitefalconug.com?subject=inquries%20to%20white%20falcon" class="btn-floating red"><i class="fa fa-envelope"></i></a></li>
                <li><a href="tel:+256774115475" class="btn-floating orange"><i class="fa fa-phone"></i></a></li>
                <li><a href="smsto:+256774115475" class="btn-floating blue"><i class="fa fa-envelope-o"></i></a></li>


            </ul>
        </div>
    @endif

    <!-- products listing -->
    <!-- Latest SHirts -->
@foreach($shirts as $shirt)


<div class="row">
        @forelse($shirts as $shirt)
        
  <div class="col s12 m7 l7">

      <div class="card hoverable">
          <br>
          <p> <h3 class="center-align"> {{$shirt->title}}</h3> </p>
          <div class="card-content">
              <div class="card-image waves-block waves-light">
                  <img  class="materialboxed" width="250" src="{{url('images/thumbs',$shirt->image_link)}}">
              </div>

          </div>


      </div>
  </div>





 <div class="col s12 m5 l5">
     <div class="card">

         <div class="card-content">

             <p><b>Name </b> : {{$shirt->title}}</p>

             <p> <b>Size </b>  : 11inches</p>

         </div>


     </div>

 </div>

</div>

        @empty
        <h3>No shirts</h3>
       @endforelse


@endforeach
   

@endsection
<script>
    $('#zoom_01').elevateZoom({
    zoomType: "inner",
cursor: "crosshair",
zoomWindowFadeIn: 500,
zoomWindowFadeOut: 750
   }); 
</script>