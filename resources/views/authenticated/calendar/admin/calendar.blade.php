@extends('layouts.sidebar')

@section('content')
<div class="box_flame m-5 p-4 w-75">
  <div class="w-100">
    <p class="date_text_title">{{ $calendar->getTitle() }}</p>
    <p>{!! $calendar->render() !!}</p>
  </div>
</div>
@endsection
