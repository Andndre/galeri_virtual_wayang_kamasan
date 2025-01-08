@extends('layouts.ar')

@section('lukisans')
    <script>
        var lukisans = [
            @foreach ($lukisans as $lukisan)
                {
                    image: "{{ e($lukisan->image) }}",
                    description: "{{ e($lukisan->description) }}"
                },
            @endforeach
        ]
    </script>
@endsection

@section('nama.pelukis')
    {{ $pelukis->name }}
@endsection
