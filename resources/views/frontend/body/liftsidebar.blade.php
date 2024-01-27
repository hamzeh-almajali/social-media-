<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="widget">
            <h4 class="widget-title">Shortcuts</h4>
            <ul class="naves">
                <li>
                    <i class="ti-clipboard"></i>
                    <a href="{{route('home')}}" title="">News feed</a>
                </li>


                <li>
                    <i class="ti-user"></i>
                    <a href="{{route('friends',['userid' => Auth::user()->id ])}}" title="">friends</a>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <a href="{{route('group.index')}}" title="">groups</a>
                </li>


                <li>
                    <i class="ti-comments-smiley"></i>
                    <a href="{{route('chat.index',['userid' => Auth::user()->id ])}}" title="">Messages</a>
                </li>



                <li>
                    <i class="ti-power-off"></i>
                    <a href="{{ route('logout') }}" title=""
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div><!-- Shortcuts -->
   <!--    recent activites -->
         {{-- <div class="widget stick-widget">
            <h4 class="widget-title">Who's follownig</h4>
            <ul class="followers">
                <li>
                    <figure><img src="images/resources/friend-avatar2.jpg" alt=""></figure>
                    <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a>
                    </div>
                </li>
                <li>
                    <figure><img src="images/resources/friend-avatar4.jpg" alt=""></figure>
                    <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Issabel</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a>
                    </div>
                </li>
                <li>
                    <figure><img src="images/resources/friend-avatar6.jpg" alt=""></figure>
                    <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Andrew</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a>
                    </div>
                </li>
                <li>
                    <figure><img src="images/resources/friend-avatar8.jpg" alt=""></figure>
                    <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Sophia</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a>
                    </div>
                </li>
                <li>
                    <figure><img src="images/resources/friend-avatar3.jpg" alt=""></figure>
                    <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Allen</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a>
                    </div>
                </li>
            </ul>
         </div><!-- who's following  --}}
        @livewire('people-you')
    </aside>
</div><!--
