<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>
  <!DOCTYPE html>
  <!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
  <html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css/style.scss">


    <link rel="icon" href="img/LOGO.png" />
  </head>


  <body>
    
    <div class="sidebar ">
      <div class="logo-details">
         <i class="bi bi-flower1"></i>
        <span class="logo_name">Reflex Cakes</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="manageProducts.php">
            <i class='bx bx-box'></i>
            <span class="links_name" href="manageProducts.php">Product</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul'></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="manageUsers.php">
            <i class='bx bx-pie-chart-alt-2'></i>
            <span class="links_name" href="manageUsers.php">Analytics</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack'></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="sellingHistory.php">
            <i class='bx bx-book-alt'></i>
            <span class="links_name" href="sellingHistory.php">Total order</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user'></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message'></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart'></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog'></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="adminSignin.php">
            <i class='bx bx-log-out'></i>

            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class='bx bx-menu sidebarBtn'></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search...">
          <i class='bx bx-search'></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">Admin's Name</span>
          <i class='bx bx-chevron-down'>

          </i>
        </div>
        <div class="Amenu-heading">
      <h1 class="fw-bold text-dark"  style="width: 300px;">Hey Admins</h1>
      <!-- <div class="specialoffer"><img src="images/specialoffers.png" alt=""></div> -->
      <!-- <p> <a href="home.php">home</a> / checkout </p> -->
    </div>
      </nav>

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Daily Earnings</div>

              <?php

              $today = date("Y-m-d");
              $thismonth = date("m");
              $thisyear = date("Y");

              $a = "0";
              $b = "0";
              $c = "0";
              $e = "0";
              $f = "0";

              $invoice_rs = Database::search("SELECT * FROM `invoice`");
              $invoice_num = $invoice_rs->num_rows;

              for ($x = 0; $x < $invoice_num; $x++) {
                $invoice_data = $invoice_rs->fetch_assoc();

                $f = $f + $invoice_data["qty"]; //total qty

                $d = $invoice_data["date"];
                $splitDate = explode(" ", $d); //separate date from time
                $pdate = $splitDate[0]; //sold date

                if ($pdate == $today) {
                  $a = $a + $invoice_data["total"];
                  $c = $c + $invoice_data["qty"];
                }
                $splitMonth = explode("-", $pdate); //separate date as year,month & date
                $pyear = $splitMonth[0]; //year
                $pmonth = $splitMonth[1]; //month

                if ($pyear == $thisyear) {
                  if ($pmonth == $thismonth) {
                    $b = $b + $invoice_data["total"];
                    $e = $e + $invoice_data["qty"];
                  }
                }
              }
              ?>
              <span class="number">Rs. <?php echo $a; ?> .00</span>

              <!-- <div class="number">40,876</div> -->
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Monthly Earnings</div>
              <div class="number">Rs. <?php echo $b; ?> .00</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from Last month</span>
              </div>
            </div>
            <i class='bx bxs-cart-add cart two'></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Today Sellings</div>
              <div class="number"><?php echo $c; ?> Items</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bx-cart cart three'></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Monthly Sellings</div>
              <div class="number"><?php echo $e; ?> Items</div>
              <div class="indicator">
                <i class='bx bx-down-arrow-alt down'></i>
                <span class="text">Down From Today</span>
              </div>
            </div>
            <i class='bx bxs-cart-download cart four'></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Sellings</div>
              <div class="number"><?php echo $f; ?> Items</div>
              <div class="indicator">
                <i class='bx bx-down-arrow-alt down'></i>
                <span class="text">Down From Today</span>
              </div>
            </div>
            <i class='bx bxs-cart-download cart four'></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Engagements</div>

              <?php
              $user_rs = Database::search("SELECT * FROM `user`");
              $user_num = $user_rs->num_rows;
              ?>
              <div class="number"><?php echo $user_num; ?> Members</div>
            </div>
            <i class='bx bxs-cart-download cart four'></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Recent Sales</div>




            <div class="sales-details">
              <ul class="details">
                <li class="topic">Date</li>
                <li><a href="#">28 March 2023</a></li>
                
              </ul>
              <ul class="details">
                <li class="topic">Customer</li>
                <li><a href="#">Ravindu chamika</a></li>
               
              </ul>
              <ul class="details">
                <li class="topic">Sales</li>
                <li><a href="#">Delivered</a></li>
                
              </ul>
              <ul class="details">
                <li class="topic">Total</li>
                <li><a href="#">Rs. 5000. 00</a></li>
                
              </ul>
            </div>
            <div class="button">
              <a href="#">See All</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Top Sold Product and Top Of Famouse Seller</div>
            <br />
            <hr class="col-12" />
            <div class="offset-1 col-10 col-lg-4 my-3 rounded bg-body">
              <div class="row g-1">
                <div class="col-6 text-center">
                  <label class="form-label fs-4 fw-bold text-decoration-underline">Mostly Sold Item</label>
                </div>
                
                 
                
                  <div class="col-12 text-center shadow">
                    <img src="resource/empty.svg" class="img-fluid rounded-top" style="height: 250px;" />
                  </div>
                  <div class="col-12 text-center my-3">
                    <span class="fs-5 fw-bold">-----</span><br />
                    <span class="fs-6">--- items</span><br />
                    <span class="fs-6">Rs. ----- .00</span>
                  </div>
                

                <!-- <div class="col-12">
                                    <div class="first-place"></div>
                                </div> -->
              </div>
            </div>

            <div class="offset-1 col-10 col-lg-4 my-3 rounded bg-body">
              <div class="row g-1">
                
                  <div class="col-12 text-center">
                    <label class="form-label fs-4 fw-bold text-decoration-underline">Most Famouse Seller</label>
                  </div>
                  <div class="col-12 text-center shadow">
                    <img src="" class="img-fluid rounded-top" style="height: 250px;" />
                  </div>
                  <div class="col-12 text-center my-3">
                    <span class="fs-5 fw-bold"></span><br />
                    <span class="fs-6"></span><br />
                    <span class="fs-6"></span>
                  </div>
                
                  <div class="col-12 text-center">
                    <label class="form-label fs-4 fw-bold text-decoration-underline">Most Famouse Seller</label>
                  </div>
                  <div class="col-12 text-center shadow">
                    <img src="resource/new_user.svg" class="img-fluid rounded-top" style="height: 250px;" />
                  </div>
                  <div class="col-12 text-center my-3">
                    <span class="fs-5 fw-bold">----- -----</span><br />
                    <span class="fs-6">-----</span><br />
                    <span class="fs-6">----------</span>
                  </div>
                

                <!-- <div class="col-12">
                                    <div class="first-place"></div>
                                </div> -->
              </div>
            </div>




            
          </div>
        </div>
      </div>
    </section>
    <section>
      <!-- selling history -->



      <!-- selling history -->
    </section>

    <?php include "Bfooter.php"; ?>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
          sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    </script>

  </body>

  </html>

<?php

} else {
  echo ("You are Not a valid user");
}

?>