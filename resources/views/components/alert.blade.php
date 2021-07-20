@section('alert')
    <script>
        window.notyf.open({
            'type': '{{ $type }}',
            'message': '{{ $slot }}',
            'duration': 2000,
            'ripple': true,
            'dismissible': true
        });
    </script>
@endsection
