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
          @foreach ($profile->friends as $key)
     @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending')
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
          @endif
@endforeach
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

<div class="col-lg-6">
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
                        <ins><a href="time-line.html" title="">{{$profile->name}}</a></ins>


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
                        {{-- <div class="linked-image align-left">
                            <a href="#" title=""><img src="images/resources/page1.jpg" alt=""></a>
                        </div> --}}
                        {{-- <div class="detail">
                            <span>Love Maid - ChillGroves</span>
                            <p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... </p>
                            <a href="#" title="">www.sample.com</a>
                        </div> --}}
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
                                            <h5><a href="time-line.html" title="">{{$comment->user->name}}</a></h5>
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

        {{--
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="{{asset('frontend/assets/images/resources/friend-avatar10.jpg')}}" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">{{$profile->name}}</a></ins>
                        <span>published: june,2 2018 19:PM</span>
                    </div>
                    <div class="post-meta">
                        <img src="{{asset('frontend/assets/images/resources/user-post.jpg')}}" alt="">
                        <div class="we-video-info">
                            <ul>

                                <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="like" data-toggle="tooltip" title="like">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="dislike" data-toggle="tooltip" title="dislike">
                                        <i class="ti-heart-broken"></i>
                                        <ins>200</ins>
                                    </span>
                                </li>
                                <li class="social-media">
                                    <div class="menu">
                                      <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                      </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                        </div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                        </div>
                                      </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="description">

                            <p>
                                Curabitur world's most beautiful car in <a href="#" title="">#test drive booking !</a> the most beatuiful car available in america and the saudia arabia, you can book your test drive by our official website
                            </p>
                        </div>
                    </div>
                </div>
                <div class="coment-area">
                    <ul class="we-comet">
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-1.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                    <span>1 year ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
                            </div>
                            <ul>
                                <li>
                                    <div class="comet-avatar">
                                        <img src="images/resources/comet-2.jpg" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="time-line.html" title="">alexendra dadrio</a></h5>
                                            <span>1 month ago</span>
                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                        </div>
                                        <p>yes, really very awesome car i see the features of this car in the official website of <a href="#" title="">#Mercedes-Benz</a> and really impressed :-)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="comet-avatar">
                                        <img src="images/resources/comet-3.jpg" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="time-line.html" title="">Olivia</a></h5>
                                            <span>16 days ago</span>
                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                        </div>
                                        <p>i like lexus cars, lexus cars are most beautiful with the awesome features, but this car is really outstanding than lexus</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-1.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Donald Trump</a></h5>
                                    <span>1 week ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel
                                    <i class="em em-smiley"></i>
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#" title="" class="showmore underline">more comments</a>
                        </li>
                        <li class="post-comment">
                            <div class="comet-avatar">
                                <img src="images/resources/comet-1.jpg" alt="">
                            </div>
                            <div class="post-comt-box">
                                <form method="post">
                                    <textarea placeholder="Post your comment"></textarea>
                                    <div class="add-smiles">
                                        <span class="em em-expressionless" title="add icon"></span>
                                    </div>
                                    <div class="smiles-bunch">
                                        <i class="em em---1"></i>
                                        <i class="em em-smiley"></i>
                                        <i class="em em-anguished"></i>
                                        <i class="em em-laughing"></i>
                                        <i class="em em-angry"></i>
                                        <i class="em em-astonished"></i>
                                        <i class="em em-blush"></i>
                                        <i class="em em-disappointed"></i>
                                        <i class="em em-worried"></i>
                                        <i class="em em-kissing_heart"></i>
                                        <i class="em em-rage"></i>
                                        <i class="em em-stuck_out_tongue"></i>
                                    </div>
                                    <button type="submit"></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="images/resources/friend-avatar10.jpg" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">Ahmad Zytoon</a></ins>
                        <span>published: june,2 2018 19:PM</span>
                    </div>
                    <div class="post-meta">
                        <iframe src="https://player.vimeo.com/video/15232052" height="315" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        <div class="we-video-info">
                            <ul>

                                <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="like" data-toggle="tooltip" title="like">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="dislike" data-toggle="tooltip" title="dislike">
                                        <i class="ti-heart-broken"></i>
                                        <ins>200</ins>
                                    </span>
                                </li>
                                <li class="social-media">
                                    <div class="menu">
                                      <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                      </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                        </div>
                                      </div>
                                      <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                        </div>
                                      </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="description">

                            <p>
                                Lonely Cat Enjoying in Summer Curabitur <a href="#" title="">#mypage</a> ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
                            </p>
                        </div>
                    </div>
                </div>
                <div class="coment-area">
                    <ul class="we-comet">
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-1.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                    <span>1 year ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel</p>
                            </div>

                        </li>
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Sophia</a></h5>
                                    <span>1 week ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>we are working for the dance and sing songs. this video is very awesome for the youngster.
                                    <i class="em em-smiley"></i>
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#" title="" class="showmore underline">more comments</a>
                        </li>
                        <li class="post-comment">
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="post-comt-box">
                                <form method="post">
                                    <textarea placeholder="Post your comment"></textarea>
                                    <div class="add-smiles">
                                        <span class="em em-expressionless" title="add icon"></span>
                                    </div>
                                    <div class="smiles-bunch">
                                        <i class="em em---1"></i>
                                        <i class="em em-smiley"></i>
                                        <i class="em em-anguished"></i>
                                        <i class="em em-laughing"></i>
                                        <i class="em em-angry"></i>
                                        <i class="em em-astonished"></i>
                                        <i class="em em-blush"></i>
                                        <i class="em em-disappointed"></i>
                                        <i class="em em-worried"></i>
                                        <i class="em em-kissing_heart"></i>
                                        <i class="em em-rage"></i>
                                        <i class="em em-stuck_out_tongue"></i>
                                    </div>
                                    <button type="submit"></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</div>

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
