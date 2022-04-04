<script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
<style>
.icons{
    padding-top: 1rem;
}

.icons a{
    text-decoration: none;
    font-size: 1.5rem;
    margin: 0.5rem;
    color: black;
}
  </style>
<!--Footer Starts-->
<footer class="container-fluid footer ">
    <div class="container">
		<div class="row text-center">
			<div class="col-12 footer-links">
				<a href="https://www.medfin.in/about-medfin" target="_blank">About Medfin</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/privacy-policy" target="_blank">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/terms-conditions" target="_blank">Terms and Conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/contact-us" target="_blank">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/faq" target="_blank">FAQs</a>
			</div>
			<div class="col-12 social-icons-sec">
          <div class="icons">
           <a href="https://m.facebook.com/medfinhealth" target="_blank"><i class="fab fa-facebook"></i></a>
           <a href="#"><i class="fab fa-linkedin"></i></a>
           <a href="https://www.instagram.com/medfin_health/" target="_blank"><i class="fab fa-instagram"></i></a>
           <a href="https://youtube.com/c/Medfinhealth" target="_blank"><i class="fab fa-youtube"></i></a>
           <a href="http://twitter.com/medfinhealth" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
					</ul>
			</div>
		</div>
        
        
    </div>
        
    <div class="text-center footer-rights mb-5">
        © Medfin 2019. All Rights Reserved.
    </div>
</footer>
<!--Footer Ends-->
<script>
$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-light");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
	
$(function () {
  $(document).scroll(function () {
    var $banner = $(".home-banner");
	var $nav = $(".navbar-light");
    $nav.toggleClass('scrolled2', $(this).scrollTop() > $banner.height());
  });
});
	
$(function () {
  $(document).scroll(function () {
	var $whatsappbutton = $(".whtsap");
    $whatsappbutton.toggleClass('scrolled3', $(this).scrollTop() > (2900));
  });
});

var myswiper = new Swiper('.swiper-doctors', {
      slidesPerView: 4,
      spaceBetween: 30,
      // init: false,
      loop:false,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
		clickable: true,
      },
		navigation: {
        nextEl: '.swiper-button-next-doctors-cards',
        prevEl: '.swiper-button-prev-doctors-cards',
      },
      breakpoints: {
        1024: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 1.2,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 1.2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });
	
var swiper = new Swiper('.swiper-testimonials', {
      slidesPerView: 2,
      spaceBetween: 30,
      // init: false,
      loop:false,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
		clickable: true,
      },
		navigation: {
        nextEl: '.swiper-button-next-testimonials',
        prevEl: '.swiper-button-prev-testimonials',
      },
      breakpoints: {
        1024: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 1.2,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 1.2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });

</script>