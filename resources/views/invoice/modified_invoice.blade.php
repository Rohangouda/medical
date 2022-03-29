<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <title>{{$page_title}}</title>
    </head>
    <style type="text/css">
    body {
    margin: 0;
    padding: 0;
    background: #e1e1e1;
    }
    div,
    p,
    a,
    li,
    td {
    -webkit-text-size-adjust: none;
    }
    .ReadMsgBody {
    width: 100%;
    background-color: #ffffff;
    }
    .ExternalClass {
    width: 100%;
    background-color: #ffffff;
    }
    body {
    width: 100%;
    height: 100%;
    background-color: #e1e1e1;
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased;
    }
    html {
    width: 100%;
    }
    p {
    padding: 0 !important;
    margin-top: 0 !important;
    margin-right: 0 !important;
    margin-bottom: 0 !important;
    margin-left: 0 !important;
    }
    .visibleMobile {
    display: none;
    }
    .hiddenMobile {
    display: block;
    }
    @media only screen and (max-width: 600px) {
    body {
    width: auto !important;
    }
    table[class=fullTable] {
    width: 96% !important;
    clear: both;
    }
    table[class=fullPadding] {
    width: 85% !important;
    clear: both;
    }
    table[class=col] {
    width: 45% !important;
    }
    .erase {
    display: none;
    }
    }
    @media only screen and (max-width: 420px) {
    table[class=fullTable] {
    width: 100% !important;
    clear: both;
    }
    table[class=fullPadding] {
    width: 85% !important;
    clear: both;
    }
    table[class=col] {
    width: 100% !important;
    clear: both;
    }
    table[class=col] td {
    text-align: left !important;
    }
    .erase {
    display: none;
    font-size: 0;
    max-height: 0;
    line-height: 0;
    padding: 0;
    }
    .visibleMobile {
    display: block !important;
    }
    .hiddenMobile {
    display: none !important;
    }
    }
    .container {
    /* Used to position the watermark */
    position: relative;
    }
    .container__wrapper {
    /* Center the content */
    align-items: center;
    display: flex;
    justify-content: center;
    /* Absolute position */
    left: 0px;
    position: absolute;
    top: 0px;
    /* Take full size */
    height: 100%;
    width: 100%;
    }
    .container__watermark {
    color: #00000033;
    font-size: 3.8rem;
    font-weight: bold;
    text-transform: uppercase;
    transform: rotate(-35deg);
    user-select: none;
    opacity: 0.3;
    }
    .text-center {
        text-align: center;
    }
    .pt-2 {
        padding-top: 20px;
    }
    .btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    .btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
    }

    </style>
    <body>
        @php 
          $total = 0;
          $total_saving = 0;
          $total_mrp = 0;
        @endphp
        <nav>
            <div class="text-center pt-2">
                <button class="btn btn-primary" id="doPrint"><i class="fas fa-print"></i> Print</button>
            </div>
        </nav>
        <div id="printDiv">
            <div class="container">
                <!-- Watermark container -->
                <div class="container__wrapper">
                    <!-- The watermark -->
                    <div class="container__watermark">
                        {{-- <img style="height: 2em;" src="{{ asset('images/logo.jpeg') }}" alt=""> --}}
                        <span>Peepal</span>
                        <span style="background-color: green; color: white;"> Store</span>
                    </div>
                </div>
                <table id="print-area-1" class="print-area" width="100%" border="0" cellpadding="0" cellspacing="0"
                    align="center" class="fullTable" bgcolor="#e1e1e1">
                    <tr>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                                bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
                                <tr class="hiddenMobile">
                                    <td height="40"></td>
                                </tr>
                                <tr class="visibleMobile">
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                            class="fullPadding">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                            align="left" class="col">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <img src="{{ asset('images/logo.jpeg') }}"
                                                                        width="82" height="82" alt="logo" border="0" />
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <tr class="hiddenMobile">
                                                                    <td height="40"></td>
                                                                </tr>
                                                                <tr class="visibleMobile">
                                                                    <td height="20"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 14px; color: #5b5b5b; /*/*font-family: 'Open Sans', sans-serif;*/*/ line-height: 18px; vertical-align: top; text-align: left;">
                                                                        Hello, {{$final_data[0]['get_user']['first_name'].' '.$final_data[0]['get_user']['last_name']}}
                                                                        <br> Thank you for Ordering from Peepal Store
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                            align="right" class="col">
                                                            <tbody>
                                                                <tr class="visibleMobile">
                                                                    <td height="20"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-weight: bold; font-size: 25px; color: black; letter-spacing: -1px;
                                                                        /*/*font-family: 'Open Sans', sans-serif;*/ */
                                                                        line-height: 1; vertical-align: top; text-align: right;">
                                                                        Peepal <span style="background-color: green; padding: 6px; color: white;"> Store</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <tr class="hiddenMobile">
                                                                        <td height="50"></td>
                                                                    </tr>
                                                                    <tr class="visibleMobile">
                                                                        <td height="20"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 14px; color: #5b5b5b; 
                                                                            /*/*font-family: 'Open Sans', sans-serif;*/*/
                                                                             line-height: 18px; vertical-align: top; text-align: right;">
                                                                            <small>ORDER</small> <b># {{$final_data[0]['order_id']}}</b><br />
                                                                            <small> <b> {{date('d-m-Y', strtotime($final_data[0]['updated_at']))}} </b></small>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                        bgcolor="#e1e1e1">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullTable" bgcolor="#ffffff">
                                        <tbody>
                                            <tr>
                                                <tr class="hiddenMobile">
                                                    <td height="60"></td>
                                                </tr>
                                                <tr class="visibleMobile">
                                                    <td height="40"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="550" border="0" cellpadding="0" cellspacing="12" align="center"
                                                            class="fullPadding">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="font-size: 14px; 
                                                                    /*/*font-family: 'Open Sans', sans-serif;*/*/
                                                                    color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;"
                                                                        width="45%" align="left">
                                                                        Item & Description
                                                                    </th>
                                                                    <th style="width: 8%; font-size: 14px; 
                                                                    /*/*font-family: 'Open Sans', sans-serif;*/*/
                                                                     color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                                        align="left">
                                                                        Rate
                                                                    </th>
                                                                    <th style="width: 8%; font-size: 14px; 
                                                                    /*/*font-family: 'Open Sans', sans-serif;*/ */
                                                                    color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                                        align="center">
                                                                        Quantity
                                                                    </th>
                                                                    <th style="width: 10%; font-size: 14px; 
                                                                    /*/*font-family: 'Open Sans', sans-serif;*/*/
                                                                     color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                                        align="right">
                                                                        MRP
                                                                    </th>
                                                                    <th style="width: 12%; font-size: 14px; /*font-family: 'Open Sans', sans-serif;*/ color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                                        align="right">
                                                                        Peepal Amt
                                                                    </th>
                                                                    <th style="width: 10%; font-size: 14px; /*font-family: 'Open Sans', sans-serif;*/ color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                                        align="right">
                                                                        Saving
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td height="1" style="background: #bebebe;" colspan="6"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="10" colspan="4"></td>
                                                                </tr>
                                                                @foreach($final_data as $key => $product_items)
                                                                @php
                                                                  $total += $product_items['order_price'];

                                                                  // $total_mrp = {{number_format($product_items['product_details'][0]['product_extra_prop']['price'], 2)}};

                                                                  $total_saving += number_format(number_format($product_items['product_details'][0]['product_extra_prop']['mrp_price'], 2) * $product_items['order_quantity'] - number_format($product_items['product_details'][0]['product_extra_prop']['price'], 2) * $product_items['order_quantity'], 2);
                                                                @endphp
                                                                <tr>
                                                                    <td style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: green;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                                        class="article">
                                                                        {{$product_items['product_details'][0]['product_name']}}
                                                                        
                                                                    </td>
                                                                    <td
                                                                        style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                                        <small>₹ {{number_format($product_items['product_details'][0]['product_extra_prop']['price'], 2)}}</small>
                                                                    </td>
                                                                    <td style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                                    align="center">{{$product_items['order_quantity']}}</td>
                                                                    <td style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                                    align="right"><i class="fas fa-rupee-sign"></i>  {{number_format($product_items['order_mrp'], 2)}}</td>
                                                                    <td style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                                    align="right"><i class="fas fa-rupee-sign"></i> {{number_format($product_items['order_price'], 2)}}</td>
                                                                    <td style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                                    align="right">
                                                                    {{number_format(number_format($product_items['product_details'][0]['product_extra_prop']['mrp_price'], 2) * $product_items['order_quantity'] - number_format($product_items['product_details'][0]['product_extra_prop']['price'], 2) * $product_items['order_quantity'], 2)}}
                                                                    <i class="fas fa-rupee-sign"></i></td>
                                                                </tr>
                                                                
                                                                @endforeach
                                                                <tr>
                                                                    <td height="1" colspan="6"
                                                                        style="border-bottom:1px solid #e4e4e4">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="20"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                            bgcolor="#e1e1e1">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                                            class="fullTable" bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    
                                                    <td>
                                                        <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                                            class="fullPadding">
                                                            <tbody>
                                                                
                                                                <tr>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                                        <strong>Grand Total (Incl.Tax)</strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                                        <strong>₹ {{number_format($total, 2)}}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                                        <strong>Total Discount</strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                                        <strong>₹ {{number_format($total_saving, 2)}}</strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                            bgcolor="#e1e1e1">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                                            class="fullTable" bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="60"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="40"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                                                class="fullPadding">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="220" border="0" cellpadding="0"
                                                                                cellspacing="0" align="left" class="col">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="font-size: 11px; /*font-family: 'Open Sans', sans-serif;*/ color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                                                                            <strong>BILLING INFORMATION</strong>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td width="100%" height="10"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                                            {{$get_store_address->address}}<br>{{$get_store_address->email}}<br/>
                                                                                            {{$get_store_address->whatsapp_mobile}}
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table width="220" border="0" cellpadding="0"
                                                                                cellspacing="0" align="right" class="col">
                                                                                <tbody>
                                                                                    <tr class="visibleMobile">
                                                                                        <td height="20"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="font-size: 11px; /*font-family: 'Open Sans', sans-serif;*/ color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                                                                            <strong>PAYMENT METHOD</strong>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td width="100%" height="10"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="font-size: 12px; /*font-family: 'Open Sans', sans-serif;*/ color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                                            <a href="#"
                                                                                            style="color: green; text-decoration:underline;">{{$final_data[0]['order_mode']}}</a><br>
                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="60"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="30"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                                bgcolor="#e1e1e1">
                                <tr>
                                    <td>
                                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                                            bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                                            <tr>
                                                <td>
                                                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                                        class="fullPadding">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="text-align:center; font-style: italic; font-size: 26px; color: #5b5b5b; /*font-family: 'Open Sans', sans-serif;*/ line-height: 18px; vertical-align: top;">
                                                                    Have a nice day.
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="spacer">
                                                <td height="50"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20"></td>
                                </tr>
                            </table>
                        </div>
                    </body>
                    <script>
                    document.getElementById("doPrint").addEventListener("click", function () {
                    var printContents = document.getElementById('printDiv').innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                    });
                    </script>
                </html>