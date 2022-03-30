@extends('layouts.home_layout')
@section('content')

	  <!-- contact section -->

<style>
  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

.contact-parent{
    display:flex;
    margin:80px 0;
}
body{
    color: blue;
}

.contact-child{
    display:flex;
    flex:1;
    box-shadow:0px 0px 20px -2px #3b4a6b;
}

.child1{
    background:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://rubyhall.com/img/home/10.jpg');
    background-size:cover;
    display:flex;
    flex-direction:column;
    justify-content:space-around;
    color: #fff;
    padding:100px 0;
}

.child1 p{
    padding-left:20%;
    font-size:20px;
    text-shadow:0px 0px 2px #000;
}

.child1 p span{
    font-size:16px;
    color:rgb(2, 255, 2);
}

.child2{
    flex-direction:column;
    justify-content:space-around;
    align-items:center;
}

.inside-contact{
    width:90%;
    margin:0 auto;
}

.inside-contact h2{
    text-transform:uppercase;
    text-align:center;
    margin-top:50px;
}

.inside-contact h3{
    text-align:center;
    font-size:16px;
    color:#0085e2;
}

.inside-contact input, .inside-contact textarea{
    width:100%;
    background-color:#eee;
    border:1px solid rgba(0,0,0,0.48);
    padding:5px 10px;
    margin-bottom:20px;
}

.inside-contact input[type=submit]{
    background-color:#3b4a6b;
    color:#fff;
    transition:0.2s;
    border:2px solid #3b4a6b;
    margin:30px 0;
}

.inside-contact input[type=submit]:hover{
    background-color:#fff;
    color:#000;
    transition:0.2s;
}

@media screen and (max-width:991px){
    .contact-parent{
        display:block;
        width:100%;
    }

    .child1{
        display:none;
    }

    .child2{
        background-image:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url('https://rubyhall.com/img/home/10.jpg'));
        background-size:cover;
    }

    .inside-contact input, .inside-contact textarea{
        background-color:#fff;
    }
}
</style>
   
            @if (count($errors) > 0)
            <div class="alert flex-center alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br><br>
            @endif
            <div class="container">
                <div class="contact-parent">
                    <div class="contact-child child1">
                        <p id="href_con_address_1">
                            <i class="fas fa-map-marker-alt"></i> Address <br />
                            <a id="href_con_address_map" href="" target="_blank">
                                <span id="con_address_1">
                                </span>
                            </a>
                        </p>
                        <p>
                            <i class="fas fa-phone-alt"></i> Let's Talk <br />
                            <a id="href_con_mobile_1" href=""><span id="con_mobile_1"> </span></a>
                        </p>
                         <p>
                            <i class="fab fa-whatsapp"></i> Whatsapp <br />
                            <a id="href_con_whatsapp_mobile_1" href="" target="_blank"><span id="con_whatsapp_mobile_1">53135 </span></a>
                        </p>
                        <p>
                            <i class=" far fa-envelope"></i> General Support <br />
                            <a id="href_con_email_1" href=""><span id="con_email_1"> </span></a>
                        </p>
                    </div>

                    <div class="contact-child child2">
                        <div class="inside-contact">
                            <h2>Contact Us</h2>
                            <h3>
                               <span id="confirm">
                            </h3>
                            <div class="message">
                           
                        </div>
                        @if(Session::has('message'))
                        <div class="alert flex-center alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p class="text-center big text-green">{{ Session::get('message') }}</p>
                        </div>
                        @endif
                        @if(Session::has('messagered'))
                        <div class="alert flex-center" style="background: red;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p class="text-center big text-red">{{ Session::get('messagered') }}</p>
                        </div>
                        @endif
                         <form action="{{ route('contact.message') }}" method="POST">
                            @csrf
                            <p>Name *</p>
                            <input id="name" class="name" name="name" type="text" Required="required">

                            <p>Email *</p>
                            <input id="email" ext=email name="email" type="email" Required="required">

                            <p>Phone *</p>
                            <input id="phone" ext=mobile name="phone" type="text" Required="required">

                            <p>Message *</p>
                            <textarea id="message" class="message" rows="4" cols="20" Required="required" name="message" ></textarea>
                            
                            <button type="submit" class="btn btn-color my-3" style="width: 100%; background-color: blue; color:white;">SEND MESSAGE</button>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- end contact section -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>   
  
  @stop