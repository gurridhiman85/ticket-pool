@include('front.shared.viw_header')
<div class="content-container">
    <div class="container">
        <div class="row">
            <dov class="col-lg-12">
                <div class="product-details d-flex flex-wrap">
                    <div class="product-details-left">
                        <div class="product-imgs">
                            <div class="img-display">
                                <div class="img-showcase">
                                    <img src="{{ asset('storage/app/public/images/inventory/' . $inventory_info->image) }}" alt="pd-img">
                                    <img src="public/front/assets/images/product-img-2.png" alt="pd-img">
                                    <img src="public/front/assets/images/product-img-3.png" alt="pd-img">
                                    <img src="public/front/assets/images/product-img-4.png" alt="pd-img">
                                </div>
                            </div>
                            <div class="img-select">
                                <div class="img-item">
                                    <a href="#" data-id="1">
                                        <img src="{{ asset('storage/app/public/images/inventory/' . $inventory_info->image) }}" alt="pd-img">
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="2">
                                        <img src="public/front/assets/images/product-img-2.png" alt="pd-img">
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="3">
                                        <img src="public/front/assets/images/product-img-3.png" alt="pd-img">
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="4">
                                        <img src="public/front/assets/images/product-img-4.png" alt="pd-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details-right">
                        <div class="product-details-content">
                            <div class="amount-box d-flex align-content-center">
                                <h4> Price :- </h4>
                                <div class="amount"><?php echo $inventory_info->price;?> </div>
                            </div>
                            <div class="pd-heading">
                                <h4><?php echo $inventory_info->item_name;?></h4>
                                <p> 100% Polyester - 175 gsm. 144 Filament supreme microfibre polyester, moisture wicking properties, 
                                    highly breathable and quick dry, button free placket - food industry safe. </p>
                            </div>
                            <div class="size">
                                <h6> Size :- </h6>
                                <div class="psize active">M</div>
                                <div class="psize">L</div>
                                <div class="psize">XL</div>
                                <div class="psize">XXL</div>
                            </div>
                            <div class="quantity d-flex flex-wrap align-items-center">
                                <h6> Quantity :- </h6>
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" enctype="multipart/form-data">
                                @csrf    
                                <div class="qty">
                                        <button class="qtyminus" aria-hidden="true">&minus;</button>
                                            <input type="number" name="product_qty" id="product_qty" min="1" max="10" step="1" value="1">
                                        <button type="button" class="qtyplus" aria-hidden="true">&plus;</button>
                                    </div>
                            </div>
                            <div class="pd-details-btn"> 
                        <input type="hidden" name="product_id" value="{{ $inventory_info->id }}">
                        <input type="hidden" name="product_name" value="{{ $inventory_info->item_name }}">
                        <input type="hidden" name="product_price" value="{{ $inventory_info->price }}">
                        <input type="hidden" name="product_image" value="{{ $inventory_info->image }}">
                        <button type="submit" class="btn">Add To Cart</button>
                        <!-- <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModalTogglebtn">Customise Now</button> -->
                        <a class="btn custom  btn-success" data-bs-toggle="modal" href="#exampleModalTogglebtn" role="button">Customize Now</a>

                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </dov>
        </div>
        <div class="row commerce-modal">
        <div class="col-12">
            <div class="modal fade" id="exampleModalTogglebtn" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered size">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <nav>
                        <div class="nav nav-tabs justify-content-around" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">ADD IMAGE</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">ADD TEXT</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">ADD LAYERS</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                            <div class="card p-3 shadow">
                                <form action="">
                                <input type="file" id="fileElem">
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row justify-content-center">
                            <div class="col-4">
                            <div class="card shadow">
                                <form class="p-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Enter text here"></textarea>
                                <button type="button" class="btn custom">Submit Text</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                            <div class="card shadow">
                                <h2>Manage layers</h2>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        


        </div>
    </div>
</div>
        <!--============================== Content Container Start ==============================-->
    </main>
@include('front.shared.viw_footer')
