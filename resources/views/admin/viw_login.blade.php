<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin| Dansu Group</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container-fluid ">
         <div class="row gx-0">
            <div class="col-md-6 col-12">
             <img src="/admin/assets/images/silhouette-confident-businesspeople.jpg" alt="company" style="width:100%; height: 100%;"/>
            </div>
            <div class=" col-12 col-md-6">
                <form action="valid-auth" class="mx-3" method="post" id="loginform">
                @csrf
                   <div >
                       <img src="/admin/assets/images/6343825.jpg" alt="Logo" style="width:30%; height:10%px;">
                   </div>
                   <h1>Densu Group | Admin | Login</h1>
                   <div id="error_msg" class="alert" style="display:none;"></div>
               <!-- <div class="mb-3">
                   <label for="" class="form-label">Username</label>
                   <input type="text" class="form-control" name="username" id="username" >
                 </div> -->
               <div class="mb-3">
                 <label for="" class="form-label">Email address</label>
                 <input type="text" class="form-control" name="email" id="email">
               </div>
               <div class="mb-3">
                 <label for="" class="form-label">Password</label>
                 <input type="text" class="form-control" name="password" id="password">
               </div>
               <button type="submit" class="btn btn-primary login_btn">Submit</button>
             </form>
             <div class="copyright mx-3">
               Copyright © Densu Group 2023. All Rights Reserved.<br /><br />
               All data on this site, and copied to and from this site remains the
               intellectual property of Densu Group.
             </div>
           </div>
            </div>
          
      
     
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </body>
</html>
<script src="/admin/assets/js/login.js"></script>