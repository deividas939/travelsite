@extends('layouts.app')

@section('content')
<div class="container blade">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Hotel Photos</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('photos-storeGal')}}" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label"><h4>Add New Photo</h4></label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>
                        <div class="buttons mb-2">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                        @csrf
                    </form>
                    @if(count($photos) > 0)
                        <div class="mt-5">
                            {{-- <h2>My Photos</h2> --}}
                            <div class="row">
                                @foreach($photos as $photo)
                                    <div class="col-4">
                                        <div class="card mt-3">
                                            <img src="{{ asset('/gallery') . '/' . $photo->photo }}" class="card-photo card-img-top" alt="...">
                                            <div class="card-body">
                                                <form action="{{ route('photos-deleteGal', $photo->id) }}" method="post" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="mt-5">
                            <p>No Photos Found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
