@extends('layouts.app', ['menu' => 'services', 'title' => "Dominican Shuttles fair price are for private, very reliable service."])

@section('content')
{{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{URL::asset('img/slider/ds.png')}}" class="d-block w-100" alt="DS Banner">
          </div>
          <div class="carousel-item">
            <img src="{{URL::asset('img/slider/20years.png')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{URL::asset('img/slider/tripadvisor.png')}}" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> --}}



        {{-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{URL::asset('img/slider/ds2.png')}}" alt="DS Banner">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::asset('img/slider/20years2.png')}}" alt="20 year banner">
                    <div class="carousel-caption">
                        
                    </div>
                </div>

                <div class="item">
                    <img src="{{URL::asset('img/slider/tripadvisor2.png')}}" alt="Certificate">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
                
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> --}}
    <br>
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <img src="{{ asset('images/slider/tripadvisor-banner-200.png') }}" class="img-responsive" alt="Cinque Terre">
            </div>
        </div>
    </div> --}}
    <div class="row hidden-md hidden-lg">
    <div class="box box-solid">
        <div class="box-body text-center">
            <img class="img-responsive" src="{{URL::asset('img/mbl-BannerSup-PorSubasta.png')}}" alt="Banner">
            
        </div>
    </div>
    </div>


    <div class="row">
        <div class="col-md-12">
                <div class="box box-solid box-primary" style="border:7px solid #3C8DBC"!important;>
                    {{-- <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Search service') }}</h3>
                    </div> --}}
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['method' => 'GET', 'url' => '/services', 'class' => '', 'role' => 'search'])  !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h4>{{ __('FROM - PICK UP LOCATION') }} <small class="hidden-xs hidden-sm">(Details in booking form)</small></h4>
                                        {{-- <label for="to">{{ __('From') }}</label> --}}
                                        {!! Form::select('from', App\Models\LocationAlias::orderBy('order_number', 'asc')->pluck('location_name', 'id'), null, ['id'=>'from_location', 'placeholder'=> __('Click for list or type first letters'), 'class'=>'form-control select2 border-blue', 'style'=>'width: 100% !important;']) !!}
                                        <small id="toErrors" class="form-text text-danger">{{ $errors->first('to_location') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h4>{{ __('TO - DROP OFF LOCATION') }} <small class="hidden-xs hidden-sm">(Details in booking form)</small></h4>
                                        {{-- <label for="to">{{ __('To') }}</label> --}}
                                        {!! Form::select('to', App\Models\LocationAlias::orderBy('order_number', 'asc')->pluck('location_name', 'id'), null, ['id'=>'from_location', 'placeholder'=> __('Click for list or type first letters'), 'class'=>'form-control select2 border-blue', 'onchange'=>'this.form.submit()', 'style'=>'width: 100% !important;']) !!}
                                        <small id="toErrors" class="form-text text-danger">{{ $errors->first('to_location') }}</small>
                                    </div>
                                </div>
                                {{-- <div class="col-md-2" style="margin-top: 25px;">
                                    <button class="btn btn-primary" type="submit" title="{{ __('Search')}}"><i class="fa fa-search"></i></button>
                                    <a class="btn btn-warning" href="{{ url('/services') }}" title="{{ __('Clear filters')}}" data-togle> <i class="fa fa-refresh" aria-hidden="true"></i> Clear</a>
                                </div> --}}
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                    </div>
        </div>
    </div>
    @if ($request->get('from'))
    {{-- <h4>From {{ $from_id->location_name }} From {{ $to_id->location_id }}</h4> --}}
    @if ($services->count() == 0)
    <h4 class="text-muted">Service not found. Try with another locations.</h4>
    @endif
    @foreach ($services as $item)
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 hidden-xs hidden-sm">
                            <h4><span class="text-muted">From</span> {{ $from_id->location_name }} <span class="text-muted">to</span> {{ $to_id->location_name }} </h4>
                        </div>

                        <div class="col-md-3">
                            <span class="text-success"><i class="fa fa-car" aria-hidden="true"></i> Driving time</span>: <strong>{{formatDrivingTime($item->driving_time)}}</strong>
                        </div>

                        {{-- <div class="col-md-3">
                            <span class="text-success"><i class="fa fa-users" aria-hidden="true"></i> 1 - 5 passengers</span>
                        </div> --}}
                    </div>
            
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=oneway&aFrom='.$from_id->id.'&aTo='.$to_id->id)}}">One Way (${{number_format($item->prices->first()['oneway_price'],2,'.',',')}})</a>
                        </div>
    
                        <div class="col-md-6">
                            <a class="btn btn-success btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=roundtrip&aFrom='.$from_id->id.'&aTo='.$to_id->id)}}">Round Trip (${{number_format($item->prices->first()['roundtrip_price'],2,'.',',')}})</a>
                        </div>

                    </div>
                </div>
                <!-- <div class="box-footer">
                    <img class="img-responsive" src="{{URL::asset('img/tripadvisor-banner-s.png')}}" alt="palm">
                </div>
                <div class="box-footer">
                    <iframe
                        width="100%"
                        height="450"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDGkozgjrmFAlSKsmNBkIu_iOeOKAEN9_g&origin={{$item->fromlocation['location_name'].', Dominican Republic'}}&destination={{$item->tolocation['location_name'].', Dominican Republic'}}" allowfullscreen>
                    </iframe>
                </div> -->
            </div>
        </div>
    </div>
    @endforeach
    
    

    {{-- <div class="row hidden-md hidden-lg hidden-xl">
        <div class="col-md-12">
            <h5>{{ __('Services') }}</h5>
        </div>
    
        <div class="col-md-12">
            @foreach ($services as $item)

            <div class="thumbnail">
                <div class="caption">
                    <p>{{ __('From')}} <strong>{{ $item->fromlocation['location_name'] }} </strong> {{ __('To')}} <strong>{{ $item->tolocation['location_name'] }}</strong></p>
                    <p>{{ __('Driving time') }}: <strong>{{formatDrivingTime($item->driving_time)}}</strong>
                            
                    </p>
                    <p>
                        <a class="btn btn-default btn-block" data-toggle="modal" data-target="#map{{ $item->id }}"><i class="fa fa-map" aria-hidden="true"></i> {{ __('See map') }} </a>
                        <a class="btn btn-success btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=oneway&aFrom=0'.'&aTo=0')}}">{{ __('One way') }} ${{number_format($item->prices->first()['oneway_price'],2,'.',',')}}</a>
                        <a class="btn btn-success btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=roundtrip&aFrom=0'.'&aTo=0')}}">{{ __('Round trip') }} ${{number_format($item->prices->first()['roundtrip_price'],2,'.',',')}}</a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
    {{-- /row --}}
    
   
    {{-- pagintaion --}}
    <div class="row hidden-xs hidden-sm">
        <div class="col-md-12">
            {{-- <div class="pagination">{!! $auctions->appends(['search' => Request::get('search')])->render() !!} </div> --}}
            <div class="pagination">{!! $services->links() !!}</div>
        </div>
    </div>
    @endif

    {{-- <div class="box box-solid">
        <div class="box-body text-center">
            <img class="img-responsive" style="max-height: 50px" src="{{URL::asset('img/payments_options.png')}}" alt="Payments">
        </div>
    </div> --}}
    
    <div class="box box-solid">
        <div class="box-body text-center hidden-xs hidden-sm">
            <img class="img-responsive" src="{{URL::asset('img/BannerSup-PorSubasta-02.png')}}" alt="Banner">
            
        </div>
    </div>

    <div class="box box-solid hidden-sm hidden-xs">
            <div class="box-body text-center">
                <img class="img-responsive" src="{{URL::asset('img/slider/ds2.png')}}" alt="DS">
                
            </div>
        </div>
                
        <div class="box box-solid  hidden-xs hidden-sm">
                <div class="box-body text-center">
                <img class="img-responsive" src="{{URL::asset('img/slider/20years2.png')}}" alt="20 years">
                    
                </div>
            </div>

    <div class="box box-solid hidden-sm hidden-xs">
        <div class="box-body">
            <p class="lead" style="font-weight:bold;"> Dominican Shuttles has been serving the tourist industry in the Dominican Republic since 2010. We are proud of our exceptional safety record and our highly acclaimed services. </p>
            <p>Our company is owner operated, prides itself on personalized services and we are always available to our customers.</p>
            <p>Dominican Shuttles services every airport and city in the country with charter aircrafts, helicopters and airplanes propeller driven and with shuttle and transfer land services. We also specialize in ferry services to Puerto Rico and Samana. We are known for our whales and ballenas tours and excursions by boat and airplane. Our locations of hotels, cities and airports is extensive and can be viewed in our drop- down data bases and the below lists of locations.</p>
            <p>We have our own fleet of vehicles and work with carefully vetted partners most of whom have been part of our transfer and tours team for many years. Our focus is on private and luxury transfers to and from all hotels, airports. We manage guests for airbnb.com, homeaway.com, hotels.com, expedia.com, viator.com, trivagio.com as well as private villa and apartment owners and management groups.</p>
            <p>We offer every tour in the country including the listed tours and excursions below.</p>
            <p>We pick up and drop of at all airports, hotels, restaurants, malls, shops, Airbnb, HomeAway, villas, apartments and community residences but even anywhere in the country our clients request.</p>
            <p>Our small aircraft charter services are the most popular in the country and service the island of Hispaniola, Haiti, Dominican Republic, Aruba and the entire Caribbean as listed below.</p>
            <p>Our reputation over the years has been honored repeatedly with Trip Advisor certifications and rewards and thousands of customer reviews. We are proud to have the highest retention rate in our industry; more than 35% of our business is repeat. Our customers book over their phones, on-line, via bookmarks or searches in Google, Firefox, Bing, Yahoo and other search engines. Our live chat is open 24 hours every day of the week and our email services reply usually within one hour. We also offer direct contact and of course phone services.</p> 
            <p>We pay careful attention to our vehicle safety standards with regular maintenance schedules and particular attention of tires, brakes, safety equipment and customer comfort which starts with driver training, includes temperature controls with high quality air conditioning, very good seating and optional catering in the vehicle. Our drivers are all family oriented, well groomed and love their work and their guests. </p>
            <p>We track and advise our partners and workshops on the proper maintenance of catalytic converters and we are careful to monitor exhaust and muffler quality and carbon emissions. We will not accept vehicles that do not meet high quality and carbon controls. </p>
            <p>Our team is Dominican, American, European and Chinese. We like to share the depth of our languages which include Spanish, English, German, French, Portuguese, Arabic, Italian, Chinese and Russian.</p>
            <p>With a balance of women who work in the management and administrative areas and men who work with the vehicles and as drivers our team is well rounded and very family oriented. </p>
            <p>You will enjoy our team and you will be with the safest company in the Dominican Republic. </p>      
            <p>Dominican Shuttles services all the major tourist areas such as Punta Cana, Bavaro, Macao, Cap Cana, Uvero Alto, Miches, Sabana de la Mar, La Romana, Bayahibe, Dominicus Beach, Juan Dolio, Boca Chica, Santo Domingo, Jarabacoa, Samana, Las Terrenas, Las Galeras, Cabrera, Rio San Juan, Cabarete, Sosua, Puerto Plata, Maimon, Cofresi, Luperon, as well as the major cities:  Santiago, San Pedro, San Francisco de Macoris, San Cristobal, Bani, La Vega, Nagua, etc.</p>          
            <p>We have a presence at, and service all major Dominican Airports:  Punta Cana International (PUJ), Santo Domingo’s Las Americas (SDQ), Santo Domingo’s La Isabela airport (JBQ), La Romana International (LRM), Santiago Aeropuerto del Cibao (STI), Puerto Plata Gregorio Luperon International (POP), as well as Samana’s El Catey International (AZS) and the smaller local Arroyo Barril airport (ABA).</p>
        </div>
    </div>
 
          
            
@endsection