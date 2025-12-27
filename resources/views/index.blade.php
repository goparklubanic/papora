@extends('layouts.app')
@section('content')
<h1>Hi</h1>
<p id="test"></p>
@endsection
@section('scriptes')
<script>
    $(function() {
        console.log("✅ jQuery is working:", $.fn.jquery);
    });
</script>
@endsection