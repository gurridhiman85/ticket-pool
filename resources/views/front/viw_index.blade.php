@include('front.shared.viw_header')
    <!--============================== Hero Container Start ==============================-->
    <div class="hero-container d-flex align-items-end position-relative">
        <div class="hero-bg" style="background-image: url(public/front/assets/images/hero-img.jpg);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="hero-btn-box">
                            <a href="#!" class="btn"> download now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Hero Container End ==============================-->
     
    <!--============================== Content Container Start ==============================-->
    <div class="content-container bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="product-list d-flex flex-wrap justify-content-center">
                    <?php foreach($inventory_info as $info) {?>
                        <li class="product-item">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="{{ asset('storage/app/public/images/inventory/' . $info->image) }}" alt="" />
                                </div>
                                <div class="product-text">
                                    <h5><?php echo $info->item_name;?></h5>
                                </div>
                            </div>
                            <div class="text-center">
                            <a href="{{ route('shop.item', ['productid' => $info->id]) }}" class="btn btn-warning bg-warning">View & Buy</a>

                            </div>
                            <!-- <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $info->id }}">
                                <input type="hidden" name="product_name" value="{{ $info->item_name }}">
                                <input type="hidden" name="product_price" value="{{ $info->price }}">
                                <button type="submit" class="btn btn-primary">Add To Cart</button>
                            </form> -->
                        </li>
                    <?php }?>    
                    </ul>
                    <div class="product-btn-box">  <a href="#!" class="btn"> View More </a>  </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Content Container End ==============================-->

    <!--============================== Content Container Start ==============================-->
    <div class="content-container bg-dark-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-heading">
                        <h4> JOIN DENSU GROUP </h4>
                        <p> TO STAY IN TOUCH AND GET GIFTS, PROMOCODES AND MORE </p>
                    </div>
                    <div class="form-body">                  
                       <from>
                            <div class="row">
                                <div class="form-input col-md-4">
                                    <input type="text" class="form-control" placeholder="Business Name" aria-label="Business Name">
                                </div>
                                <div class="form-input col-md-4">
                                    <input type="text" class="form-control" placeholder="First Name*" aria-label="First Name*">
                                </div>
                                <div class="form-input col-md-4">
                                    <input type="text" class="form-control" placeholder="Last Name*" aria-label="Last Name*">
                                </div>
                                <div class="form-input col-md-12">
                                    <input type="text" class="form-control" placeholder="Your E-mail" aria-label="Your E-mail">
                                </div>
                                <div class="form-input col-md-12">
                                    <div class="search">
                                        <input type="text" class="search-input" >
                                        <button type="submit" class="search-button">SUBSCRIBE</button>
                                    </div>
                                </div>
                            </div>
                       </from>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Content Container Start ==============================-->

    </main>   
    <!--============================== Main End ==============================--> 

    <!-- Modal -->
<div style="z-index:1;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul id="cartContent"></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@include('front.shared.viw_footer')
<script src="public/front/assets/js/cart.js"></script>
