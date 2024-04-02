{{-- admin.viw_orders.blade.php --}}
@include('admin.shared.viw_header')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <div id="Body_Body_pnlMain" class="container-fluid">
	
        <div id="Body_Body_pnl_Main_NewOrderWizard" class="container-fluid">
		
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" style="margin-top:5px; margin-right:5px">
                        <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order" value="Order" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_Order" class="btn btn-info" />
                    </li>
                    <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
                        
                    </li>
                    <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
                        
                    </li>
                </ul>
                <div id="tabContentOrder" class="tab-content">
                    <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
			
                        
                        
                        
                        
                        
                        
                        <h1>Order Wizard </h1>
                        <p style="text-align:center">
                            
                        </p>
                        
                        
                        
                        
                        
                        <div id="Body_Body_pnl_NewOrderWizard_ExistingItemView">
				
                            <!--<input name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_ExistingItemView_ItemSearch" type="text" id="Body_Body_txt_NewOrderWizard_ExistingItemView_ItemSearch" class="form-control" placeholder="Search" style="width:100%;" />-->
                            
                            <input type="text" id="filterInput" placeholder="Search..." class="form-control">
                                <ul id="filteredItems"></ul>
                            <br />
                            <p style="text-align:center">
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ExistingItemView_AddCustomItem" value="Add Custom Item" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_ExistingItemView_AddCustomItem&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_ExistingItemView_AddCustomItem" class="btn btn-primary btn-lg" />&nbsp;
                            </p>
                        
                            
                            <input type="hidden" name="ctl00$ctl00$Body$Body$hf_NewOrderWizard_ExistingItemView_ItemSearch" id="Body_Body_hf_NewOrderWizard_ExistingItemView_ItemSearch" />
                            <script type="text/javascript">
                                function SearchItemSelectedA(sender, e) {
                                    $get("Body_Body_hf_NewOrderWizard_ExistingItemView_ItemSearch").value = e.get_value();
                                    __doPostBack('Body_Body_txt_NewOrderWizard_ExistingItemView_ItemSearch', '');
                                }
                                function acSearchClientShown(source, args) {

                                    source._popupBehavior._element.style.zIndex = 100000;
                                }

                                function acSearchClientHidden(source, args) {

                                    source._popupBehavior._element.style.zIndex = 100000;

                                }
                            </script>
                        
			</div>
                        
                        
                        
                        
                        
                    
		</div>
                    
                    
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
	</div>
        
        
        
        
    
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <br />
    <br />


    
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#filterInput').on('input', function () {
            var keyword = $(this).val();

            $.ajax({
                url: '{{ route("filter.items") }}',
                type: 'GET',
                data: { keyword: keyword },
                success: function (response) {
                    var itemsList = $('#filteredItems');
                    itemsList.empty();

                    $.each(response.items, function (index, item) {
                       var itemLink = '{{ route("filter.items") }}/' + item.id +'/'+ {{$orderInfo->id}} ;
                        
                        // Append the list item with a hyperlink
                        itemsList.append('<li><a href="' + itemLink + '">' + item.item_code + '</a></li>');
                  
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>>
    
    

@include('admin.shared.viw_footer')

<!-- Include jQuery -->
