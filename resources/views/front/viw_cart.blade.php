@include('front.shared.viw_header')
     <!--============================== Content Container Start ==============================-->
     <div class="content-container">
            <div class="container">
                <div class="row">
                    <dov class="col-lg-12">
                    @if(session('success'))
                      <div id="successMessage" class="alert alert-success">{{ session('success') }}</div>
                     @endif
                        <div class="shopping-content-box">
                            <h3> YOUR CART </h3>
                            <ul class="shopping-list"> 
                              <?php 
                              if(!empty($cart_info)){
                              $count=1;$total = 0;foreach($cart_info as $info) {
                                  $subtotal = $info['price'] * $info['product_qty'];
                                  $total += $subtotal;?>
                                <li class="shopping-item"> 
                                    <div class="sb-box d-flex flex-wrap align-content-center">
                                        <div class="sb-left">
                                        <div class="sb-img">
                                <img src="{{ asset('storage/app/public/images/inventory/' . ($info['product_image'] ?? '')) }}" alt=""/></div>
                                            <div class="sb-text"> 
                                                <h5><?php echo $info['item_name']?> </h5>
                                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                                    Lorem Ipsum has been the industry's standard </p>
                                                <div class="sb-price"><?php echo '$'.$info['price']?></div>
                                            </div> 
                                        </div>
                                        <div class="sb-right">
                                            <div class="sb-value-box"> 
                                                <h4> Quantity </h4>
                                                <div class="sb-value"><?php echo $info['product_qty'] ?? ''?> </div>
                                            </div>
                                            <div class="sb-value-box"> 
                                                <h4> Remove </h4>
                                                <a href="{{ route('remove_product', ['id' => $info['id']]) }}">
                                                  <div class="sb-value"> X </div>
                                              </a>  
                                            </div>
                                        </div>
                                    </div>
                                </li>         
                                <?php }} 
                                else{?>
                                <div class="text-center">
                                  <span class="text-danger">Your cart is empty</span>
                                </div>
                                <?php }?>
                       
                            </ul>
                            <div class="shopping-chart-details d-flex flex-wrap ">
                                <div class="co-left">
                                    <div class="co-btn-box">
                                        <a href="{{ asset('/') }}" class="btn btn-gray"> Continue Shopping </a> 
                                    </div>    
                                    <div class="co-coupon-box">
                                        <h5> COUPON </h5>
                                        <p> Enter your coupon code if you have any one </p>
                                        <div class="co-coupon-btn-box">
                                            <a href="#!" class="btn co-btn btn-gray"> Coupon code </a> 
                                            <a href="#!" class="btn btn-gray"> APPLY COUPON </a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="co-right">
                                    <div class="co-cart">
                                       <div class="co-name"> Shipping </div> 
                                       <div class="co-amount">  $50.00</div> 
                                    </div>
                                    <div class="co-value">
                                       <div class="co-name"> Total </div> 
                                       <div class="co-amount"><?php echo isset($total)? '$'.$total + 50 :''; ?></div> 
                                    </div>
                                    <div class="chack-out-btn">
                                        <a href="{{ route('shop.cart.checkout') }}" class="btn btn-gray"> Checkout </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="product-content-box">
                                <h4> CALL US ON 1300 258 487 </h4>
                                <div class="product-content-btn"> <a href="#!" class="btn btn-gray"> contact us </a> </div>
                            </div>

                        </div>
                    </dov>
                </div>
            </div>
        </div>
        <!--============================== Content Container Start ==============================-->

        


    </main>
@include('front.shared.viw_footer')
