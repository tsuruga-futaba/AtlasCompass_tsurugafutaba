@extends('layouts.sidebar')

@section('content')
<div class="w-75 m-auto box_flame" style="margin: 3% 6% !important; height:91% !important;">
  <div class="w-100">
    <p class="date_text_title">{{ $calendar->getTitle() }}</p>
    <p>{!! $calendar->render() !!}</p>
  </div>
</div>
@endsection
