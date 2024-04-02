
@include('admin.shared.viw_header')
  
<div class="container popupbox">
            <div style="text-align:right">
                <input type="button" name="ctl00$ctl00$Body$Body$btnOverlay_Close" value="X" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btnOverlay_Close','')" id="Body_Body_btnOverlay_Close" class="btn btn-danger">
            </div>
            
            <div id="Body_Body_pnlSubOverlay">
		
                <div id="Body_Body_pnl_Overlay_Contacts" class="container">
			
                    <h2>Staff Member Profile</h2>
                    <div class="row">
                        <div class="col-lg-4">First Name: <input name="ctl00$ctl00$Body$Body$txtFirstName" type="text" value="" id="Body_Body_txtFirstName" class="form-control" placeholder="First Name" required="required" style="width:100%;"><br></div>
                        <div class="col-lg-4">Last Name: <input name="ctl00$ctl00$Body$Body$txtLastName" type="text" value="" id="Body_Body_txtLastName" class="form-control" placeholder="Last Name" required="required" style="width:100%;"><br></div>
                        <div class="col-lg-4">Position: <input name="ctl00$ctl00$Body$Body$txtPosition" type="text" value="" id="Body_Body_txtPosition" class="form-control" placeholder="Position" required="required" style="width:100%;"><br></div>
                        <div class="col-lg-3">Primary Email: <input name="ctl00$ctl00$Body$Body$txtPrimaryEmail" type="text" value="" id="Body_Body_txtPrimaryEmail" class="form-control" placeholder="Primary Email" required="required" style="width:100%;"><br></div>
                        <div class="col-lg-3">Work Phone: <input name="ctl00$ctl00$Body$Body$txtWorkPhone" type="text" value="" id="Body_Body_txtWorkPhone" class="form-control" placeholder="Work Phone" style="width:100%;"><br></div>
                        <div class="col-lg-3">Mobile Phone: <input name="ctl00$ctl00$Body$Body$txtMobilePhone" type="text" value="" id="Body_Body_txtMobilePhone" class="form-control" placeholder="Mobile Phone" style="width:100%;"><br></div>
                        <div class="col-lg-3">Home Phone: <input name="ctl00$ctl00$Body$Body$txtHomePhone" type="text" id="Body_Body_txtHomePhone" class="form-control" placeholder="" style="width:100%;"><br></div>

                        <div class="col-lg-3"><input id="Body_Body_cbAdminPortalAccess" type="checkbox" name="ctl00$ctl00$Body$Body$cbAdminPortalAccess" checked="checked" onclick="javascript:setTimeout('__doPostBack(\'ctl00$ctl00$Body$Body$cbAdminPortalAccess\',\'\')', 0)"><label for="Body_Body_cbAdminPortalAccess">Admin Portal Access</label><br></div>
                        <div class="col-lg-3"><input id="Body_Body_cbDeleted" type="checkbox" name="ctl00$ctl00$Body$Body$cbDeleted"><label for="Body_Body_cbDeleted">Deleted</label><br></div>
                        <div class="col-lg-3"><input id="Body_Body_cbRestricted" type="checkbox" name="ctl00$ctl00$Body$Body$cbRestricted"><label for="Body_Body_cbRestricted">Restricted</label><br></div>
                        
                        <div id="Body_Body_pnlAdminPortalAccess" class="col-lg-12">
				
                            <br>
                            <h4>Admin Portal Access</h4>
                            <div class="row">
                                <div class="col-lg-4"><input id="Body_Body_cbAdminUserActive" type="checkbox" name="ctl00$ctl00$Body$Body$cbAdminUserActive" checked="checked"><label for="Body_Body_cbAdminUserActive">Active</label><br></div>
                                <div class="col-lg-4">
                                    <input type="submit" name="ctl00$ctl00$Body$Body$btnSendWelcomeEmailAdmin" value="Send Welcome Email" id="Body_Body_btnSendWelcomeEmailAdmin" class="btn btn-warning btn-block">
                                    
                                    <br>
                                </div>
                                <div class="col-lg-4"><input type="submit" name="ctl00$ctl00$Body$Body$btnResetPasswordAdmin" value="Reset Password" id="Body_Body_btnResetPasswordAdmin" class="btn btn-warning btn-block"><br></div>
                                <div class="col-lg-12">Landing Page (If unset, leave as '/Default'): <input name="ctl00$ctl00$Body$Body$txtAdminPortalLandingPage" type="text" value="/Default" id="Body_Body_txtAdminPortalLandingPage" class="form-control" placeholder="Landing Page" required="required" style="width:100%;"><br></div>
                            </div>
                        
			</div>

                        <div id="Body_Body_pnlAdminPortalAccessPermissions" class="col-lg-12">
				
                            <br>
                            <h4>Admin Portal Access Permission <input type="submit" name="ctl00$ctl00$Body$Body$btnAdminSelectAllPermissions" value="Select All" id="Body_Body_btnAdminSelectAllPermissions" class="btn btn-info"> <input type="submit" name="ctl00$ctl00$Body$Body$btnAdminDeselectAllPermissions" value="Deselect All" id="Body_Body_btnAdminDeselectAllPermissions" class="btn btn-info"></h4>
                            <div class="row">
                                
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_0" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl00$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_0">View Dashboard</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_1" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl01$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_1">View Clients</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_2" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl02$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_2">Edit Clients</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_3" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl03$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_3">View Clients Notes</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_4" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl04$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_4">Edit Clients Notes</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_5" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl05$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_5">View Clients Appointments</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_6" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl06$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_6">Edit Clients Appointments</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_7" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl07$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_7">View Clients Contacts</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_8" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl08$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_8">View Client Contact View As</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_9" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl09$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_9">Edit Clients Contacts</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_10" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl10$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_10">View Clients Address</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_11" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl11$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_11">Edit Clients Address</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_12" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl12$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_12">View Clients Business Details</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_13" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl13$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_13">Edit Clients Business Details</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_14" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl14$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_14">View Clients Billing</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_15" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl15$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_15">Edit Clients Billing</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_16" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl16$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_16">View Clients Documents</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_17" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl17$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_17">Edit Clients Documents</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_18" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl18$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_18">View Clients Fixed Orders</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_19" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl19$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_19">Change Clients Active Fixed Orders</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_20" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl20$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_20">View Suppliers</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_21" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl21$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_21">Edit Suppliers</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_22" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl22$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_22">View Suppliers Notes</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_23" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl23$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_23">Edit Suppliers Notes</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_24" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl24$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_24">View Suppliers Contacts</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_25" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl25$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_25">Edit Suppliers Contacts</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_26" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl26$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_26">View Suppliers Address</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_27" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl27$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_27">Edit Suppliers Address</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_28" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl28$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_28">View Suppliers Business Details</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_29" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl29$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_29">Edit Suppliers Business Details</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_30" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl30$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_30">View Suppliers Billing</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_31" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl31$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_31">Edit Suppliers Billing</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_32" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl32$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_32">View Suppliers Documents</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_33" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl33$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_33">Edit Suppliers Documents</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_34" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl34$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_34">Clients Send Welcome Email</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_35" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl35$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_35">Clients Reset Password</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_36" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl36$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_36">Products Edit</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_37" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl37$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_37">Products View</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_38" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl38$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_38">Products View Purchase Price</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_39" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl39$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_39">View Staff</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_40" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl40$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_40">Edit Staff</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_41" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl41$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_41">Staff Send Welcome Email</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_42" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl42$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_42">Staff Reset Password</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_43" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl43$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_43">View Messages</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_44" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl44$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_44">View Shared Mailboxes</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_45" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl45$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_45">Send Shared Mailboxes</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_46" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl46$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_46">View System Settings</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_47" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl47$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_47">View Database</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_48" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl48$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_48">Backup Database</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_49" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl49$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_49">Billing Core View</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_50" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl50$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_50">Billing Core Edit</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_51" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl51$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_51">Billing Accounts Receivable View</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_52" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl52$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_52">Billing Accounts Receivable Edit</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_53" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl53$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_53">Billing Accounts Receivable Update Due Date</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_54" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl54$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_54">Billing Accounts Receivable Master Override</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_55" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl55$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_55">Billing Accounts Payable View</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_56" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl56$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_56">Billing Accounts Payable Edit</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_57" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl57$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_57">Billing Accounts Payable Approve For Payment</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_58" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl58$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_58">Billing Accounts Payable Show Void</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_59" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl59$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_59">Billing Accounts Reporting ADMIN ONLY</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_60" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl60$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_60">Billing Accounts Reporting Job Costing ADMIN ONLY</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_61" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl61$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_61">Billing Synchronisation Service</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_62" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl62$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_62">Edit Admin System Users</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_63" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl63$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_63">Communications Email</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_64" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl64$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_64">Orders View</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_65" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl65$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_65">Orders Edit</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_66" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl66$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_66">Orders Add</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_67" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl67$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_67">Orders Approve</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_68" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl68$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_68">Orders Approve for Customer</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_69" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl69$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_69">Orders Approve Stages</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_70" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl70$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_70">Orders Void</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_71" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl71$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_71">Orders Hold</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_72" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl72$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_72">Orders Alter Mark Up</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_73" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl73$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_73">Orders Override to Production</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_74" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl74$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_74">Orders Place with Standard Mark Up</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_75" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl75$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_75">Orders Apply Discount</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_76" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl76$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_76">Orders Part Ship</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_77" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl77$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_77">Orders View Void</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_78" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl78$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_78">Orders Dispatch</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_79" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl79$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_79">View Timesheets Module</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_80" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl80$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_80">Submit Timesheets</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_81" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl81$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_81">Manage Timesheets</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_82" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl82$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_82">View Link Manager</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_83" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl83$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_83">Manage Link Manager</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_84" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl84$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_84">Customer Groups Edit and View</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_85" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl85$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_85">Content Manager Edit and View</label><br></div>
                                        
                                    
                                        <div class="col-lg-3"><input id="Body_Body_rptAdminPortalAccessPermissions_cbPermission_86" type="checkbox" name="ctl00$ctl00$Body$Body$rptAdminPortalAccessPermissions$ctl86$cbPermission" checked="checked"><label for="Body_Body_rptAdminPortalAccessPermissions_cbPermission_86">Promo Code Edit and View</label><br></div>
                                        
                                    
                            </div>
                        
			</div>

                        <div class="col-lg-12" style="text-align:right">
                            
                            <p>
                                <input type="submit" name="ctl00$ctl00$Body$Body$btnSubmitContact" value="Submit" id="Body_Body_btnSubmitContact" class="btn btn-success">
                            </p>
                        </div>
                    </div>
           
                
		</div>       
            
	</div>
        </div>
@include('admin.shared.viw_footer')