
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>order-mail</title>
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
    
    <div id="printDiv">
        <div class="container">
            <!-- Watermark container -->
            <div class="container__wrapper">
                <!-- The watermark -->
                <div class="container__watermark">
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
                                                                    style="font-size: 14px; color: #5b5b5b; line-height: 18px; vertical-align: top; text-align: left;">
                                                                    New order arrived from <b>{{$data[0]['user_name']}}</b>

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
                                                                    style="font-weight: bold; font-size: 25px; color: black; letter-spacing: -1px; line-height: 1; vertical-align: top; text-align: right;">
                                                                    Peepal <span
                                                                        style="background-color: green; padding: 6px; color: white;">
                                                                        Store</span>
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
                                                                    style="font-size: 15px; color: #5b5b5b; line-height: 18px; vertical-align: top; text-align: right;">
                                                                    <small>ORDER</small> <b># {{$data[0]['order_id']}}</b><br />
                                                                    <small> <b> </b></small>
                                                                    
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
                                            <table width="100%" cellpadding="0" class="fullPadding">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="width: 20%; font-size: 14px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;">
                                                            S.No.
                                                        </th>
                                                        <th style="font-size: 14px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;">
                                                            Item & Description
                                                        </th>
                                                        
                                                        <th style="width: 20%; font-size: 14px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;">
                                                            Quantity
                                                        </th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $order_items)
                                                        <tr class="text-center">
                                                            <td style="width: 20%; font-size: 14px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;">{{$loop->iteration}}</td>
                                                            <td style="font-size: 14px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;">{{$order_items['product_name'] .' /'.$order_items['weight'].''.$order_items['product_unit']}}</td>
                                                            <td style="width: 20%; font-size: 14px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;">{{$order_items['quantity']}}</td>
                                                        </tr>
                                                    @endforeach
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
           
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable "
                bgcolor="#e1e1e1">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                                class="fullTable" bgcolor="#ffffff">
                                <tbody>
                                
                                    <tr >
                                        <td style="width: 8%; font-size: 14px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                        align="center">
                                            @php
                                                $res = \DB::table('xit_contact_us')->select(DB::raw('*'))->first(); 
                                            @endphp
                                            {{$res->address}}
                                            <br>
                                            {{$res->mobile}}
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

        </div>
</body>

</html>