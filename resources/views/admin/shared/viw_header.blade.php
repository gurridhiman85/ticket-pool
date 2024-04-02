<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin | Dansu Gruop</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    @section('head_js')
        @include('assetlib.head_js')
    @show
  </head>
  <body>
    <!--navbar creation-->

    <nav
      class="navbar  sticky-top navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body"
      data-bs-theme="dark"
    >
      <div class="container-fluid ">
        <a class="navbar-brand text-warning" href="{{ route('admin/dashboard') }}"> Densu Group </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('admin/dashboard') }}"
                >Dashboard</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer') }}">Customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.orders') }}">Orders(<?php echo $total_orders ?? 0 ;?>)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_parent" href="message.html">Messaging</a>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Administration
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('admin/accounting/default')}}">Accounting</a></li>
                 <li><a class="dropdown-item" href="#">Customer Groups</a></li>
                <li><a class="dropdown-item" href="index.html">Database</a></li>
                <li><a class="dropdown-item" href="./Administration/email.html">Email</a></li>
                <li><a class="dropdown-item" href="{{ route('admin/inventory') }}">Inventory</a></li>
                <li>
                  <a class="dropdown-item" href="#">Microsoft Authorisation</a>
                </li>
                <li><a class="dropdown-item" href="./Administration/staff.html">Staff</a></li>
                <li><a class="dropdown-item" href="index.html">Suppliers</a></li>
                <li><a class="dropdown-item" href="./Administration/timesheet.html">Timesheets</a></li>
                <li>
                  <a class="dropdown-item" href="./Administration/web-content.html">Web - Content Manager</a>
                </li>
                <li>
                  <a class="dropdown-item" href="./Administration/web-organisation.html"
                    >Web - Organisation Manager</a
                  >
                </li>
                <li><a class="dropdown-item" href="./Administration/web-promo.html">Web - Promo Codes</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex me-2" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
          </form>
          <div class="dropdown me-4">
            <a
              class="btn btn-secondary dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
            {{ $userName ?? 0 }}
            </a>

            <ul class="dropdown-menu text-center me-auto">
              <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    
    <!--dashboard creation-->
   
      <!--order creation-->
    
