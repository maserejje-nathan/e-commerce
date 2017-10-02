@extends('layouts.main')
@section('content')

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


@if($detect == true)

  <div class="carousel">


      @foreach($slides as $slide)
      <div class="carousel-item" href="#one!">
          @if($slide->product_id ==0)
              <a href="#"> <img src="{{url('images/slides/'.$slide->image)}}"></a>
          @else
        <a href="{{route('shirt',$slide->product_id)}}"> <img style="height: 100%; width: 100%" src="{{url('images/slides/'.$slide->image)}}"></a>

          @endif
      </div>
      @endforeach

  </div>

  @else

    <!-- Swiper -->

    <div class="swiper-container">

        <div class="swiper-wrapper wrapper">
            @foreach($slides as $slide)
            <div class="swiper-slide"> <h4>{{$slide->title}}</h4>
             <div class='description'><p class='description_content tlt2'style="color: purple;">{{$slide->description}}</p></div>
                <a href="#"> <img  src="{{url('images/slides/'.$slide->image)}}"></a>
            </div>
            @endforeach
        </div>

            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->

    </div>

    <!--

    <div class="carousel carousel-slider center" data-indicators="true">

        @foreach($slides as $slide)
        <div class="carousel-item" href="#one!">
            <img  src="{{url('images/slides/'.$slide->image)}}">
            <div class="carousel-fixed-item center"><h2 class="white-text">{{$slide->title}}</h2>
                @if($slide->product_id ==0)
                    <p class="white-text">{{$slide->description}}</p>
                @else
                <a href="{{route('shirt',$slide->product_id)}}" class="btn waves-effect purple white-text darken-text-2">View Product</a>
                <p class="white-text">{{$slide->description}}</p>
                @endif
            </div>

        </div>
        @endforeach

    </div>

    -->






@endif
    <!-- Latest SHirts -->

<div class="row">
    <div class="col s12 m3 l3">
     <div class="card-panel purple">
          <span class="white-text " style="text-align: center;">
              <i class="fa fa-recycle fa-5x"> </i><br>
              <a href="warranty"><h4  style="color: white;" > Warranty </h4></a>
          </span>
        </div>
    </div>
     <div class="col s12 m3 l3"> 
     <div class="card-panel yellow">
          <span class="white-text" style="text-align: center;">
              <i class="fa fa-truck fa-5x"> </i><br>
              <a href="deliver"><h4  style="color: white"> Home Delivery </h4></a>
          </span>
        </div>
    </div>
      <div class="col s12 m3 l3"> <div class="card-panel pink">
         <span class="white-text" style="text-align:center;">
              <i  class="fa fa-lock fa-5x"> </i><br>
              <a href="secure"><h4  style="color: white"> Secure Payment </h4></a>
          </span>
        </div></div>
       <div class="col s12 m3 l3"> <div class="card-panel blue">
          <span class="white-text" style="text-align:  center;">
              <i class="fa fa-gift fa-5x"> </i><br>
              <a href="shirts"><h4  style="color: white"> Quality Products </h4></a>
          </span>
        </div></div>

</div>



<div class="row">
<div class="card">

  <div class="card-content center"><h5> <em> Latest Products</em> </h5></div>

 </div>
        @forelse($shirts->chunk(4) as $chunk)
            @foreach($chunk as $shirt)

<div class="col s12 m4 l4">

  <div class="card hover-reveal">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="{{url('images/thumbs/small/',$shirt->thumb)}}">
    </div>
      <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">{{$shirt->title}}</span>
      </div>
      <div class="card-action">
          <span class="chip">
              PRICE :<b>UGX {{ number_format($shirt->price)}} </b>

          </span>


      </div>

      <div class="card-reveal">
      <span class="card-title activator grey-text text-darken-4"> {{$shirt->title}} <i class="material-icons right">close</i></span>
          <p>Brand: {{$shirt->brand}}</p>
          <p>Quantity in stock: {{$shirt->availability}}</p>
          <p>Description: {{$shirt->description}}</p>

          <a class="col s12 m5 l5 btn btn-large waves-effect waves-light purple btn pulse " href="{{route('cart.addItem',$shirt->id)}}">Add to Cart</a>
          <div class="col m2 l2"></div>
          <a href="{{route('shirt',$shirt->id)}}" class="col s12 m5 l5 btn btn-large waves-effect waves-light purple"> view Details </a>
      </div>

  </div>
</div>
        @endforeach
    @empty
        <h3>No Products stored</h3>
    @endforelse
</div>


    <div class="row">
        <div class="col s12 m12 l12">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header active"><i class="material-icons">settings_cell</i>Services</div>
                    <div class="collapsible-body">
                        <div class="card z-depth-2">

                            <div class="card-content">


                                <div class="row">



                                    @foreach($services as $svr)


                                        <div class="col s12 m4 l4">
                                            <ul class="collection with-header">
                                                <li class="collection-header"><h5>{{$svr->name}}</h5></li>
                                                <li class="collection-item"><div><img src="{{url('images/thumbs',$svr->image)}}"><a href="#!" class="secondary-content"></a></div></li>
                                                <li class="collection-item"><div>{{$svr->description}}<a href="#!" class="secondary-content"></a></div></li>
                                                <li class="collection-item"><div>UGX {{$svr->price}}/=<a href="#!" class="secondary-content"></a></div></li>

                                            </ul>
                                        </div>



                                    @endforeach

                                </div>



                            </div>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">mail</i> Contact Us </div>
                    <div class="collapsible-body">

                        <div class="card z-depth-2">

                            <div class="card-content">


                                <div class="row">

                                    <div class="col s12 m2 l2">
                                        Contact Us
                                    </div>

                                    <div class="col s12 m8 l8">
                                        <form class="col s12" method="POST"  action="{{ url('/contact') }}">
                                            {{ csrf_field() }}

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input type="text" class="validate" name="fname">
                                                    <label>First Name</label>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input type="text" class="validate" name="lname">
                                                    <label>Last Name</label>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input  type="email" class="validate" name="mail">
                                                    <label>Email Address</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <textarea id="textarea1" class="materialize-textarea" name="message"></textarea>
                                                    <label for="textarea1">Your Message</label>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <button class="btn waves-effect waves-light purple" type="submit" name="action">Send Message
                                                </button>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="col s12 m2 l2">

                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </li>
            </ul>

        </div>


        </div>





    <br>



    <!-- Footer -->
    <br>

@endsection