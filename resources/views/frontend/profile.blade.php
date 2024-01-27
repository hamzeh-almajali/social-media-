@extends('frontend.main_master')

@section('header')
@include('frontend.body.header')
@endsection

@section('bodyhead')
<section>
    <div class="feature-photo">

        <figure><img src="{{asset('images/'.$profile->profile_cover)}}" alt=""></figure>
        <div class="add-btn">




            {{-- <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">Add Friend</a> --}}

        @php
        $buttonPrinted = false;
        @endphp
        @if ($profile->id == Auth::user()->id)

       @else

       @if ($profile->friends !=null)

       @foreach ($profile->friends as $key )


       @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending'&& $key['type']=='res' )
        <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">cancel request</a>
      @php
      $buttonPrinted = true;
      break;
    @endphp
  @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'accepted')
  <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">remove Friend</a>

      @php
          $buttonPrinted = true;
          break;
      @endphp
  @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'pending' && $key['type']=='sent')
  <a href="{{ route('accept', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">confirm</a>
  <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="" style="color: white;">Reject</a>

      @php
          $buttonPrinted = true;
          break;
      @endphp


       @endif
@endforeach
       @endif
@if (!$buttonPrinted)
<a href="{{ route('homee', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">Add Friend </a>
@endif
@endif
</div>@if (Auth::user()->id == $profile->id)
<form class="edit-phto" action="{{route('coverImage')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <i class="fa fa-camera-retro"></i>

            <label class="fileContainer">
                Edit Cover Photo
            <input type="file" name="profile_image"/>

            </label>
            <input type="hidden" name="id" value="{{$profile->id}}" />
            <input type="submit" value=" Upload Image" />
        </form>
        @endif
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="{{asset('images/'.$profile->profile_image)}}" alt="">
                            @if (Auth::user()->id == $profile->id)

                            <form class="edit-phto" action="{{route('profileImage')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                    <input type="file" name="profile_image" />
                                    <input type="hidden" name="id" value="{{$profile->id}}" />
                                </label>
                                    <input type="submit" value="update Image" />

                            </form>
                            @endif
                        </figure>
                        @if($errors->any())
                        <ul>
                        @foreach ($errors->all() as $key )
                            <li style="color: red">{{$key}}</li>

                        @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                              <h5>{{$profile->name}}</h5>
                              @if (session()->has('info'))
                              <span>
                                  {{session('info')}}
                            </span>
                            @endif
                            </li>
                            <li>
                                <a class="active" href="#" title="" data-ripple="">time line</a>
                                @if (Auth::user()->id == $profile->id)

                                <a class="" href="{{route('friends',['userid'=> $profile->id])}}" title="" data-ripple="">Friends</a>
                                @endif
                                <a class="" href="#" title="" data-ripple="">about</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('body')
<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="page-contents">
@include('frontend.body.rightsidebar')

{{-- <div class="col-lg-6">
    <div class="loadMore">
        <div class="central-meta item">
            @if (Auth::user()->id == $profile->id)

            <div class="new-postbox">

                <figure>
                    <img src="{{asset('images/'.$profile->profile_image)}}" alt="">
                </figure>
                <div class="newpst-input">
                    <form method="post" action="{{route('postcreate')}}" enctype="multipart/form-data">
                        @csrf
                        <textarea rows="2" placeholder="write something" name="content"></textarea>
                        <div class="attachments">
                            <ul>

                                <li>
                                    <i class="fa fa-image"></i>
                                    <label class="fileContainer">
                                        <input type="file" accept="image/*" name="postimage">
                                    </label>
                                </li>

                                <input type="hidden" name="id" value="{{Auth::user()->id}}"/>

                                <li>
                                    <button type="submit">Post</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- add post new box -->
        @endif

        @foreach ($profile->posts as $post )
         <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="{{asset('images/'.$profile->profile_image)}}" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="#" title="">{{$profile->name}}</a></ins>


                        <span>{{$post->created_at->diffForHumans() }}</span>



                    </div>
                    <div class="description">

                            <p>
                             {{$post->content}}
                            </p>
                        </div>
                        @if ($post->image)
                        <img src="{{asset('images/'.$post->image)}}" alt="">
                        @endif
                    <div class="post-meta">

                        <div class="we-video-info">
                            <ul>


                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>{{$post->comment->count()}}</ins>
                                    </span>
                                </li>
                                <li>
                                @if($post->isLikedBy(Auth::user()->id))
                                <span class="like" data-toggle="tooltip" title="like" style="color: orange;">
                                    <a href="{{route('removelike',['authid'=>Auth::user()->id ,'postid' => $post->id])}}"><i class="ti-heart"></i></a>
                                    <ins>{{$post->totalLikes()}}</ins>
                                </span>
                                @else
                                <span class="like" data-toggle="tooltip" title="like">
                                    <a href="{{route('addlike',['authid'=>Auth::user()->id ,'postid' => $post->id])}}"><i class="ti-heart"></i></a>
                                    <ins>{{$post->totalLikes()}}</ins>
                                </span>


                                @endif
                                </li>
                            </ul>

                        </div>
                        <div class="coment-area">
                            <ul class="we-comet">
                                @foreach ($post->comment as $comment )


                                <li>
                                    <div class="comet-avatar">
                                        <img src="{{asset('images/'. $comment->user->profile_image)}}" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="{{route('profilee',['userid' => $comment->user->id ])}}" title="">{{$comment->user->name}}</a></h5>
                                            <span>{{$comment->created_at->diffForHumans()}}</span>
                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                        </div>
                                        <p>{{$comment->content }}</p>
                                    </div>

                                </li>
                                @endforeach
                                <li>
                                    <a href="#" title="" class="showmore underline">more comments</a>
                                </li>
                                <li class="post-comment">
                                    <div class="comet-avatar">
                                        <img src="{{asset('images/'.Auth::user()->profile_image)}}" alt="">
                                    </div>
                                    <div class="post-comt-box">
                                        <form method="post" action="{{route('commentcreate')}}">
                                            @csrf
                                            <textarea placeholder="Post your comment" name="content"></textarea>
                                            <input type="hidden" name="userid" value="{{Auth::user()->id}}" />
                                            <input type="hidden" name="postid" value="{{$post->id}}" />
                                            <button type="submit" style="color: orange"> send</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div> --}}
@livewire('show-posts',['userId' => $profile->id])

@include('frontend.body.liftsidebar')
</div>
</div>
</div>
</div>
</div>

@endsection


@section('footer')
@include('frontend.body.footer')
@endsection
