@extends('layouts.sidebar')
@section('content')
<div class="w-75 m-auto box_flame" style="margin: 2% 6% !important;font-size:12px">
  <div class="w-100">
    <p class="date_text_title">{{ $calendar->getTitle() }}</p>
    {!! $calendar->render() !!}
  </div>
</div>
@endsection
