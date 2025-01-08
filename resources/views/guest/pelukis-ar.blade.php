@extends('layouts.ar')

@section('lukisans')
    <script>
        var lukisans = {!! json_encode($lukisans) !!};
    </script>
@endsection

@section('nama.pelukis')
    {{ $pelukis->name }}
@endsection
