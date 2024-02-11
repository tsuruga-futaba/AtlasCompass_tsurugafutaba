@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    @if(!isset($sub_category_name))
    <p class="w-75 m-auto">投稿一覧</p>
    <div class="post_wrapper">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3 box_flame">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p  class="post_title"><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <!-- サブカテゴリ・コメント・ハートは横並び -->
      <div class="post_bottom_area d-flex">
        <!-- <div class="d-flex post_status"> -->
          <!-- サブカテゴリー -->
          @foreach($post->subCategories as $subCategory)
          <div style="flex:2; justify-content:flex-end;">
            <p class="btn bg-info sub_category_tag">{{$subCategory->sub_category}}</p>
          </div>
          @endforeach
          <!-- コメント -->
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">  {{\App\Models\Posts\Post::commentCounts($post->id)}}</span>
          </div>
          <!-- いいね -->
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"> {{ \App\Models\Posts\Like::likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"> {{ \App\Models\Posts\Like::likeCounts($post->id) }}</span></p>
            @endif
          </div>
        <!-- </div> -->
      </div>
    </div>
    @endforeach
    </div>
    @else
    <p class="w-75 m-auto">{{$sub_category_name}}の投稿一覧 </p>
    <div class="post_wrapper">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p class="post_title"><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <!-- <div class="d-flex post_status"> -->
          <!-- サブカテゴリー -->
          @foreach($post->subCategories as $subCategory)
          <div style="flex: 2;">
            <p class="btn bg-info sub_category_tag">{{$subCategory->sub_category}}</p>
          </div>
          @endforeach
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class=""> {{\App\Models\Posts\Post::commentCounts($post->id)}}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ \App\Models\Posts\Like::likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ \App\Models\Posts\Like::likeCounts($post->id) }}</span></p>
            @endif
          </div>
        <!-- </div> -->
      </div>
    </div>
    @endforeach
    </div>
    @endif
  </div>
  <div class="other_area border" style="border: none !important; width:15vw;">
    <div class="m-3 p-1 w-100" style="border: none !important; margin:10%;">
      <a class="btn bg-info post_btn btn_custom" href="{{ route('post.input') }}">投稿</a>
      <div class="d-flex" style="margin-top:2%;">
        <input type="text" style="margin-top:5%; width:75%; border-radius: 10px 0px 0px 10px; border:none; padding:1%" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" class="btn bg-info search_btn" form="postSearchRequest" style="width:25%; border-radius: 0px 10px 10px 0px !important;" >
      </div>
      <div class="d-flex" style="margin-top:2%; gap:2%;">
        <input type="submit" name="like_posts" class="btn bg-info category_btn like_search btn_custom" value="いいねした投稿" form="postSearchRequest" style="width:48%; ">
        <input type="submit" name="my_posts" class="btn bg-info category_btn my_post_search btn_custom" value="自分の投稿" form="postSearchRequest" style="width:48%; ">
      </div>
      <p class="mt-4">カテゴリー検索</p>
      <ul>
      @foreach($categories as $category)
        <li class="main_categories category_border" category_id="{{ $category->id }}" style=" border-bottom: 1px solid !important;border-bottom-color: #6c757d !important; padding-left:3%;"><span>{{ $category->main_category }}<span></li>
        <div class="sub_categories" >
          <div class="sub_category_custom">
          @if(isset($category->subCategories))
            @foreach($category->subCategories as $sub_category)
              <input class="sub_category category_border" type="submit" value="{{$sub_category->sub_category}}" name="category_word" form="postSearchRequest"  style=" border-bottom: 1px solid !important;border-bottom-color: #6c757d !important;">
            @endforeach
          @endif
          </div>
        </div>
      @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest">@csrf</form>
</div>
@endsection
