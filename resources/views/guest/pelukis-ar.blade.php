@extends('layouts.ar')

@section('lukisans')
<script>
    @foreach ($lukisans as $lukisan)
        var lukisan{{ $loop->iteration }} = "{{ asset('storage/' . $lukisan->image) }}";
    @endforeach
</script>
@endsection
