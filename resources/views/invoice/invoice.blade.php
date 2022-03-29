
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{$page_title}}</title>
  </head>
  <body>
    @php 
      $total = 0;
    @endphp
  	<div class="container">
      	<div class="print-button">
      <div class="card">
        <div class="card-content p-3">
          <div class="card-body pb-0">
            <!-- Invoice Company Details starts -->
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="">
                	<h1>Peepal Store</h1>
                  <!-- <img src="#" alt="company logo" width="80" height="80"> -->
                  <div class="ml-4">
                    <ul class="m-0 list-unstyled">
                      <li class="text-bold-800 invoice_store_address">{{$get_store_address->address}}</li>
                      <li>{{$get_store_address->email}}</li>
                      <li>{{$get_store_address->whatsapp_mobile}}</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-12 text-right">
                <h2 class="primary text-uppercase">Invoice</h2>
                <p class="pb-3"># {{$final_data[0]['order_id']}}</p>
                
              </div>
            </div>
            <!-- Invoice Company Details ends -->
            <!-- Invoice Customer Details starts -->
            <div id="invoice-customer-details" class="row">
              <div class="col-12 text-left">
                <p class="text-muted mb-1">Bill To</p>
              </div>
              <div class="col-md-6 col-12">
                <ul class="m-0 list-unstyled">
                  <li class="text-bold-800">{{$final_data[0]['get_user']['first_name'].' '.$final_data[0]['get_user']['last_name']}} </li>
                  <li>{{$final_data[0]['get_user']['address']}}</li>
                  {{-- <li>Dhamtari (C.G),</li>
                  <li>Pin No: 493773</li> --}}
                </ul>
              </div>
              <div class="col-md-6 col-12 text-right">
                <p><span class="text-muted">Invoice Date :</span> {{date('d-m-Y', strtotime($final_data[0]['updated_at']))}}</p>
                {{-- <p><span class="text-muted">Terms :</span> Due on Receipt</p> --}}
                <p class="m-0"><span class="text-muted">Due Date :</span> {{date('d-m-Y', strtotime($final_data[0]['updated_at']))}}</p>
              </div>
            </div>
            <!-- Invoice Customer Details ends -->
            <!-- Invoice Items Details starts -->
            <div id="invoice-items-details">
              <div class="row">
                <div class="table-responsive col-12">
                  <table class="table mt-3">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Item &amp; Description</th>
                        <th class="text-right">Rate</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Amount</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($final_data as $key => $product_items)
                      <tr>

                        <th scope="row">{{$loop->iteration}}</th>
                        <td>
                          <p>{{$product_items['product_details'][0]['product_name']}}</p>
                        </td>
                        <td class="text-right">₹ {{number_format($product_items['order_price'], 2)}}</td>
                        <td class="text-right">{{$product_items['order_quantity']}}</td>
                        <td class="text-right">₹ {{number_format($product_items['order_price'] * $product_items['order_quantity'], 2)}} </td> 
                        @php
                          $total += $product_items['order_price'] * $product_items['order_quantity'];
                        @endphp
                      </tr>
                      @endforeach
                      
                     
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row mt-3 mt-md-0">
                <div class="col-md-6 col-12 text-left">
                  
                  <div class="row">
                    <div class="col-12">
                      <table class="table table-borderless table-sm">
                        <tbody>
                          <tr>
                            <td><p class="text-bold-700 mb-1 ml-1">Payment Methods: </p></td>
                            <td class="text-right">{{$final_data[0]['order_mode']}}</td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Total Amount</td>
                          <td class="text-right">{{number_format($total, 2)}}</td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Invoice Items Details ends -->
            <!-- Invoice Footer starts -->
            <div id="invoice-footer">
              <div class="row mt-2 mt-sm-0">
                <div class="col-md-6 col-12 d-flex align-items-center">
                  <div class="terms-conditions mb-2">
                    {{-- <h6>Terms &amp; Condition</h6>
                    <p>You know, being a test pilot isn't always the healthiest business in the world. We predict too much for the next year and yet far too little for the next 10.</p> --}}
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="signature text-center">
                    <p>Authorized person</p>
                    {{-- <img src="../app-assets/img/pages/signature-scan.png" alt="signature" width="250">
                    <h6 class="mt-4">Amanda Orton</h6> --}}
                    <p class="text-muted">Managing Director</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 text-center text-sm-right">
                  <!-- <button  class="btn btn-primary btn-print mt-2 mt-md-1"><i class="ft-printer mr-1"></i>Print Invoice</button> -->
 				         <button class="btn btn-primary print_invoice_btn">Print</button>
                </div>
              </div>
            </div>
            <!-- Invoice Footer ends -->
          </div>
        </div>
      </div>
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <script type="text/javascript">
		  $('.print_invoice_btn').on('click', function() {  
		  window.print();  
		  return false; // why false?
		});
	  </script>
  </body>
</html>


