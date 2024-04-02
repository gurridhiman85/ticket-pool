@include('front.shared.viw_header')
        <!--==============================  Content Container Start ==============================-->
        <div class="content-container bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-lower m-0">
                            <div class="contact-heading">
                                <h4> BILLING INFORMATION </h4>
                            </div>
                            <form action="{{ route('shop.place.order') }}"  method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-input col-md-6">
                                        <label class="form-label">First Name*</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-input col-md-6">
                                        <label class="form-label">Last Name*</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-input col-md-12">
                                        <label class="form-label">E-Mail Address*</label>
                                        <input type="text" class="form-control" aria-label="Business Name">
                                    </div>
                                    <div class="form-input col-md-6">
                                        <label class="form-label">Country*</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="Australia">Australia</option>
                                        </select>
                                    </div>
                                    <div class="form-input col-md-6">
                                        <label class="form-label">State*</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected> </option>
                                            <option value="victoria">Victoria</option>
                                        </select>
                                    </div>
                                    <div class="form-input col-md-6">
                                        <label class="form-label">Zip Code*</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                    <div class="form-input col-md-6">
                                        <label class="form-label">Account no.</label>
                                        <input type="text" class="form-control" name="account_no" required>
                                    </div>
                                    <div class="form-input col-md-12 h-100">
                                        <label class="form-label">Address*</label>
                                        <textarea class="form-control" required name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                <?php $total = 0; foreach($cart_info as $info) {
                                  $subtotal = $info['price'] * $info['product_qty'];
                                  $total += $subtotal;}?>
                                <div class="form-input col-md-6">
                                        <label class="form-label">Total Amount</label>
                                        <input type="text" class="form-control" name="total" value="<?php echo isset($total)?$total:'';?>">
                                    </div>
                                    <div class=" col-md-6">
                                    <label class="form-label">Payment Type</label><br>
                                  <input type="radio" value="cash" name="pay_type">  Cash on delivery  
                                    </div>
                                </div>
                            <div class="contact-btn-box d-flex justify-content-end">
                              <input type="submit" name="submit" class="btn btn-warning" value="Place Order">
                            </div>
                                </form>
                                @if(session('success'))
        <div id="successMessage" class="alert alert-success">{{ session('success') }}</div>
        @endif
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <!--==============================  Content Container Start ==============================-->
    </main>
    <!--============================== Main End ==============================-->

@include('front.shared.viw_footer')
