@if ($errors->any())
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="mt-4 alert alert-danger col-6 text-center" style="font-size: 24px;">
            <ul style="list-style: none; margin: 0; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif