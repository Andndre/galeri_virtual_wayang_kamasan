@extends('layouts.ar')

@section('lukisans')
<script>
    var lukisans = [
        @foreach ($lukisans as $lukisan)
        {
            image: "{{ asset('storage/' . $lukisan->image) }}",
            title: "{{ $lukisan->title }}",
            description: "{{ $lukisan->description }}"
        },
        @endforeach
    ]
</script>
@endsection

@section('nama.pelukis')
    {{ $pelukis->name }}
@endsection
