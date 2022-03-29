<style>
    .buttonIn {
        width: 300px;
        position: relative;
    }

    .search__input {
        margin: 0px;
        padding: 0px;
        width: 100%;
        outline: none;
        height: 30px;
        border-radius: 5px;
    }

    .search__button {
        position: absolute;
        top: 0;
        border-radius: 5px;
        right: 0px;
        z-index: 2;
        border: none;
        top: 2px;
        height: 30px;
        cursor: pointer;
        color: white;
        background-color: #1e90ff;
        transform: translateX(2px);
    }
</style>
<div class="hero_area">

    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <div class="row">
                    <div class="col">
                        <a class="navbar-brand" href="{{ URL::to('/') }}">
                            <span>
                                <img src="{{ asset('medfin/medfin-logo.svg') }}" width="120" alt="logo"> 
                        </a>
                    </div>
                    <div class="col">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link " href="{{ URL::to('/') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link " href="{{route('product')}}"> Products </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('about_us') }}"> About Us </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('contact') }}">Contact Us</a>
                        </li>
                        <li class="nav-item my-2 m-md-0">

                            {{-- <div class="input-group ">
                                <input type="search" id="global_search_text" class="form-control"
                                    placeholder="Search Here" aria-label="Search"
                                    aria-describedby="search-addon" />
                                <div class="input-group-append">

                                    <button type="button"
                                        class="btn bg-white border-success btn-outline-success input-group-text"
                                        id="global_search_btn"><i class="fas fa-search text-dark"></i></button>
                                </div>

                            </div> --}}

                        </li>

                    </ul>
                    <div class="user_option-box">
                        {{-- <div class="col-sm-6 my-2">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" placeholder="Search"
                                    aria-label="Search" <button type="button"
                                    class="btn btn-outline-primary">Search</button>
                            </div>
                        </div> --}}
                        @if (Session::has('user_id'))
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="avatar"
                                        src="{{ asset('app-assets/img/portrait/small/user.jpg') }}" alt="avatar"
                                        height="35" width="35">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item">{{ Session::get('first_name') }}
                                        {{ Session::get('last_name') }}</a>
                                    @if (Session::get('user_role') == 'Admin')
                                    <a class="dropdown-item" href="{{ URL('/admin/dashboard') }}"><i
                                            class="fas fa-warehouse"></i> Dashboard</a>
                                    <a class="dropdown-item" href="{{ URL('/admin/profile') }}"><i
                                            class="far fa-edit"></i> Edit Profile</a>
                                    @endif
                                    @if (Session::get('user_role') == 'user')
                                    <a class="dropdown-item" href="{{ URL('/profile') }}"><i class="far fa-edit"></i>
                                        Edit Profile</a>
                                    <a class="dropdown-item" href="{{ URL('/my-order') }}"><i class="far fa-box"></i> My
                                        Order</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ URL('/logout') }}"><i
                                            class="fas fa-power-off"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                        @else

                        <div class="input-group my-2 m-md-0">
                            <input type="search" id="global_search_text" class="form-control border-success"
                                placeholder="Search Here" aria-label="Search"
                                aria-describedby="search-addon" />

                            <div class="input-group-append">

                                <button type="button"
                                    class="btn bg-white border-primary btn-outline-success input-group-text"
                                    id="global_search_btn"><i class="fas fa-search text-primary"></i></button>

                            </div>

                        </div>
                        <button type="button" class="btn btn-outline-primary mx-2 px-3" style="border-radius: 5px"
                            id="login_head_btn">Login
                        </button>
                        @endif
                    </div>

                </div>
        </div>
</div>
</nav>
</div>
</header>
<!-- end header section -->

<!-- slider section -->
<!-- <section class="slider_section">
    <div id="customCarousel1" class="carousel slide append_js_bots" data-ride="carousel">
        <div class="carousel-inner append_theme_via_js">

        </div>
        <ol class="carousel-indicators">

        </ol>
    </div> -->

</section>
<!-- end slider section -->
<!-- </div> -->

<input type="hidden" id="base_url" value="{{ URL('/') }}">
<script>
    const searchBox = document.getElementById('searchBox'),
    googleIcon = document.getElementById('googleIcon');
    
    googleIcon.onclick = function () {
    searchBox.classList.toggle('active');
    };
</script>
<script type="text/javascript">
    $(document).ready(() => {
        let baseUrl = $('#base_url').val();

        getThemeSliders();

        function getThemeSliders() {
            $.ajax({
                url: baseUrl + '/get-theme-sliders'
                , type: 'POST'
                , data: {
                    '_token': '{{csrf_token()}}'
                }
                , dataType: 'json'
                , beforeSend: function() {
                    $('#loader').modal({
                        backdrop: 'static'
                        , keyboard: false
                    });
                }
                , success: function(res) {
                    if (res.status == 200) {
                        let x = '';
                        let xbot = '';
                        $.each(res.data, function(xKey, xVal) {
                            let activeCls = '';
                            let $title = '';
                            let $contents = '';
                            if (xKey == 0) {
                                activeCls = 'active';
                                $title = 'Medfin';
                                $contents = '<ul><li> To People</li><li> For People</li><li>By People</li></ul>';
                            } else if (xKey == 1) {
                                $title == '';
                                $contents = ' Well, today the internet is overflowed with online shopping sites but with the' +
                                    'latest trends, premium quality and affordable prices, PEEPAL STORE has become' +
                                    'everyone’s' +
                                    'favourite place to buy best groccery brands in India. So just like' +
                                    'everyone, if you are the one who wants to shop from the best online shopping for' +
                                    'family then your search is over because PEEPAL STORE gives an amazing Groccery collection.';
                            }
                            x += '<div class="carousel-item ' + activeCls + '">' +
                                '<div class="container-fluid ">' +
                                '<div class="row">' +
                                '<div class="col-md-6">' +
                                '<div class="detail-box">' +
                                '<h1>' + $title + '</h1>' +
                                '</div>' +
                                '</div>' +
                                '<div class="col-md-6">' +
                                '<div class="img-box">' +
                                '<img style="height: 36em" src="' + baseUrl + '/storage/theme_images/' + xVal.image_name + '" alt="">' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            xbot += '<li data-target="#customCarousel1" data-slide-to="' + parseInt(xKey + 1) + '" class="' + activeCls + '"></li>';
                        });
                        $('.append_theme_via_js').html(x);
                        $('.carousel-indicators').html(xbot);
                    }
                }
                , complete: function() {
                    $('#loader').modal('hide');
                }
            });
        }

        $('#login_head_btn').click(() => {
            $('#myModal').modal({
                backdrop: 'static'
                , keyboard: false
            });
        });

        $('#global_search_btn').click(() => {
            let search_text = $('#global_search_text').val();
            if (search_text != '') {
                window.open(baseUrl + '/search-in-peepal-store/' + search_text, '_self');
            }
        });
    });

</script>