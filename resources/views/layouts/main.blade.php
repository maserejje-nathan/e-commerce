<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', '') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{url('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.umd.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/textillate/0.4.0/jquery.textillate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.2.0/jquery.fittext.min.js"></script>

    <script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
    </script>

    <script type="text/javascript">

    $( document ).ready(function(){


        $('select').material_select();

        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            spaceBetween: 60,
            centeredSlides: true,
            autoplay: 6500,
            autoplayDisableOnInteraction: false
        });

        $('.tlt').textillate({
            in: {
                effect: 'fadeInLeftBig',
                delayScale: 1,
                delay: 70,
                sync: true,
                shuffle: true
            },

            out: {
                effect: 'fadeOutRightBig',
                shuffle: true,
                sync: true
            },
            loop: true
        });

        $('.tlt2').textillate({
            in: {
                effect: 'fadeInRightBig',
                delayScale: 3,
                delay: 70,
                sync: true,
                shuffle: true
            },
            out: {
                effect: 'fadeOutLeftBig',
                shuffle: true,
                sync: true
            },
            loop: true
        });

        $('.materialboxed').materialbox();

        $(document).on('click.card', '.card', function (e) {
            if ($(this).find('> .card-reveal').length) {
                if ($(e.target).is($('.card-reveal .card-title')) || $(e.target).is($('.card-reveal .card-title i'))) {
                    // Make Reveal animate down and display none
                    $(this).find('.card-reveal').velocity(
                        {translateY: 0}, {
                            duration: 225,
                            queue: false,
                            easing: 'easeInOutQuad',
                            complete: function() { $(this).css({ display: 'none'}); }
                        }
                    );
                    $(this).find('.card-content>span').attr('style', '');
                }
                else if ($(e.target).is($('.card .activator')) ||
                    $(e.target).is($('.card .activator i')) ) {
                    $(e.target).closest('.card').css('overflow', 'hidden');
                    $(this).find('.card-reveal').css({ display: 'block'}).velocity("stop", false).velocity({translateY: '-100%'}, {duration: 300, queue: false, easing: 'easeInOutQuad'});
                    $(this).find('.card-content>span').attr('style', 'color: rgba(0,0,0,0) !important');
                }
            }

            $('.card-reveal').closest('.card').css('overflow', 'hidden');

        });



        // Make Reveal animate up and display when mouseenter
        $(document).on('mouseenter.hover-reveal','.hover-reveal', function (e){
            $(e.target).closest('.card').css('overflow', 'hidden');
            $(this).find('.card-content>span').attr('style', 'color: rgba(0,0,0,0) !important');
            $(this).find('.card-reveal').css({ display: 'block'})
                .velocity("stop", false)
                .velocity({translateY: '-100%'},
                    {duration: 300,
                        queue: false,
                        easing: 'easeInOutQuad'});
        });

        // Make Reveal animate down and display none when mouseleave
        $(document).on('mouseleave.hover-reveal','.hover-reveal', function (e){
            $(this).find('.card-reveal').velocity(
                {translateY: 0}, {
                    duration: 225,
                    queue: false,
                    easing: 'easeInOutQuad',
                    complete: function() { $(this).css({ display: 'none'}); }
                }
            );
            $(this).find('.card-content>span').attr('style', '');
        });

        $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        $('.collapsible').collapsible();
        Materialize.updateTextFields();
        $('.carousel').carousel();
        $('.carousel.carousel-slider').carousel({fullWidth: true});
        $('ul.tabs').tabs('select_tab', 'tab_id');

    Materialize.scrollFire(options);
          
    })
        
        // Initialize collapse button
  

    </script>






    <style>
        .card-reveal{
            color: #ffffff;
            background-color: rgba(0,0,0,0.7) !important;
        }
        div.card-reveal span.card-title{
            color: #ffffff !important;
        }
        .tabs{
            background-color: transparent;
        }
        td, th{
            padding: 5px 5px !important;
        }
        table.highlight>tbody>tr:hover{
            background-color: rgba(238,110,115,0.6);
        }
        input[type=search]:focus{
            border-bottom: 1px solid #ee6e73 !important;
            box-shadow: 0 1px 0 0 #ee6e73 !important;
        }

        html, body {
            position: relative;
            height: 100%;
        }
        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color:#000;
            margin: 0;
            padding: 0;
        }
        .swiper-container {
            width: 100%;
            height: 400px;

        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;

        }

    </style>
   
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1925381054346451";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<div class="navbar">
    <nav>
        <div class="nav-wrapper" style="background-color: #a02c8c;">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

      <ul class="left hide-on-med-and-down">
          <li>  <img src="{{url('images/logo.PNG')}}"> </li>
          <li>
              <a href="/">Home <i class="material-icons right">home</i></a>
          </li>

          <li>
              <a href="services">Services <i class="material-icons right">settings_cell</i></a>
          </li>

          <li>
              <a href="questions">Faqs <i class="material-icons right">help</i></a>
          </li>

          <li>
              <a href="{{route('shirts')}}"> <i class="material-icons right">devices_other</i> Products </a>
          </li>

         <li>
                <a href="{{route('cart.index')}}">
                Cart
                    <span class="new badge red">{{Cart::count()}}</span>
                    <i class="material-icons right">add_shopping_cart</i>

                </a>
        </li>


          <li><a href="{{ url('/about') }}">About Us</a></li>
      </ul>
          <ul class="right hide-on-med-and-down">
        <li>

            <form action="{{route('search')}}" method="POST">
                    <div class="input-field">
                      <input id="searchitem" type="search" name="searchitem">

                        {!! csrf_field() !!}

                      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                      <i class="material-icons">close</i>
                    </div>
            </form>

        </li>
            @if (Auth::guest())

          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li>

          @else
              <li>
                  <a class="dropdown-button btn  purple" href="#" data-activates='dropdown1'> {{ Auth::user()->name }} </a>

                  <ul id='dropdown1' class='dropdown-content'>
                      <li class="divider">Profile</li>
                      <li class="divider"></li>
                      <li><a href="/logout"><i class="material-icons right">mood_bad</i> logout </a></li>

                  </ul>
              </li>
          @endif
          </ul>



      <ul class="side-nav" id="mobile-demo">



       <li>
                <a href="{{route('cart.index')}}">
                Cart
                    <span class="new badge red">{{Cart::count()}}</span>
                    <i class="material-icons right">add_shopping_cart</i>
                    
                </a>
        </li>

        <li><a href="{{route('shirts')}}"> <i class="material-icons right">devices_other</i> Products </a>
            </li>
          <li><a href="{{ url('/about') }}">About Us</a></li>


        <li>
            <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
        </li>

          @if (Auth::guest())

              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>

          @else
              <li>
                  <a href="#"> {{ Auth::user()->name }} </a>
              </li>
          @endif

      </ul>
        </div>
    </nav>
