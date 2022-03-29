<!--Footer Starts-->
<footer class="container-fluid footer">
    <div class="container">
		<div class="row text-center">
			<div class="col-12 footer-links">
				<a href="javascript:void(0)">About Medfin</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)">Terms and Conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)">FAQs</a>
			</div>
			<div class="col-12 social-icons-sec">
				<ul class="list-unstyled list-inline social-icons">
						<li>
							<a href="javascript:void(0)" target="_blank" class="social-fb">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" target="_blank" class="social-twt">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" target="_blank" class="social-gpls">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" target="_blank" class="social-insta">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" target="_blank" class="social-ytb">
							</a>
						</li>
					</ul>
			</div>
		</div>
        
        
    </div>
        
    <div class="text-center footer-rights">
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