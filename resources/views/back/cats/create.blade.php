@extends('layouts.app')

@section('content')
<div class="container blade">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Travel</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('cats-store')}}" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label"><h4>Country</h4></label>
                            <input type="text" class="form-control" name="story_title" value={{old('story_title')}}>
                            <div class="form-text">Add Country</div>
                        </div>


                        <div class="mt-3 mb-3">
                            <label class="form-label"><h4>Hotel</h4></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="story"></textarea>
                            <div class="form-text">Add Hotel</div>
                        </div>

                       
                        <div class="mb-3">
                            <label class="form-label"><h4>Hotel Photos</h4></label>
                            {{-- <img src="https://www.nasa.gov/sites/default/files/thumbnails/image/sls_rocket.jpg" class="img-thumbnail foto form-control" alt="..."> --}}
                            {{-- <button type="submit" class="btn btn-primary mt-4 mb-4">Add picture</button> --}}
                            <div class="input-group">
                                <input type="file" class="form-control" name="photo">
                            </div>
                                {{-- <button class="btn btn-primary mt-3" type="button">Add picture</button> --}}
                             
                        </div>
                        

                        <div class="mb-3">
                            <label class="form-label "><h4>Travel Price</h4></label>
                            <input type="text" class="form-control sm" name="sum_colect" value=0>
                        </div>

                        <div class="buttons mb-2">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                       
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection