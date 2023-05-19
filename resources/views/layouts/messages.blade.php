@if (Session::has('ok'))
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="mt-4 alert alert-success col-6 text-center" style="font-size: 24px;">
            <ul style="list-style: none; margin: 0; padding: 0;">
                {{ Session::get('ok') }}
            </ul>
        </div>
    </div>
@endif
@if (Session::has('info'))
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="mt-4 alert alert-success col-6 text-center" style="font-size: 24px;">
            <ul style="list-style: none; margin: 0; padding: 0;">
                {{ Session::get('info') }}
            </ul>
        </div>
    </div>
@endif
