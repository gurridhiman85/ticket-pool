@include('admin.shared.viw_header')
<div class="container">
        <br /><br />
        <input type="submit" name="ctl00$ctl00$Body$Body$btnReporting" value="Reporting" id="Body_Body_btnReporting" class="btn btn-warning" style="width:100%;" />
        <br />
        <input type="submit" name="ctl00$ctl00$Body$Body$btnSynchronisationService" value="Synchronisation Service" id="Body_Body_btnSynchronisationService" class="btn btn-primary" style="width:100%;" />
    </div>
    <div id="Body_Body_pnlSales" class="container">
	
        <h1>Sales</h1>
        <div class="row">
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary" onclick="toggleDropdown()">+ New <span class="caret"></span></button>
                            <div class="dropdown-menu" id="dropdownMenu">
                                <a class="dropdown-item" href="{{route('admin/accounting/createinvoice')}}">Invoice</a>
                                <a class="dropdown-item" href="{{route('admin/accounting/newQuotes')}}">Quote</a>
                                <a class="dropdown-item" href="#">Credit Note</a>
                            </div>
                        </div>

                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <input type="button" name="ctl00$ctl00$Body$Body$AR_btnStatements" value="Statements" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AR_btnStatements&#39;,&#39;&#39;)" id="Body_Body_AR_btnStatements" class="btn btn-primary" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-6">
                <p style="text-align:right">
                    <input type="button" name="ctl00$ctl00$Body$Body$AR_btnSearch" value="Search" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AR_btnSearch&#39;,&#39;&#39;)" id="Body_Body_AR_btnSearch" class="btn btn-primary" />
                </p>
            </div>
        </div>
        <hr />
      <h3>Invoices <span style="font-size:small">
    <a id="Body_Body_AR_btnInvoicesPaid" href="{{ url('invoices/paid') }}">Paid</a> |
    <a id="Body_Body_AR_btnInvoicesPendingApproval" href="{{ url('invoices/pending-approval') }}">Pending Approval</a> |
    <a id="Body_Body_AR_btnInvoicesAwaitingPayment" href="{{ url('invoices/awaiting-payment') }}">Awaiting Payment</a> |
    <a id="Body_Body_AR_btnInvoicesAll" href="{{ url('invoices/all') }}">All</a>
</span></h3>

<div class="row">
    <div class="col-lg-3" style="background: linear-gradient(#f2f2f2, #f9f9f9); box-shadow: 0 1px 3px rgba(221, 221, 221, 0.5); height: 120px; padding-top: 15px;">
        <p style="text-align:center">
            <span class="h5">Draft</span><br />
            <span class="h3">None</span>
        </p>
    </div>
    <div class="col-lg-3" style="background: linear-gradient(#f2f2f2, #f9f9f9); box-shadow: 0 1px 3px rgba(221, 221, 221, 0.5); height: 120px; padding-top: 15px;">
        <p style="text-align:center">
            <span class="h5">Awaiting Approval</span><br />
            <span class="h3">None</span>
        </p>
    </div>
    <div class="col-lg-3" style="background: linear-gradient(#f2f2f2, #f9f9f9); box-shadow: 0 1px 3px rgba(221, 221, 221, 0.5); height: 120px; padding-top: 15px;">
        <p style="text-align:center">
            <span class="h5">Awaiting Payment (82)</span><br />
            <span class="h3">$73756.87</span><br />
            <span class="h5">$44951.26 (40 Sent)</span>
        </p>
    </div>
    <div class="col-lg-3" style="background: linear-gradient(#f2f2f2, #f9f9f9); box-shadow: 0 1px 3px rgba(221, 221, 221, 0.5); height: 120px; padding-top: 15px;">
        <p style="text-align:center">
            <span class="h5">Overdue (82)</span><br />
            <span class="h3" style="color: red;">$73756.87</span><br />
            <span class="h5" style="color: red;">$44951.26 (40 Sent)</span>
        </p>
    </div>
</div>

        <br />
        <div class="row">
            <div class="col-lg-6">
                Total Debtors
                <hr />
                <p style="text-align:center">
                    <span id="Body_Body_Label1" class="h2">$0.00</span>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row"><div class="col-lg-6" style="text-align:left">Customers owing the most</div><div class="col-lg-6" style="text-align:right"><a id="Body_Body_AR_btnAllAwaitingPayment" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AR_btnAllAwaitingPayment&#39;,&#39;&#39;)">All</a></div></div>
                <hr />
                <table style="width:100%">
                    <tr style="border-bottom:1px solid black">
                        <th>Customer</th>
                        <th>Balance</th>
                    </tr>
                    
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    Sexyland
                                </td>
                                <td>
                                    <a href="Statement.aspx?AccountNumber=5010014">$7730.95</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    All Star Access Hire
                                </td>
                                <td>
                                    <a href="Statement.aspx?AccountNumber=5009116">$5773.90</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    Boss Building Supplies
                                </td>
                                <td>
                                    <a href="Statement.aspx?AccountNumber=5009229">$5458.68</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    CMV Truck & Bus - Traralgon
                                </td>
                                <td>
                                    <a href="Statement.aspx?AccountNumber=5009320">$4634.93</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    Maben Group Pty Ltd
                                </td>
                                <td>
                                    <a href="Statement.aspx?AccountNumber=5010275">$3395.27</a>
                                </td>
                            </tr>
                        
                    
                </table>
            </div>
        </div>
    
