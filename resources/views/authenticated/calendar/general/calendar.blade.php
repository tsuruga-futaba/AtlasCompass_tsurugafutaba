@extends('layouts.sidebar')

@section('content')
<div class="" style="background:#ECF1F6;">
  <div class="border pb-5" style="border-radius:5px; border:none !important; margin:1% 3%;">
    <div class=" m-auto border box_flame " style="border-radius:5px; background: #FFF !important">

      <p class="text-center date_text_title">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
      <div class="text-right m-3" style="margin-left: 11%;">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts" style="margin-top: 2%;">
    </div>
    </div>
  </div>
</div>
<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal__bg ">
    <!-- js-modal-closeを削除 -->
    <div class="modal__content">
      <form action="{{ route('deleteParts') }}" method="post" id="reserveParts">
        <div class="w-100">
          <p>予約日 :<span class="modal-inner-date"></span></p>
          <p>時間 :<span class="modal-inner-part"></span></p>
          <p>上記の予約をキャンセルしてもよろしいですか？</p>
          <div class="w-50 m-auto edit-modal-btn d-flex">
            <a class="js-modal-close btn btn-danger d-inline-block delete-modal-hidden" href="">閉じる</a>
            <!-- 予約日（setting_reserve）と予約日（setting_part）のデータを送りたい -->
            <input type="hidden" class="delete-modal-hidden modal-date" name="date" >
            <input type="hidden" class="delete-modal-hidden modal-part" name="part" >
            <input type="submit" class="btn btn-primary d-block" value="キャンセル">
          </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
@endsection
