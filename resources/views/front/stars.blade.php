<form action="{{route('cats-store')}}" method="post">
    <div class="stars">
        @for($i = 1; $i < 6; $i++) 
            <input name="hearts_count[]" type="checkbox" 
            id="_{{$i.'-'.$user->id}}" data-star="{{$i}}"
            {{$user->rate >= $i ? ' checked' : ''}}
            >
            <label class="star{{ ceil($user->rate) == $i && $user->rate != $i ? ' half' : ''}}" for="_{{$i.'-'.$user->id}}"></label>
        @endfor
        <div class="result">
            @if($user->rate)
            {{$user->rate}} <span>({{$user->votes}} votes)</span>
            @else($condition)
            {{-- <span>No rating yet</span> --}}
            @endif
        </div>
        @if($user->showVoteButton)
        <button type="submit" class="btn btn-info">Vote</button>
        @endif
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{$user->id}}">
    </div>
</form>
