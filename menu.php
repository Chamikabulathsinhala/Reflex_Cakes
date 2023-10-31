<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reflex Cakes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js"> -->
    <link rel="stylesheet" href="css.css/style.scss">

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="icon" href="img/LOGO.png">
</head>

<body style="background-color: black;">
    <div class="row">
    <?php include "header.php";?>

        <div class="menu-heading">
            <h3>Menu</h3>
            <!-- <div class="specialoffer"><img src="images/specialoffers.png" alt=""></div> -->
            <!-- <p> <a href="home.php">home</a> / checkout </p> -->
        </div>
        <!-- search -->
        <div class="input-group mt-3 mb-3">
            <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt">

            <select class="form-select" style="max-width: 250px;" id="basic_search_select">
                <option value="0">All Categories</option>

                <?php



                $category_rs = Database::search("SELECT * FROM `category`");
                $category_num = $category_rs->num_rows;

                for ($x = 0; $x < $category_num; $x++) {
                    $category_data = $category_rs->fetch_assoc();
                ?>

                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                <?php
                }

                ?>

            </select>

        </div>

        <div class="col-12 col-lg-2 d-grid">
            <button class="btn btn-primary mt-3 mb-3" onclick="basicSearch(0);">Search</button>
        </div>

        <!-- search -->

        <?php
        $c_rs = Database::search("SELECT * FROM `category`");
        $c_num = $c_rs->num_rows;

        for ($y = 0; $y < $c_num; $y++) {
            $cdata = $c_rs->fetch_assoc();

        ?>



            <!-- category name -->
            <div class="heading col-12" id="soup" >
                <h1 class="firstTopic"><?php echo $cdata["name"]; ?></h1>
            </div>

            <!-- category name -->
            <section class="category container" id="basicSearchResult">


                <?php

                $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cdata["id"] . "' AND `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc();

                ?>


                    <div class="box">
                        <!-- <a href="#" class="fas fa-heart" style="text-decoration: none;"></a> -->
                        <div class="image">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>

                            <img src="<?php echo $image_data["code"]; ?>" alt="">
                        </div>
                        <div class="content">
                            <!-- <h3>delicious food</h3> -->
                            <div><span><?php echo $product_data["title"]; ?></span></div>
                            <div class="price">Rs. <?php echo $product_data["price"]; ?> .00</div>

                            <?php

                            if ($product_data["qty"] > 0) {

                            ?>

                                
                                

                                <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>' class="col-12 btn btn-warning">Buy Now</a>
                                <a href="#" class="button" onclick="addToCart(<?php echo $product_data['id']; ?>);">add to cart</a>
                                <!-- <a href="#" class="fas fa-heart" style="text-decoration: none;"></a> -->
                            <?php
                            } else {

                            ?>

                                <span class="card-text text-danger fw-bold">Out of Stock</span> <br />
                                <span class="card-text text-danger fw-bold">00 Items Available</span><br /><br />
                                <button class="col-12 btn btn-success disabled">Buy Now</button>
                                <button class="col-12 btn btn-danger mt-2 disabled">Add to Cart</button>

                                <?php

                            }
                            if (isset($_SESSION["u"])) {


                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND
                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 1) {
                                ?>
                                    <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>

                                        <i class="bi bi-heart-fill text-dark fs-5" id='heart<?php echo $product_data["id"]; ?>'></i>
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>

                                        <i class="bi bi-heart-fill text-danger fs-5" id='heart<?php echo $product_data["id"]; ?>'></i>
                                    </button>
                                <?php
                                }
                            } else {
                                ?>
                                <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="window.location = 'index.php';">
                                    <i class="bi bi-heart-fill text-dark fs-5"></i>
                                </button>
                            <?php
                            }

                            ?>



                        </div>

                    </div>

                <?php

                }


                ?>
            </section>

    </div>
    </div>

    <!-- </div>
    </div> -->

    <!-- Products -->

<?php

        }

?>

