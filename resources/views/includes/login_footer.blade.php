<div id="success_modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>		
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="text-center" id="modal_message">Your request has been confirmed. Check your email for detials.</p>
			</div>
		</div>
	</div>
</div> 

<!--Footer Starts-->
<footer class="container-fluid footer">
    <div class="container">
		<div class="row text-center">
			<div class="col-12 footer-links">
				<a href="https://www.medfin.in/about-medfin" target="_blank">About Medfin</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/privacy-policy" target="_blank">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/terms-conditions" target="_blank">Terms and Conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/contact-us" target="_blank">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/faq" target="_blank">FAQs</a>
			</div>
		</div>   
    </div>    
    <div class="text-center footer-rights mb-5">
        © Medfin 2019. All Rights Reserved.
    </div>
</footer>
<!--Footer Ends-->

<script type="text/javascript">
$(document).ready(function () {
	let baseUrl = $('#base_url').val();

	setTimeout(() => {
      _checkAllOrderForSelftDelete();
    },300000);

    @if(!empty(Session::get('message')))
		$(function() {
		    $('#successModal').modal('show');
		});
	@endif
	@if(!empty(Session::get('messagered')))
		$(function() {
		    $('#errorModal').modal('show');
		});
	@endif

	function _checkAllOrderForSelftDelete(){
		$.ajax({
			url: baseUrl+'/check_orders_for_self_delete',
			type: 'POST',
			data: {
				'_token': '{{csrf_token()}}'
			},
			dataType: 'json',
			beforeSend: function(){},
			success: function(res){
				console.log(res.msg);
			}
		});
	}
});
</script>