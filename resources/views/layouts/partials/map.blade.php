@section('styles')
@endsection


<div class="rounded-1" id="map"></div>


@push('scripts')
    <!-- Scripts -->
    @vite(['resources/sass/map.scss', 'resources/js/map.js'])
@endpush
