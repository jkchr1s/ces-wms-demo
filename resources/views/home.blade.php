@extends('base')
@section('content')
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <h5>Loading app, please wait...</h5>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
<script type="text/javascript" src="{{ mix('js/spa.js') }}"></script>
@endpush
@endsection
