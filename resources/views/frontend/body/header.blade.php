<div class="responsive-header">
    <div class="mh-head first Sticky">
        <span class="mh-btns-left">
            <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
        </span>
        <span class="mh-text">
            <a href="newsfeed.html" title=""><img src="{{asset('frontend/assets/images/orange.png')}}" alt="Orange" style=" height: 3rem;"></a>
        </span>
        <span class="mh-btns-right">
            <a class="fa fa-sliders" href="#shoppingbag"></a>
        </span>
    </div>
    <div class="mh-head second">
        <form class="mh-form">
            <input placeholder="search" />
            <a href="#/" class="fa fa-search"></a>
        </form>
    </div>

</div><!-- responsive header -->

<div class="topbar stick">
    <div class="logo">
        <a title="" href="{{route('home')}}"><img src="{{asset('frontend/assets/images/orange.png')}}" alt="Orange" style=" height: 3rem;"></a>
    </div>

    <div class="top-area">
        <div class="top-search">
            <form method="post" class="">
                <input type="text" placeholder="Search Friend">
                <button data-ripple><i class="ti-search"></i></button>
            </form>
        </div>
        <ul class="setting-area">
            <li><a href="{{route('home')}}" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
           
            <li>
                <a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
                <div class="dropdowns">
                    <span>5 New Messages</span>
                    <ul class="drops-menu">
                        <li>
                            <a href="notifications.html" title="">
                                <img src="{{asset('frontend/assets/images/resources/thumb-1.jpg')}}" alt="">
                                <div class="mesg-meta">
                                    <h6>sarah Loren</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag green">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="{{asset('frontend/assets/images/resources/thumb-2.jpg')}}" alt="">
                                <div class="mesg-meta">
                                    <h6>Jhon doe</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag red">Reply</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="{{asset('frontend/assets/images/resources/thumb-3.jpg')}}" alt="">
                                <div class="mesg-meta">
                                    <h6>Andrew</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag blue">Unseen</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="{{asset('frontend/assets/images/resources/thumb-4.jpg')}}" alt="">
                                <div class="mesg-meta">
                                    <h6>Tom cruse</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="{{asset('frontend/assets/images/resources/thumb-5.jpg')}}" alt="">
                                <div class="mesg-meta">
                                    <h6>Amy</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                    </ul>
                    <a href="messages.html" title="" class="more-mesg">view more</a>
                </div>
            </li>
            <li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
                <div class="dropdowns languages">
                    <a href="#" title=""><i class="ti-check"></i>English</a>
                    <a href="#" title="">Arabic</a>
                    <a href="#" title="">Dutch</a>
                    <a href="#" title="">French</a>
                </div>
            </li>
        </ul>
        <div class="user-img">
            <img src="{{asset('images/'.Auth::user()->profile_image)}}" alt="" style="width: 50px;">
            <span class="status f-online"></span>
            <div class="user-setting">
                <a href="#" title=""><span class="status f-online"></span>online</a>
                <a href="#" title=""><span class="status f-away"></span>away</a>
                <a href="#" title=""><span class="status f-off"></span>offline</a>
                <a href="{{route('profilee',['userid' => Auth::user()->id ])}}" title=""><i class="ti-user"></i> view profile</a>
                <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                <a href="#" title=""><i class="ti-target"></i>activity log</a>
                <a href="#" title=""><i class="ti-settings"></i>account setting</a>
                <a href="{{ route('logout') }}" title=""><i class="ti-power-off"></i>log out</a>
            </div>
        </div>
    </div>
</div>
