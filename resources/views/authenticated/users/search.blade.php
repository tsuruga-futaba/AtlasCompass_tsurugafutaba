@extends('layouts.sidebar')

@section('content')
<!-- <p>ユーザー検索</p> -->
<div class="search_content w-100 d-flex ">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person box_flame p-3">
      <div>
        <span class="one_person_index">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span class="one_person_index">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span class="one_person_index">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span class="one_person_index">性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span class="one_person_index">性別 : </span><span>女</span>
        @else
        <span class="one_person_index">性別 : </span><span>その他</span>
        @endif
      </div>
      <div>
        <span class="one_person_index">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span class="one_person_index">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span class="one_person_index">権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span class="one_person_index">権限 : </span><span>講師(英語)</span>
        @else
        <span class="one_person_index">権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span class="one_person_index">選択科目 :
          @foreach($user->subjects as $subject)
          <span >{{$subject->subject}}</span>
          @endforeach
        </span>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area" style="width: 25vw;">
    <div class="">
      <p class="search_index_text" style="margin-top: 5%;">検索</p>
      <div>
        <input type="text" class="free_word search_text" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div>
        <label class="search_index_text">カテゴリ</label><br>
        <select form="userSearchRequest" name="category" class="search_text">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div>
        <label class="search_index_text">並び替え</label><br>
        <select name="updown" form="userSearchRequest" class="search_text">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="" style="margin-top: 3%;">
        <p class="search_conditions"><span class="search_index_text" >検索条件の追加</span></p>
        <div class="search_conditions_inner">
          <div>
            <label class="search_index_text">性別</label><br>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
          <div>
            <label class="search_index_text">権限</label><br>
            <select name="role" form="userSearchRequest" class="engineer search_text">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label class="search_index_text" style="margin: 3%;">選択科目</label><br>
            <div>
              <input type="checkbox" name="subjects[]" value="1" form="userSearchRequest" class="engineer">国語</input>
              <input type="checkbox" name="subjects[]" value="2" form="userSearchRequest" class="engineer">数学</input>
              <input type="checkbox" name="subjects[]" value="3" form="userSearchRequest" class="engineer">英語</input>
            </div>
          </div>
        </div>
      </div>
      <div>
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="btn bg-info search_btn">
      </div>
      <div>
        <input type="reset" value="リセット" form="userSearchRequest" class="reset_text">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
