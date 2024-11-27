@extends('layouts.ar')

@section('lukisans')
<script>
    var lukisans = [
        @foreach ($lukisans as $lukisan)
        {
            image: "{{ $lukisan->image }}",
            description: "{{ $lukisan->description }}"
        },
        @endforeach
    ]
</script>
@endsection

@section('nama.pelukis')
    {{ $pelukis->name }}
@endsection
