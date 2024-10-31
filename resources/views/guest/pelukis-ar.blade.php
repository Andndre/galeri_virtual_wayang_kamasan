@extends('layouts.ar')

@section('lukisans')
<script>
    var lukisans = [
        @foreach ($lukisans as $lukisan)
            "{{ asset('storage/' . $lukisan->image) }}",
        @endforeach
    ]
</script>
@endsection
