<div class="bg-white flex flex-col w-full items-left justify-between px-8 py-6 sm:flex-row sm:items-center">
    <div class="flex-none w-1/2 sm:w-1/6 flex items-center justify-between">
        <button class="sm:hidden" onclick="toggleMenu()">
            <svg class="" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="24" height="24"
                viewBox="0 0 24 24"
                style=" fill:#000000;">
                <path d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z"></path>
            </svg>
        </button>
        <a href="{{route('home')}}" class="">
            <h1 class="text-2xl font-bold">Plantinda</h1>
        </a>
    </div>
    
        <form action="#" method="GET" class="border-2 rounded-3xl px-6 py-2 sm:mx-4 my-4 sm:my-0 sm:w-3/6 w-full flex flex-initial justify-between">
            <input type="text" name="search" placeholder="Search..." class="w-full focus:outline-none">
            <button type="submit" class="justify-end">
                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                  viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                  width="512px" height="512px">
                  <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
              </button>
        </form>
    <nav class="hidden sm:mx-4 sm:flex flex-auto w-1/6 items-center justify-evenly">
      {{-- wishlist --}}
        <a href="{{route('wishlist')}}">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30.82" height="29.818" viewBox="0 0 30.82 29.818">
            <defs>
              <path id="path-1" fill-rule="evenodd" d="M8.0017048 13c-4.03269826-2.95773108-5.99913965-6-6.00170334-8C1.99743777 3.00000124 3.5 2.0002003 5.00099516 2.00010008 6.5 2 7.5 3 8.0017048 4 8.5 3 9.5 2 11 2.00008445 12.49996571 2.00016889 14.0017048 3.00293329 14.0017048 5c0 2-2.01900582 5.00793807-6 8z"/>
              <mask id="mask-2" x="-7.409" y="-7.409" maskContentUnits="userSpaceOnUse" maskUnits="userSpaceOnUse">
                <rect width="30.82" height="29.818" x="-7.409" y="-7.409" fill="white"/>
                <use fill="black" xlink:href="#path-1"/>
              </mask>
            </defs>
            <use fill-opacity="0" stroke="rgb(0,0,0)" stroke-linecap="butt" stroke-linejoin="miter" stroke-width="4" mask="url(#mask-2)" transform="translate(7.40926203 7.40917578)" xlink:href="#path-1"/>
          </svg>
        </a>
        {{-- cart --}}
        <a href="{{route('cart')}}">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23.909" height="20.7" viewBox="0 0 23.909 20.7">
                <defs>
                  <ellipse id="ellipse-3" cx="12.5" cy="14.5" rx="1.5" ry="1.5"/>
                  <mask id="mask-4" x="-4.705" y="-4.7" maskContentUnits="userSpaceOnUse" maskUnits="userSpaceOnUse">
                    <rect width="23.909" height="20.7" x="-4.705" y="-4.7" fill="black"/>
                    <use fill="white" xlink:href="#ellipse-3"/>
                  </mask>
                  <ellipse id="ellipse-5" cx="4.5" cy="14.5" rx="1.5" ry="1.5"/>
                  <mask id="mask-6" x="-4.705" y="-4.7" maskContentUnits="userSpaceOnUse" maskUnits="userSpaceOnUse">
                    <rect width="23.909" height="20.7" x="-4.705" y="-4.7" fill="black"/>
                    <use fill="white" xlink:href="#ellipse-5"/>
                  </mask>
                </defs>
                <g transform="translate(4.7046301 4.69985117)">
                  <path fill="none" stroke="rgb(0,0,0)" stroke-width="2" d="M4.00177323 5H14.5l-1.49829994 6H4L4.0038229.00477894"/>
                  <path fill="none" stroke="rgb(0,0,0)" stroke-width="2" d="M4 1H0"/>
                  <use fill-opacity="0" stroke="rgb(0,0,0)" stroke-width="4" mask="url(#mask-4)" xlink:href="#ellipse-3"/>
                  <use fill-opacity="0" stroke="rgb(0,0,0)" stroke-width="4" mask="url(#mask-6)" xlink:href="#ellipse-5"/>
                </g>
              </svg>                  
        </a>
        {{-- orders --}}
        <a href="{{route('orders')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <defs>
                  <rect id="rect-1" width="24" height="24" x="0" y="0"/>
                </defs>
                <g transform="translate(5.76000002 3.84000002)">
                  <path fill="rgb(0,0,0)" fill-rule="evenodd" d="M2.74032001.36l-2.50032 2.29968001h2.50032v-2.29968z"/>
                  <path fill="rgb(0,0,0)" fill-rule="evenodd" d="M3.73967992 3.66095991V.16032h8.50029754L12.23904 16.16064043h-12V3.66095991h3.50063992zm-.99935985 4.49904013h6.99935985l.0009594-1.00031996H2.74032006v1.00031996zM9.73967992 10.66032H2.74032007V9.65999956h7.00031924L9.73967991 10.66032zm-6.99935985 2.49935913h6.99935985l.0009594-1.00031948H2.74032006v1.00031948z"/>
                </g>
              </svg>
              
        </a>
    </nav>


    {{-- profile btn --}}
    <div class="hidden sm:ml-3 sm:block sm:relative">
        <div>
          <button type="button" onclick="toggleProfile()" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="39" height="39" viewBox="0 0 39 39">
                <defs>
                  <path id="path-2" fill-rule="evenodd" d="M8.27261655 0h.6055447c3.18751134 0 5.77536614 2.5878548 5.77536614 5.77536614s-2.5878548 5.77536613-5.77536614 5.77536613h-.6055447c-3.18751134 0-5.77536614-2.5878548-5.77536614-5.77536613C2.49725041 2.58785479 5.08510521 0 8.27261655 0z"/>
                  <mask id="mask-3" x="-11" y="-11" maskContentUnits="userSpaceOnUse" maskUnits="userSpaceOnUse">
                    <rect width="39" height="39" x="-11" y="-11" fill="black"/>
                    <use fill="white" xlink:href="#path-2"/>
                  </mask>
                </defs>
                <g>
                  <ellipse cx="19.5" cy="19.5" fill="rgb(0,0,0)" rx="19.5" ry="19.5"/>
                  <g transform="translate(11 11)">
                    <use fill-opacity="0" stroke="rgb(255,255,255)" stroke-width="4" mask="url(#mask-3)" xlink:href="#path-2"/>
                    <path fill="none" stroke="rgb(255,255,255)" stroke-width="2" d="M0 17.09589124s.65626177-3.54515897 8.57494927-3.54515897c7.9186875 0 8.57857812 3.5 8.57857812 3.5"/>
                  </g>
                </g>
              </svg>
          </button>
        </div>
        <div id="menu_wrap" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
          <!-- Active: "bg-gray-100", Not Active: "" -->
          @auth
          <a href="{{route('profile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" role="menuitem" tabindex="-1">Your Profile</a>
          @if (Auth::user()->user_type!='buyer')
          <a href="{{route('dashboard')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" role="menuitem" tabindex="-1">Dashboard</a>
          @endif
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-400 hover:bg-gray-300" role="menuitem" tabindex="-1">Logout</button>
          </form>
          @endauth
          @guest
          <a href="{{route('register')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" role="menuitem">Register</a>
          <a href="{{route('login')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" role="menuitem">Login</a>
          @endguest
        </div>
      </div>
    <div class="w-4"></div>
    <nav id="nav-container" class="hidden flex flex-col">
        <a href="{{route('wishlist')}}" class="p-2">Wishlist</a>
        <a href="{{route('cart')}}" class="p-2">Cart</a>
        <a href="{{route('orders')}}" class="p-2">Orders</a>
        @auth
        <button type="button" onclick="toggleMenu2()" class="p-2 text-gray-600 text-left">Profile 
          <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="19.406" height="14.405" viewBox="0 0 19.406 14.405">
            <path fill="none" stroke="rgb(125,125,125)" stroke-width="2" d="M14.701329 4.7096142L9.6990949 9.7004328 4.7046315 4.7046273"/>
          </svg>
        </button>
        
        <ul id="profile-menu" class="hidden flex flex-col">
            <a href="{{route('profile')}}" class="p-2">Your Profile</a>
            <a href="{{route('dashboard')}}" class="p-2">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" class="p-2">
              @csrf
              <button type="submit" class="w-full text-left text-red-400 hover:bg-gray-300" role="menuitem" tabindex="-1">Logout</button>
            </form>
        </ul>
        @endauth
        @guest
          <a href="{{ route('login') }}" class="p-2">Login</a>
          <a href="{{ route('register') }}" class="p-2">Register</a>
        @endguest
    </nav>
    
    
    
</div>
<script>
    function toggleMenu(){
        const nav = document.getElementById('nav-container');
        nav.classList.toggle('hidden');
    }
    function toggleMenu2(){
        const nav = document.getElementById('profile-menu');
        nav.classList.toggle('hidden')
    }
    function toggleProfile(){
        const btn = document.getElementById('user-menu-button');
        const menu = document.getElementById('menu_wrap');
        menu.classList.toggle('hidden');
    }
</script>