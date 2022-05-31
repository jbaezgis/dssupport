@extends('app', ['menu' => 'services', 'title' => "Dominican Shuttles fair price are for private, very reliable service."])

@section('content')
<div class="container">
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
                        {!! Form::open(['method' => 'GET', 'url' => '/services', 'class' => '', 'role' => 'search'])  !!}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="to">{{ __('From') }}</label>
                                        {!! Form::select('from', App\Models\Location::orderBy('location_name')->pluck('location_name', 'id'), null, ['id'=>'from_location', 'placeholder'=> __('Search From'), 'class'=>'form-control select2' ]) !!}
                                        <small id="toErrors" class="form-text text-danger">{{ $errors->first('to_location') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="to">{{ __('To') }}</label>
                                        {!! Form::select('to', App\Models\Location::orderBy('location_name')->pluck('location_name', 'id'), null, ['id'=>'from_location', 'placeholder'=> __('Search To'), 'class'=>'form-control select2' ]) !!}
                                        <small id="toErrors" class="form-text text-danger">{{ $errors->first('to_location') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 20px;">
                                    <button class="btn btn-primary" type="submit" title="{{ __('Search')}}"><i class="fa fa-search"></i></button>
                                    <a class="btn btn-warning" href="{{ url('/services') }}" title="{{ __('Clear filters')}}" data-togle> <i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                    </div>
        </div>
    </div>
    @if ($request->get('from'))
    <div class="row">
        <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Results') }}</h3>
                    </div>
                    
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row hidden-xs hidden-sm">
                                <div class="col-md-12">
                                    <table class="table striped">
                                        <thead>
                                            <tr class="hidden-xs hidden-sm">
                                                <th>{{ __('From') }} </th>
                                                <th>{{ __('To') }} </th>
                                                <th>{{ __('Driving Time') }}</th>
                                                <th>{{ __('One Way') }}</th>
                                                <th>{{ __('Round Trip') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $item)
                                                <tr>
                                                    <td>{{ $item->fromlocation['location_name'] }} </td>
                                                    <td>{{ $item->tolocation['location_name'] }}</td>
                                                    <td>{{formatDrivingTime($item->driving_time)}}</td>
                                                    <td><a class="btn btn-success btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=oneway&aFrom=0'.'&aTo=0')}}">${{number_format($item->prices->first()['oneway_price'],2,'.',',')}}</a></td>
                                                    <td><a class="btn btn-success btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=roundtrip&aFrom=0'.'&aTo=0')}}">${{number_format($item->prices->first()['roundtrip_price'],2,'.',',')}}</a></td>
                                                </tr>
                            
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="map{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">{{ __('Map') }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            {{-- <iframe
                                                                width="100%"
                                                                height="450"
                                                                frameborder="0" style="border:0"
                                                                src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDGkozgjrmFAlSKsmNBkIu_iOeOKAEN9_g&origin={{$item->fromlocation['location_name'].', Dominican Republic'}}&destination={{$item->tolocation['location_name'].', Dominican Republic'}}" allowfullscreen>
                                                            </iframe> --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                            
                                </div>
                            </div>        
                </div><!-- /.box-body -->
            </div> <!-- /.box -->
        </div><!-- /.col -->
    </div>{{-- /row --}}

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><span class="text-muted">From</span> {{ $item->fromlocation['location_name'] }} <span class="text-muted">to</span> {{ $item->tolocation['location_name'] }}</h4>
                        </div>

                        <div class="col-md-3">
                            <span class="text-success"><i class="fa fa-car" aria-hidden="true"></i> Driving time</span>: <strong>{{formatDrivingTime($item->driving_time)}}</strong>
                        </div>

                        <div class="col-md-3">
                            <span class="text-success"><i class="fa fa-credit-card" aria-hidden="true"></i> Secure payment</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=oneway&aFrom=0'.'&aTo=0')}}">One Way (${{number_format($item->prices->first()['oneway_price'],2,'.',',')}})</a>
                        </div>
    
                        <div class="col-md-6">
                            <a class="btn btn-success btn-block" href="{{url('request-ground-transfer-service?service='.$item->id.'&way=roundtrip&aFrom=0'.'&aTo=0')}}">Round Trip (${{number_format($item->prices->first()['roundtrip_price'],2,'.',',')}})</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row hidden-md hidden-lg hidden-xl">
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
    </div>{{-- /row --}}
    
   
    {{-- pagintaion --}}
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="pagination">{!! $auctions->appends(['search' => Request::get('search')])->render() !!} </div> --}}
            <div class="pagination">{!! $services->links() !!}</div>
        </div>
    </div>
            
</div>
        
@endsection