<!-- </div>
</div> -->
<!-- 
<section>

    <div class="box">
       
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="images/buger.webp" alt="" />
        </div>

        <div class="content">
            <h3>New</span></h3>
            <span>chicken Egg</span> <br />
           
            <span class="price">Rs. 30000 .00</span> <br />
            <button class="col-12 btn btn-success">Buy Now</button>
            
            <a href="#" class="button">add to cart</a>
            
        </div>
    </div>



    <div class="box">
        
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <div class="box">
        
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <a href="#soup" class="box">
                <img src="images/menu/cat/soup.png" alt="">
                <div class="price">Rs.40.00</div>
                <a href="#" class="button">add to cart</a>
                <h3>Soup</h3>

            </a>

            
            <a href="#noodles" class="box">
                <img src="images/menu/cat/noodles.png" alt="">
                <h3>Noodles</h3>
            </a>

    <a href="#biriyani" class="box">
            <img src="images/menu/cat/biriyani.png" alt="">
            <h3>Biriyani</h3>
            </a>

            <a href="#indian" class="box">
            <img src="images/menu/cat/indain.png" alt="">
            <h3>Indian</h3>
            </a>

           <a href="#lankan" class="box">
            <img src="images/menu/cat/lankan.png" alt="">
            <h3>Sri Lankan</h3>
           </a>

       
       

           <a href="#dessert" class="box">
            <img src="images/menu/cat/dessert.png" alt="">
            <h3>dessert</h3>
           </a>

</section> -->

<!-- <div class="heading col-12" id="soup">
    <h1 class="firstTopic">Cup Cakes</h1>
</div>

<section class="category container">



    <div class="box">
        <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <div class="box">
        <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <div class="box">
        <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <div class="box">
        <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <div class="box">
        <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
        <div class="image">
            <img src="images/buger.webp" alt="">
        </div>
        <div class="content">
            <h3>delicious food</h3>
            <div><span>Chiken, Egg</span></div>
            <div class="price">Rs.40.00</div>
            <button class="col-12 btn btn-success">Buy Now</button>
            <a href="#" class="button">add to cart</a>
        </div>
    </div>

    <a href="#soup" class="box">
                <img src="images/menu/cat/soup.png" alt="">
                <div class="price">Rs.40.00</div>
                <a href="#" class="button">add to cart</a>
                <h3>Soup</h3>

            </a>

            
            <a href="#noodles" class="box">
                <img src="images/menu/cat/noodles.png" alt="">
                <h3>Noodles</h3>
            </a>

    <a href="#biriyani" class="box">
            <img src="images/menu/cat/biriyani.png" alt="">
            <h3>Biriyani</h3>
            </a>

            <a href="#indian" class="box">
            <img src="images/menu/cat/indain.png" alt="">
            <h3>Indian</h3>
            </a>

           <a href="#lankan" class="box">
            <img src="images/menu/cat/lankan.png" alt="">
            <h3>Sri Lankan</h3>
           </a>

       
       

           <a href="#dessert" class="box">
            <img src="images/menu/cat/dessert.png" alt="">
            <h3>dessert</h3>
           </a>

</section> -->

<!-- <section class="popular" id="popular"> -->

    <!-- ________________________soup -->

    <!-- <div class="heading" id="soup">

        <h1>Wedding Cakes</h1>
    </div>



    <div class="box-container" class="category container">

        <div class="box">
            <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
            <div class="image">
                <img src="images/buger.webp" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <div><span>Chiken, Egg</span></div>
                <div class="price">Rs.40.00</div>
                <button class="col-12 btn btn-success">Buy Now</button>
                <a href="#" class="button">add to cart</a>
            </div>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
            <div class="image">
                <img src="images/buger.webp" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <div><span>Chiken, Egg</span></div>
                <div class="price">Rs.40.00</div>
                <button class="col-12 btn btn-success">Buy Now</button>
                <a href="#" class="button">add to cart</a>
            </div>
        </div>

    </div> -->

    <!-- ________________________soup -->

    <!-- <div class="heading" id="salad">

        <h1>Geo Heart Cakes</h1>
    </div>

    <div class="box-container">

        <div class="box">
            <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
            <div class="image">
                <img src="images/buger.webp" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <div><span>Chiken, Egg</span></div>
                <div class="price">Rs.40.00</div>
                <a href="#" class="button">add to cart</a>
            </div>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
            <div class="image">
                <img src="images/buger.webp" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <div><span>Chiken, Egg</span></div>
                <div class="price">Rs.40.00</div>
                <a href="#" class="button">add to cart</a>
            </div>
        </div>

    </div> -->

    <!-- ________________________soup -->

    <!-- <div class="heading" id="salad">

        <h1>Cookies</h1>
    </div>

    <div class="box-container">

        <div class="box">
            <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
            <div class="image">
                <img src="images/buger.webp" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <div><span>Chiken, Egg</span></div>
                <div class="price">Rs.40.00</div>
                <a href="#" class="button">add to cart</a>
            </div>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart" style="text-decoration: none;"></a>
            <div class="image">
                <img src="images/buger.webp" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <div><span>Chiken, Egg</span></div>
                <div class="price">Rs.40.00</div>
                <a href="#" class="button">add to cart</a>
            </div>
        </div>

    </div>
 -->





















    <?php include 'bFooter.php' ?>
    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>


</body>

</html>