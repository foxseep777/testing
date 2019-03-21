        @section('sidebar')
        <div class="side-menu">
     
	<div class="side-menu-wrapper"> 
		<div class="menu-items-wrapper">
			 <ul class="menu-items-list first-level">
			                 <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                    <a href="/" class="menu-item">
                        <div>  
                            <span class="menu-item-name">Users</span>
                        </div> 
                    </a>
                </li>
			                <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                    <a href="companies" class="menu-item">
                        <div>
							<span class="menu-item-name">Companies</span>
                        </div>
                    </a>
                </li>
			                <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                    <a href="abusers" class="menu-item">
                        <div>
						
                            <span class="menu-item-name">Abusers</span>
                        </div>
                    </a>
                </li>		                <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        <div>
						
                            <span class="menu-item-name">Abusers</span>
                        </div>
                    </a>
                </li>
	
			               
				</ul>


                                        

		</div>
	</div> 
</div>
        @show

        <div class="container">
        @yield('content')
        </div>
