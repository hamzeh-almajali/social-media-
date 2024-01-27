@extends('frontend.main_master')
@section('header')
@include('frontend.body.header')
@endsection

@section('bodyhead')
<section>
    <div class="feature-photo">
        <figure><img src="{{asset('images/'.$groups->image)}}" alt=""></figure>
        <div class="add-btn">
            @if(!auth()->user()->groups->contains($groups))
            <form action="{{ route('groups.follow', $groups) }}" method="post">
                @csrf
                <button type="submit" class="follow-btn">Follow GROUP</button>
            </form>
            @else
            <form action="{{ route('groups.unfollow', $groups) }}" method="post">
                @csrf
                <button type="submit" class="follow-btn">Unfollow GROUP</button>
            </form>
            @endif
                </div>
                @if (Auth::user()->id==$groups->user_id)

                <form class="edit-phto">
                    <i class="fa fa-camera-retro"></i>
                    <label class="fileContainer">
                        Edit Cover Photo
                        <input type="file"/>
                    </label>
                </form>
                @endif
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <form class="edit-phto">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                    <input type="file"/>
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                              <h5>{{$groups->name}}</h5>
                            </li>
                            <li>
                                <a class="active" href="time-line.html" title="" data-ripple="">time line</a>
                                <a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
                                <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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
            <div class="new-postbox">
                <figure>
                    <img src="{{('images/'.Auth::user()->profile_image)}} " alt="">
                </figure>
                <div class="newpst-input">
                    <form method="post" action="{{route('postcreate')}}" enctype="multipart/form-data">
                    @csrf
                        <textarea rows="2" placeholder="write something"></textarea>
                        <div class="attachments">
                            <ul>
                                <li>
                                    <i class="fa fa-music"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="fa fa-image"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="fa fa-video-camera"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="fa fa-camera"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <button type="submit">Publish</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- add post new box -->
        @if(auth()->user()->groups->contains($groups))
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="{{asset('frontend/assetsimages/resources/friend-avatar10.jpg')}}" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">Ahmad Zytoon</a></ins>
                        <span>published: june,2 2018 19:PM</span>
                    </div>
                    <div class="description">

                            <p>
                                World's most beautiful car in Curabitur <a href="#" title="">#test drive booking !</a> the most beatuiful car available in america and the saudia arabia, you can book your test drive by our official website
                            </p>
                        </div>
                    <div class="post-meta">
                        <div class="linked-image align-left">
                            <a href="#" title=""><img src="{{asset('frontend/assets/images/resources/page1.jpg')}}" alt=""></a>
                        </div>
                        <div class="detail">
                            <span>Love Maid - ChillGroves</span>
                            <p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... </p>
                            <a href="#" title="">www.sample.com</a>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="central-meta item">
            <div class="user-post">

                <div class="coment-area">
                    <ul class="we-comet">
                        <li>
                            <div class="comet-avatar">
                                <img src="{{asset('frontend/assets/images/resources/comet-1.jpg')}}" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                    <span>1 year ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
                            </div>

                    </ul>
                </div>
            </div>
        </div>


@endif
    </div>

    </div>
@include('frontend.body.liftsidebar')
</div>
</div>
</div>
</div>
</div>
@endsection

@endsection

@section('footer')
@include('frontend.body.footer')
@endsection
