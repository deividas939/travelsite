@extends('layouts.app')

@section('content')
<div class="container blade">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Travels List</h1>
                </div>
                
                <ul class="list-group">
                    @forelse($cats as $cat)
                    <div class="list-group-item adminbtn">
                        @if($cat->photo)
                        <img class="index-img" src="{{ asset('/gallery') . '/' . $cat->photo }}"> 
                        @else <img class="image index-img" src="{{ asset('/gallery') . '/no_image.webp' }}">
                        @endif
                        <a class="link" href="{{route('cats-show', $cat)}}"><h5>Country: <b>{{ $cat->story_title }} </b>. Price: {{ $cat->sum_colect }} eur. @include('front.stars')</h5></a>
                        

                            <div class="adminbtn">
                                @if(Auth::user()->role < 5)
                                <form action="{{route('cats-delete', $cat)}}" method="post">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @csrf
                                    @method('delete')
                                </form>
                                @endif
                            </div>
                    </div>

                    

                        @empty
                    <li class="list-group-item">
                        <div class="cat-line">No Travels!</div>
                    </li>
                    @endforelse


                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection