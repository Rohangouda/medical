<div class="hero_area">
  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <div class="row">
          <div class="col">
            <a class="navbar-brand" href="{{URL::to('/')}}">
              <img src="{{ asset('medfin/medfin-logo.svg') }}" width="120" alt="logo">
            
            </a>
          </div>
          <div class="col">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
          </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="{{URL::to('/')}}">Home </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link text-success" href="{{route('product')}}"> Product </a>
            </li> --}}
            <li class="nav-item active">
              <a class="nav-link " href="{{route('about_us')}}"> About <span class="sr-only">(current)</span> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('contact')}}">Contact Us</a>
            </li>
            <li class="nav-item my-2 m-md-0">
              {{-- <div class="hero_search ">
                <div id="searchBox">
                  <i class="fas fa-search " id="googleIcon"></i>
                  <input type="search" class="search_text" id="global_search_text" placeholder="Search Here" />

                </div>
              </div> --}}

              {{-- <div class="input-group">
                <input type="search" id="global_search_text" class="form-control" placeholder="Search Here"
                  aria-label="Search" aria-describedby="search-addon" />
                <div class="input-group-append">
                  <button type="button" class="btn bg-white border-success" id="global_search_btn"><i
                      class="fas fa-search"></i></button>
                </div>
              </div> --}}
            </li>php artisan sem_remove
          </ul>
          <div class="user_option-box">
            @if(Session::has('user_id'))
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img class="avatar" src="{{asset('app-assets/img/portrait/small/avatar-s-1.png')}}" alt="avatar"
                    height="35" width="35">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item">{{Session::get('first_name')}} {{Session::get('last_name')}}</a>
                  @if(Session::get('user_role') == 'Admin')
                  <a class="dropdown-item" href="{{URL('/admin/dashboard')}}"><i class="fas fa-warehouse"></i>
                    Dashboard</a>
                  <a class="dropdown-item" href="{{URL('/admin/profile')}}"><i class="far fa-edit"></i> Edit Profile</a>
                  @endif
                  @if (Session::get('user_role') == 'user')
                  <a class="dropdown-item" href="{{ URL('/profile') }}"><i class="far fa-edit"></i> Edit Profile</a>
                  <a class="dropdown-item" href="{{ URL('/my-order') }}"><i class="far fa-edit"></i> My Order</a>
                  @endif
                  <a class="dropdown-item" href="{{URL('/logout')}}"><i class="fas fa-power-off"></i> Logout</a>
                </div>
              </li>
            </ul>
            @else
            <div class="input-group">
              <input type="search" id="global_search_text" class="form-control" placeholder="Search Here"
                aria-label="Search" aria-describedby="search-addon" />
              <div class="input-group-append">
                <button type="button" class="btn bg-white border-primary" id="global_search_btn"><i
                    class="fas fa-search text-primary"></i></button>
              </div>
            </div>
            <button type="button" class="btn btn-outline-primary mx-2" style="border-radius: 5px"
              id="login_head_btn">Login
            </button>
            @endif
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->
</div>
<script type="text/javascript">
  $(document).ready(function() {
      let baseUrl = $('#base_url').val();
      $('#global_search_btn').click(() => {
        let search_text = $('#global_search_text').val();
        if(search_text != ''){
          window.open(baseUrl + '/search-in-medfin/' + search_text, '_self');
        }
        
      });
    });
</script>
<script>
  const searchBox = document.getElementById('searchBox'),
    googleIcon = document.getElementById('googleIcon');
    
    googleIcon.onclick = function () {
    searchBox.classList.toggle('active');
    };
</script>