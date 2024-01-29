@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close">
    <div class="modal__content">
      <form action="{{ route('deleteParts') }}" method="post">
        <div class="w-100">
          <p>予約日 :<span class="modal-inner-date"></span></p>
          <p>時間 :<span class="modal-inner-part"></span></p>
          <p>上記の予約をキャンセルしてもよろしいですか？</p>
          <div class="w-50 m-auto edit-modal-btn d-flex">
            <a class="js-modal-close btn btn-danger d-inline-block delete-modal-hidden" href="">閉じる</a>
            <input type="hidden" class="delete-modal-hidden" name="post_id" value="id">
            <input type="submit" class="btn btn-primary d-block" value="キャンセル">
          </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
@endsection
