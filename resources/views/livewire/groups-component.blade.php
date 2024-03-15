<div>
        <div class="central-meta item">
            <div class="new-postbox">

                <figure>

                    <img src="{{asset('images/'.$profile->profile_image)}}" alt="" style=" max-height: 300px;">
                </figure>
                <div class="newpst-input">
                    <form method="post" action="{{route('postcreategroup')}}" enctype="multipart/form-data">
                        @csrf
                        <textarea rows="2" placeholder="write something" name="content" maxlength="200"></textarea>
                        <div class="attachments">
                            <ul>

                                <li>
                                    <i class="fa fa-image"></i>
                                    <label class="fileContainer">
                                        <input type="file" accept="image/*" name="postimage">
                                    </label>
                                </li>

                                <input type="hidden" name="id" value="{{Auth::user()->id}}"/>

                                <input type="hidden" name="Groupid" value="{{$GroupId}}"/>

                                <li>
                                    <button type="submit">Post</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- add post new box -->


        @foreach ($posts as $post )
         <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="{{asset('images/'.$post->user->profile_image)}}" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="#" title="">{{$post->user->name}}</a></ins>


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

                                @if($post->isLikedBy(auth()->id()))
                                <span wire:click="removelike({{Auth::user()->id}},{{$post->id}})">
                                        <i class="ti-heart" style="color: orange;"></i>
                                        <ins>{{ $post->totalLikes() }}</ins>
                                </span>
                                    @else
                                    <span wire:click="addLike({{Auth::user()->id}},{{$post->id}})">
                                        <i class="ti-heart"></i>
                                        <ins>{{ $post->totalLikes() }}</ins>
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
                                {{-- <li>
                                    <a href="#" title="" class="showmore underline">more comments</a>
                                </li> --}}
                                <li class="post-comment">
                                    <div class="comet-avatar">
                                        <img src="{{asset('images/'.Auth::user()->profile_image)}}" alt="">
                                    </div>
                                    <div class="post-comt-box">

                                        <form wire:submit.prevent="addComment({{$post->id}})">
                                            @csrf
                                            <textarea wire:model="content" placeholder="Post your comment"></textarea>
                                            <input type="hidden" name="userid" value="{{ Auth::user()->id }}" />
                                            <input type="hidden" name="postId" value="{{ $post->id }}" />

                                            <button type="submit" style="color: orange">Send</button>
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

