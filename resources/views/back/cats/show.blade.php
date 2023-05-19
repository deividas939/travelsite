@extends('layouts.app')

@section('content')
<div class="container blade">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-3">
                <div class="card-header">
                    <h1>{{ $cat->story_title }}</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="card-body">


                            <div class="mt-3 mb-3">
                                <label class="form-label">
                                    <b>
                                        <h3>Hotel
                                    </b></h3>
                                </label>
                                <h4>{{ $cat->story }}</h4>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    <h4><b>Hotel Photos</b></h4>
                                </label>

                                {{-- //////////// --}}
                                {{-- @forelse($cats as $photo) --}}
                                <div class="list-group-item">

                                    <div class="image">
                                        @if ($cat->photo)
                                        <img src="{{ asset('/gallery') . '/' . $cat->photo }}">
                                        @else
                                        <img class="image" src="{{ asset('/gallery') . '/no_image.webp' }}">
                                        @endif
                                    </div>


                                    {{-- @empty --}}
                                    {{-- <li class="list-group-item">
                                        <div class="cat-line">No photo</div>
                                    </li> --}}
                                    {{-- @endforelse --}}

                                    {{-- //////////// --}}
                                    <div class="buttons mt-4">
                                        {{-- <button type="submit" class="btn btn-primary ">Submit photo</button> --}}
                                        <a href="{{ route('photos-createPhoto') }}" class="btn btn-primary">Photos</a>

                                    </div>
                                    {{-- @if(Auth::user()->role > 5)
                                    <form action="{{route('cats-addDonation', $cat)}}" method="post">

                                        <div class="mb-3">

                                            <input type="file" class="form-control" name='photo'>
                                        </div>

                                        ####### VIETA


                                        @csrf
                                        @method('post')
                                    </form>
                                    @endif --}}


                                    

                                </div>

                            

                                <div class="mb-3">
                                <br>
                                    <label class="form-label ">
                                        <h5>Price: {{ $cat->sum_colect }} Eur</h5>
                                    </label>
                                </div>

                               
                                <label class="mt-4 form-label">
                                    <h4><b>Ratings</b></h4>
                                </label>
                                <div>
                                    @include('front.stars')
                                    
                                    

                                </div>



                                <div class="mb-3">
                                   


                                    {{-- @if($cat->sum_present > 0 && $cat->person_money >0)
                                    @forelse($cats as $cat) 
                                    
                                    <div class="list-group-item">
                                        <h3>User name: "{{ $cat->person }}" donated {{ $cat->person_money }} Eur.</h3>
                                    </div>
                                    @empty
                                    <li class="list-group-item">
                                        <div class="cat-line">No stories</div>
                                    </li>
                                    @endforelse
                                    @else
                                    <h3>No donations yet.</h3>
                                    @endif --}}
                                    @if($cat->sum_present > 0)
        @forelse($cats as $donation) 
            @if($donation->person_money > 0)
                <div class="list-group-item">
                    <h4>User Name: "{{ $donation->person }}" set price {{ $donation->person_money }} Eur.</h4>
                </div>
            @endif
        @empty
            
        @endforelse
    @else
      
    @endif
                                </div>


                                @if(Auth::user()->role > 5)
                                <form action="{{route('cats-addDonation', $cat)}}" method="post">

                                    

                                    
                                    @csrf
                                    @method('post')
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </li>
        {{-- @empty
        <li class="list-group-item">
            <div class="cat-line">No stories</div>
        </li> --}}
        {{-- @endforelse --}}
        </ul>
    </div>
</div>
</div>
</div>
@endsection