@extends('layouts.app')

@section('content')
<style>
h1 {   
  animation: blink 400ms alternate infinite;
}

@keyframes blink {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
</style>
<meta http-equiv="refresh" content="0; URL='/'" />
<div class="alert alert-success text-center ml-5 mr-5">
    <h1>Перенаправление...</h1>
</div>
@endsection
