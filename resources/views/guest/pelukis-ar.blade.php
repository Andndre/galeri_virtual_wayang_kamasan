@extends('layouts.ar')

@section('lukisans')
<script>
    @foreach ($lukisans as $lukisan)
        var lukisan{{ $loop->iteration }} = $lukisan->image;
    @endforeach
</script>
@endsection
