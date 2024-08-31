@extends('layouts.main')

@section('title')
Order Payment - WebCraft Shop | Build your own website | Websites store India
@endsection

@section('description')
WebCraft Shop is website builder tool for all kind of websites, Working to bring small business online. Cheaper & Quality Websites with Laravel & Angular Frameworks
@endsection

@section('keywords')
best website builder, online store, Blog, ecommerce website, ecomerce, online store website, Free hosting, ecommerce platforms, buy online, webcraft Shop, e commerce, website maker
@endsection

@section('page-image')
https://www.webcraftshop.com/public/images/logo.png
@endsection


@section('content')

<div class="nx-home"><div class="container">
    <div class="home-box">
        <h2 class="home-h2">Order payment <span>WebCraft Shop</span></h2>
        <h3>WebCraft Shop values your money and status to provide you more than you need.</h3>
    </div>
</div></div>

<div class="nx-pay"><div class="container p40_">

    @foreach ($orders as $order)
    <div class="nx-pay-box col-xs-12 col-sm-8 col-md-8 col-lg-8">
        
        <div class="pay-chamber">
            <div><h3 class="chamber-head">Product:</h3></div>

            @if ($order->productCode == 'SHOWCASE')
                <h2 class="pay-name">Company Profile Static Website</h2>
                <p>Website with hosting for 1 year. Products Showcase with detailed description for your clients with Send Enquery feature to get requests for your products.</p>
            @elseif ($order->productCode == 'PROFILE')
                <h2 class="pay-name">Company Profile with Dashboard Website</h2>
                <p>Website with hosting for 1 year. Products Showcase with detailed description for your clients with Send Enquery feature to get requests for your products.</p>
            @elseif ($order->productCode == 'BLOG')
                <h2 class="pay-name">Bloggers Website</h2>
                <p>Website with hosting for 1 year. Products Showcase with detailed description for your clients with Send Enquery feature to get requests for your products.</p>
            @elseif ($order->productCode == 'ECOMMERCE')
                <h2 class="pay-name">E-Commerce Website</h2>
                <p>Website with hosting for 1 year. Products Showcase with detailed description for your clients with Send Enquery feature to get requests for your products.</p>
            @endif
                <h2 class="pay-cost"><i class="fa fa-{{ $currencyIcon }}"></i> {{ $order->orderCost }}/Year</h2>
            <p></p>
        </div>

        <!-- <div class="pay-chamber">
            <div><h3 class="chamber-head">Credit or Debit card:</h3></div>
            <div>



            </div>
        </div> -->
        
        <div class="pay-chamber">
            <div><h3 class="chamber-head">Order Details:</h3></div>
            <div class="row p20_">
                <dl class="dl-horizontal">
                    <dt>Order ID : </dt>
                        <dd>{{ $order->orderCode }}</dd>
                    <dt>Name : </dt>
                        <dd>{{ $order->orderName }}</dd>
                    <dt>Email ID : </dt>
                        <dd>{{ $order->orderEmail }}</dd>
                </dl>
            </div>

            <div><h3 class="chamber-head">Order Address:</h3></div>
            <div class="row p20_">
                <dl class="dl-horizontal">
                <dt>Address : </dt>
                    <dd>{{ $order->addrText }}</dd>
                <dt>City : </dt>
                    <dd>{{ $order->addrCity }}</dd>
                <dt>State : </dt>
                    <dd>{{ $order->addrState }}</dd>
                <dt>Country : </dt>
                    <dd>{{ $order->addrCountry }}</dd>
                <dt>Pin Code : </dt>
                    <dd>{{ $order->addrPincode }}</dd>
                </dl>
            </div>
        </div>

    </div><!-- nx-pay-box Ends here -->


    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

        <div class="pay-bill row">
        <div><h3 class="chamber-head">Payments:</h3></div>

            <div class="row pay-val">
                <h4 class="pull-left">Subtotal</h4>
                <h4 class="pull-right"><i class="fa fa-{{ $currencyIcon }}"></i> {{ $order->orderCost }}</h4>
            </div>

            <div class="row pay-val">
                <h4 class="pull-left">Estimated Taxes</h4>
                <h4 class="pull-right"><i class="fa fa-{{ $currencyIcon }}"></i> {{ $taxCost }}</h4>
            </div>

            <div class="row pay-val">
                <h4 class="pull-left"><strong>Total ({{ $order->orderCurrency }})</strong></h4>
                <h4 class="pull-right"><i class="fa fa-{{ $currencyIcon }}"></i> {{ $finalCost }}</h4>
            </div><br>

            @if ($order->orderCurrency == 'INR')
            <form method="post" name="customerData" action="{{ url('order/payment/ccav') }}">
                {{ csrf_field() }}
                <input type="hidden" name="tid" id="tid" />
                <input type="hidden" name="order_id" value="{{ $order->orderCode }}" />
                <input type="hidden" name="amount" id="amount" value="'.$oAmount.'" />

                <input type="submit" class="btn btn-block btn-lg" value="Proceed to Checkout (INR)" />
            </form>

            @elseif ($order->orderCurrency == 'GBP')
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="8KUEW8FR52STY">
                <table>
                <tr><td><input type="hidden" name="on0" value="Package"></td></tr><tr><td>
                <select name="os0" type="hidden" class="hidden">
                    <option value="Products Buzz">Products Buzz $69.00 USD</option>
                    <option value="Product Store">Product Store $99.00 USD</option>
                    <option value="Product Store PRO">Product Store PRO $149.00 USD</option>
                </select></td></tr>
                </table>
                <input type="hidden" name="currency_code" value="USD">
                <input type="submit" class="btn btn-block btn-lg" name="submit" value="Proceed to Checkout (USD)">
            </form>

            @elseif ($order->orderCurrency == 'USD')
            <div><h3 class="chamber-head">Credit or Debit card:</h3></div>

            <form action="{{ url('order/payment/stripe') }}" method="post" id="checkout-form">
                {{ csrf_field() }}

                <input type="hidden" name="token" />
                <input type="hidden" name="orderCode" value="{{ $order->orderCode }}">
                <input type="hidden" name="orderEmail" value="{{ $order->orderEmail }}">
                <input type="hidden" name="orderCost" value="{{ $order->orderCost }}">
                <input type="hidden" name="currencyIcon" value="{{ $currencyIcon }}">
                
                <div class="group">
                    <span>Card number</span>
                <label>
                    <div id="card-number-element" class="field"></div>
                    <span class="brand"><i class="pf pf-credit-card" id="brand-icon"></i></span>
                </label>

                <span>Expiry date</span>
                <label>
                    <div id="card-expiry-element" class="field"></div>
                </label>

                <span>CVC</span>
                <label>
                    <div id="card-cvc-element" class="field"></div>
                </label>

                <span>Postal code</span>
                <label>
                    <div id="postal-code-element" class="field"></div>
                </label>
                </div>
                <button type="submit">CheckOut</button>
                <div class="outcome">
                    <div class="error" id="card-errors"></div>
                    <div class="success">
                        Success! Your Stripe token is <span class="token"></span>
                    </div>
                </div>

            </form>


                <!-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="card-number" class="">Card Number</label>
                        <input type="text" id="card-number" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="card-expiry-month" class="">Expiration Month</label>
                                <input type="text" id="card-expiry-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="card-expiry-year" class="">Expiration Year</label>
                                <input type="text" id="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="card-cvc" class="">CVC</label>
                        <input type="text" id="card-cvc" class="form-control" required>
                    </div>
                </div>
                {{ csrf_field() }}
                <hr>
                <div class="col-md-12">
                    <div class="form-group nx-links">
                        <input type="submit" class="nx-btn btn-lg btn-block" value="CheckOut Now" />
                    </div>
                </div> 

            </form>-->
            @endif

        </div><br><br>

    </div>
    @endforeach

</div></div>

@endsection

@section('scripts')
<script src="{{ asset('public/js/checkout.js') }}" type="text/javascript"></script>
@endsection