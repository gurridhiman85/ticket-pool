
    <!--============================== Footer Start ==============================-->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="footer-upper d-flex flex-wrap">
                        <div class="Footer-left d-flex flex-wrap">
                            <div class="fl-Contact">
                                <div class="fl-heading">
                                    <h2> Contact </h2>
                                </div>
                                <a href="#" class="fl-address d-flex flex-wrap align-items-center position-relative">
                                    <div class="fl-address-icon">
                                        <img src="/front/assets/images/map-icon.svg">
                                    </div>
                                    <h4> 2/2 Kirkham Road West Keysborough <br> VIC 3173 Australia </h4>
                                </a>
                                <a href="mailto:abc@example.com"
                                    class="fl-address d-flex flex-wrap align-items-center position-relative">
                                    <div class="fl-address-icon">
                                        <img src="/front/assets/images/mail-icon.svg">
                                    </div>
                                    <h4> info@densugroup.com.au </h4>
                                </a>
                            </div>
                            <div class="fl-button">
                                <div class="fl-heading">
                                    <h2> Information </h2>
                                </div>
                                <ul class="fl-list">
                                    <li class="fl-item"> <a href="#!"> MY ACCOUNT </a> </li>
                                    <li class="fl-item"> <a href="#!"> ORDER TRACKER </a> </li>
                                    <li class="fl-item"> <a href="#!"> ORGANISATIONS </a> </li>
                                    <li class="fl-item"> <a href="#!"> CUSTOMER EXPERIENCES </a> </li>
                                    <li class="fl-item"> <a href="#!"> FAQ </a> </li>
                                    <li class="fl-item"> <a href="#!"> WEB CONDITIONS </a> </li>
                                    <li class="fl-item"> <a href="#!"> SECURITY </a> </li>
                                    <li class="fl-item"> <a href="#!"> PRIVACY </a> </li>
                                    <li class="fl-item"> <a href="#!"> CLEAR SESSION </a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="Footer-right d-flex flex-wrap">
                            <div class="fr-left">
                                <div class="fl-heading">
                                    <h2> Category </h2>
                                </div>
                                <ul class="fl-list">
                                    <li class="fl-item"> <a href="#!"> Apparel / Clothing </a> </li>
                                    <li class="fl-item"> <a href="#!"> Bags </a> </li>
                                    <li class="fl-item"> <a href="#!"> Business </a> </li>
                                    <li class="fl-item"> <a href="#!"> Custom Made</a> </li>
                                    <li class="fl-item"> <a href="#!"> Drinkware </a> </li>
                                    <li class="fl-item"> <a href="#!"> Headwear </a> </li>
                                    <li class="fl-item"> <a href="#!"> Key Rings </a> </li>
                                    <li class="fl-item"> <a href="#!"> Leisure </a> </li>
                                    <li class="fl-item"> <a href="#!"> Pens </a> </li>
                                </ul>
                            </div>
                            <div class="fr-right">
                                <ul class="fl-list">
                                    <li class="fl-item"> <a href="#!"> Personal </a> </li>
                                    <li class="fl-item"> <a href="#!"> Print </a> </li>
                                    <li class="fl-item"> <a href="#!"> Promotion </a> </li>
                                    <li class="fl-item"> <a href="#!"> Special Orders</a> </li>
                                    <li class="fl-item"> <a href="#!"> Technology </a> </li>
                                    <li class="fl-item"> <a href="#!"> Tools </a> </li>
                                    <li class="fl-item"> <a href="#!"> World Source </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-lower">
            <h4> Copyright © Densu Group 2020. All Rights Reserved </h4>
        </div>
    </footer>
    <!--============================== Footer End ==============================-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/front/assets/js/jquery.min.js"></script>
    <script src="/front/assets/js/bootstrap.min.js"></script>
    <script src="/front/assets/js/custom.js"></script>
    

<script>
$(document).ready(function() {
            // Delay the hide operation by 3000 milliseconds (3 seconds)
            setTimeout(function() {
                $('#successMessage').fadeOut('slow');
            }, 3000);
        });


const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);

var input = document.querySelector('#qty');
var btnminus = document.querySelector('.qtyminus');
var btnplus = document.querySelector('.qtyplus');

if (input !== undefined && btnminus !== undefined && btnplus !== undefined && input !== null && btnminus !== null && btnplus !== null) {
	
	var min = Number(input.getAttribute('min'));
	var max = Number(input.getAttribute('max'));
	var step = Number(input.getAttribute('step'));

	function qtyminus(e) {
		var current = Number(input.value);
		var newval = (current - step);
		if(newval < min) {
			newval = min;
		} else if(newval > max) {
			newval = max;
		} 
		input.value = Number(newval);
		e.preventDefault();
	}

	function qtyplus(e) {
		var current = Number(input.value);
		var newval = (current + step);
		if(newval > max) newval = max;
		input.value = Number(newval);
		e.preventDefault();
	}
		
	btnminus.addEventListener('click', qtyminus);
	btnplus.addEventListener('click', qtyplus);
  
} 
</script>
</body>
</html>
<script src="/front/assets/js/cart.js"></script>