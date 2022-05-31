{{-- @extends('app', ['menu' => 'services', 'title' => "Dominican Shuttles fair price are for private, very reliable service."]) --}}
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


        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{URL::asset('img/slider01.jpg')}}" alt="DS Banner">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::asset('img/slider02.jpg')}}" alt="20 year banner">
                    <div class="carousel-caption">
                        
                    </div>
                </div>

                <div class="item">
                    <img src="{{URL::asset('img/slider03.jpg')}}" alt="Certificate">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::asset('img/slider05.jpg')}}" alt="Certificate">
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
        </div>
    <br>
    <br>
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <img src="{{ asset('images/slider/tripadvisor-banner-200.png') }}" class="img-responsive" alt="Cinque Terre">
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Search service') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['method' => 'GET', 'url' => '/charters-service', 'class' => '', 'role' => 'search'])  !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="to">{{ __('From') }}</label>
                                        {!! Form::select('from', App\Models\Location::where('is_airport', 1)->orderBy('location_name')->pluck('location_name', 'id'), null, ['id'=>'from_location', 'placeholder'=> __('Search From'), 'class'=>'form-control select2' ]) !!}
                                        <small id="toErrors" class="form-text text-danger">{{ $errors->first('to_location') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="to">{{ __('To') }}</label>
                                        {!! Form::select('to', App\Models\Location::where('is_airport', 1)->orderBy('location_name')->pluck('location_name', 'id'), null, ['id'=>'from_location', 'placeholder'=> __('Search To'), 'class'=>'form-control select2', 'onchange'=>'this.form.submit()' ]) !!}
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
                    <div class="box-footer">
                        {{-- <a href="{{ url('charters-results?route='.$item->fromlocation->location_name.'-to-'.$item->tolocation->location_name)}} " class="btn btn-primary">Book now</a> --}}
                    </div>
                    <!-- /.box-body -->
                    </div>
        </div>
    </div>
    @if ($request->get('from'))
    @if ($services->count() == 0)
    <h4 class="text-muted">Service not found. Try with another locations.</h4>
    @endif
    @foreach ($services as $item)
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><span class="text-muted">From</span> {{ $item->fromlocation['location_name'] }} <span class="text-muted">to</span> {{ $item->tolocation['location_name'] }}</h4>
                        </div>

                    </div>
            
                </div>
                <div class="box-footer">
                    <?php
                        $options = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
                        $i = 1;
                        $a = 0;
                    ?>
                    <div class="row">
                        @foreach ($aircrafts as $aircraft)
                        <div class="col-md-4">
                            <div class="box box-primary box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Option</h3>
                                </div>
                                <div class="box-body">
                                    <p class="">{{ $aircraft->name }}</p>
                                    <p>{{ $aircraft->pilot }} {{ $aircraft->pilot > 1 ? "Pilots" : "Pilot" }} + 
                                    {{ $aircraft->maxpassengers }} {{ $aircraft->maxpassengers > 1 ? "Passengers" : "Passenger"}} </p>
                                </div>
                                <div class="box-footer">
                                    <img src="{{ asset('airplains/'.$aircraft->picture_url) }} " alt="{{ $aircraft->name }}" class="img-responsive">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="{{URL::to('charters/request?from='.$item->fromlocation->id.'&to='.$item->tolocation->id.'&aircraft='.$aircraft->id)}}" class="btn btn-primary">Request</a>
                                </div>
                            </div>
                        <br>
                        </div>

                        @endforeach

                    </div>
                    {{-- <a href="{{ url('charters-results?route='.$item->fromlocation->location_name.'-to-'.$item->tolocation->location_name)}} " class="btn btn-primary">Book now</a> --}}
                </div>
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
    <div class="row">
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
        
@endsection