</div>
   @yield('content')
        <footer class="page-footer grey darken-4">

            <div class="row">
              <div class="col m4 l4 s12">
                <h5 class="white-text">White Falcon Company Limited</h5>
                <p class="grey-text text-lighten-4">We have Price friendly & Durable laptops both New and Used, Computer appliances & Television Screens in Kampala and Uganda at Large</p>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <a href="https://www.facebook.com/WhiteFalconCompanyLtd/" class="btn-floating btn-large waves-effect waves-light indigo darken-4" target="blank"><i class="fa fa-facebook"></i></a>
                  <a href="" class="btn-floating btn-large waves-effect waves-light blue accent-2"><i class="fa fa-twitter"></i></a>
                  <a href="" class="btn-floating btn-large waves-effect waves-light red" target="blank"><i class="fa fa-google-plus"></i></a>
                  <a href="https://www.instagram.com/white_falcon_kampala/" class="btn-floating btn-large waves-effect waves-light grey" target="blank"><i class="fa fa-instagram"></i></a>


              </div>
              <div class="col l3 m3 s12">
               
                <ul>
                    <li><a class="grey-text text-lighten-3" href="{{route('shirts')}}">Products</a></li>
                  <li><a class="grey-text text-lighten-3" href="{{ url('/about') }}">About us</a></li>

                    <li>
                        <br>
                        <br>
                        News Letter Subscription
                        <div class="row">
                        <form class="col s12" method="POST"  action="{{ url('/newsletter') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="input-field col s12">
                                    <input  type="email" class="validate" name="mail">
                                    <label>Email Address</label>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn waves-effect waves-light purple" type="submit" name="action">Subscribe
                                </button>
                            </div>
                        </form>
                        </div>
                    </li>
                </ul>
              </div>
                <div class="col s12 m5 l5">

                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="white-text">Facebook </h5>
                            <div class="fb-page" data-href="https://www.facebook.com/WhiteFalconCompanyLtd/" data-tabs="timeline" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WhiteFalconCompanyLtd/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/WhiteFalconCompanyLtd/">White Falcon Ltd</a></blockquote></div>
                        </div>


                        <div class="col s12 m6 l6">
                            <h5 class="white-text">Twitter</h5>
                            <a class="twitter-timeline" data-height="350" href="https://twitter.com/whitefalconkla">Tweets by whitefalconkla</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>

                    </div>

                </div>



            </div>
            <div class="row">
                <div class="col s12 m6 l6">
                    <a class="chip">Email:marketing@whitefalconug.com
                    </a>
                </div>

                <div class="col s12 m6 l6">
                    <a class="chip">
                        Tel - 0774115475 / 0702277475
                    </a>
                </div>

            </div>

          <div class="footer-copyright">
            <div class="row">

                <div class="col s12 offset-l4">
                    All rights reserved White Falcon Company limited  &copy; <?php echo date("Y"); ?>
                </div>


            </div>
          </div>
        </footer>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

</body>
</html>
