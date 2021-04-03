<header>
    <div class="container">
        <div class="row">
            <div class="col-3">
                 <a href="{{route('customer.home')}}"><img src="{{asset('frontend/img/logo.svg')}}" alt="" width="178" height="45" class="d-none d-md-block"><img src="{{asset('frontend/img/logo_mobile.svg')}}" alt="" width="62" height="45" class="d-block d-md-none"></a>
            </div>
            <div class="col-9">
                <div id="social">
                    <ul>
                        <li><a href="#0"><i class="icon-facebook"></i></a></li>
                        <li><a href="#0"><i class="icon-instagram"></i></a></li>
                        {{-- <li><a href="#0"><i class="icon-twitter"></i></a></li>
                        <li><a href="#0"><i class="icon-google"></i></a></li>
                        <li><a href="#0"><i class="icon-linkedin"></i></a></li> --}}
                    </ul>
                </div>
                <!-- /social -->
                <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
                <!-- /menu button -->
                <nav>
                    <ul class="cd-primary-nav">
                        {{-- <li><a href="without_branch_layout_2.html" class="animated_link">Questionnaire without branch</a></li>
                        <li><a href="with_branch_layout_2.html" class="animated_link">Questionnaire with branch</a></li>
                        <li><a href="prevention.html" class="animated_link">Prevention Tips</a></li>
                        <li><a href="faq.html" class="animated_link">Faq</a></li>
                        <li><a href="contacts.html" class="animated_link">Contact Us</a></li>
                        <li><a href="#0" class="animated_link">Purchase Template</a></li> --}}
                        @if(Auth::check())
                        <li><a href="{{route('customer.order.index')}}" class="animated_link">Orders</a></li>
                        <li>
                            <a href="{{ route('logout') }}" class="animated_link" 
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        
                            >Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- /menu -->
            </div>
        </div>
    </div>
    <!-- /container -->
</header>