</div>
    <div id="Body_Body_pnlPurchases" class="container">
	
        <br /><br />
        <h1>Purchases</h1>
        <div class="row">
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">+ New
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                <li><a id="Body_Body_AP_btnNewBill" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnNewBill&#39;,&#39;&#39;)">Bill</a></li>
                                <li><a id="Body_Body_AP_btnNewQuote" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnNewQuote&#39;,&#39;&#39;)">Quote</a></li>
                                <li><a id="Body_Body_AP_btnNewCreditNote" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnNewCreditNote&#39;,&#39;&#39;)">Credit Note</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <input type="button" name="ctl00$ctl00$Body$Body$AP_btnStatements" value="Statements" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnStatements&#39;,&#39;&#39;)" id="Body_Body_AP_btnStatements" class="btn btn-primary" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-6">
                <p style="text-align:right">
                    <input type="button" name="ctl00$ctl00$Body$Body$AP_btnSearch" value="Search" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnSearch&#39;,&#39;&#39;)" id="Body_Body_AP_btnSearch" class="btn btn-primary" />
                </p>
            </div>
        </div>
        <hr />
        <h3>Bills  <span style="font-size:small"><a id="Body_Body_AP_btnBillsPaid" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnBillsPaid&#39;,&#39;&#39;)">Paid</a> | <a id="Body_Body_AP_btnBillsPendingApproval" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnBillsPendingApproval&#39;,&#39;&#39;)">Pending Approval</a> | <a id="Body_Body_AP_btnBillsAwaitingPayment" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnBillsAwaitingPayment&#39;,&#39;&#39;)">Awaiting Payment</a> | <a id="Body_Body_AP_btnBillsAll" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnBillsAll&#39;,&#39;&#39;)">All</a></span></h3>
        <div class="row">
            <div class="col-lg-3" style="background: linear-gradient(#f2f2f2,#f9f9f9); box-shadow: 0 1px 3px rgba(221,221,221,0.5); height:120px; padding-top:15px">
                <p style="text-align:center">
                    <span class="h5">Draft (117)</span><br />
                    <span id="Body_Body_lblDraftBills" class="h3">$21312.14</span>
                </p>
            </div>
            <div class="col-lg-3" style="background: linear-gradient(#f2f2f2,#f9f9f9); box-shadow: 0 1px 3px rgba(221,221,221,0.5); height:120px; padding-top:15px">
                <p style="text-align:center">
                    <span class="h5">Awaiting Approval (31)</span><br />
                    <span id="Body_Body_lblAwaitingApprovalBills" class="h3">$9954.9</span>
                </p>
            </div>
            <div class="col-lg-3" style="background: linear-gradient(#f2f2f2,#f9f9f9); box-shadow: 0 1px 3px rgba(221,221,221,0.5); height:120px; padding-top:15px">
                <p style="text-align:center">
                    <span class="h5">Awaiting Payment (218)</span><br />
                    <span id="Body_Body_lblAwaitingPaymentBills" class="h3">$66812.69</span>
                </p>
            </div>
            <div class="col-lg-3" style="background: linear-gradient(#f2f2f2,#f9f9f9); box-shadow: 0 1px 3px rgba(221,221,221,0.5); height:120px; padding-top:15px">
                <p style="text-align:center">
                    <span class="h5">Overdue (218)</span><br />
                    <span id="Body_Body_lblOverdueBills" class="h3" style="color:Red;">$66812.69</span>
                </p>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-lg-6">
                Total Creditors
                <hr />
                <p style="text-align:center">
                    <span id="Body_Body_lblTotalDebtors" class="h2">$66812.69</span>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row"><div class="col-lg-6" style="text-align:left">Supplier owing the most</div><div class="col-lg-6" style="text-align:right"><a id="Body_Body_AP_btnAllAwaitingPayment" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$AP_btnAllAwaitingPayment&#39;,&#39;&#39;)">All</a></div></div>
                <hr />
                <table style="width:100%">
                    <tr style="border-bottom:1px solid black">
                        <th>Supplier</th>
                        <th>Balance</th>
                    </tr>
                    
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    Shiny Pty Ltd
                                </td>
                                <td>
                                    <a href="Statement.aspx?SupplierNumber=5008848">$12603.80</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    J S Laser
                                </td>
                                <td>
                                    <a href="Statement.aspx?SupplierNumber=5008493">$10822.19</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    Promotion T-shirt Pty Ltd
                                </td>
                                <td>
                                    <a href="Statement.aspx?SupplierNumber=5008763">$7860.55</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    Workwear Group - Hard Yakka & KingGee
                                </td>
                                <td>
                                    <a href="Statement.aspx?SupplierNumber=5010368">$7464.75</a>
                                </td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid black">
                                <td>
                                    TSCO
                                </td>
                                <td>
                                    <a href="Statement.aspx?SupplierNumber=5008987">$7313.44</a>
                                </td>
                            </tr>
                        
                    
                </table>
            </div>
        </div>
    
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
//<![CDATA[

theForm.oldSubmit = theForm.submit;
theForm.submit = WebForm_SaveScrollPositionSubmit;

theForm.oldOnSubmit = theForm.onsubmit;
theForm.onsubmit = WebForm_SaveScrollPositionOnSubmit;
Sys.Application.add_init(function() {
    $create(Sys.UI._Timer, {"enabled":true,"interval":3600000,"uniqueID":"ctl00$ctl00$tmrCore"}, null, null, $get("tmrCore"));
});
Sys.Application.add_init(function() {
    $create(Sys.Extended.UI.AutoCompleteBehavior, {"completionInterval":15,"completionSetCount":12,"delimiterCharacters":"","id":"Body_actxtCoreSearch","serviceMethod":"NavBar_Search","servicePath":"../Modules/SystemServices/AutoComplete.asmx"}, {"hidden":acCSClientHidden,"itemSelected":CSItemSelectedA,"shown":acCSClientShown}, null, $get("Body_txtCoreSearch"));
});
//]]>

function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
@include('admin.shared.viw_footer')