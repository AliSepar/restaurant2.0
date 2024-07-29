<?php
require_once "../admin/includes/dbh.inc.php";

try{
  $query ='SELECT * FROM images';
  $getimages = $pdo->prepare($query);
  $getimages-> execute();

  $images = $getimages -> fetchAll();

}
catch(e){

}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restoran</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
      rel="preload"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
      rel="preload"
    />
    <link
    rel="stylesheet"
    rel="preload"
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
  />
  <link
    rel="stylesheet"
    rel="preload"
    href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
  />
    <link rel="stylesheet" href="../style.css" />
  </head>

  <body>
    <div class="loader"></div>
    <main class="container-xxl p-0 main-bg m-auto">
      <header class="col-12 m-a p-0">
        <nav class="navbar navbar-expand-lg px-lg-5 px-md-4 px-sm-3">
          <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">
              <h1 class="text-primary">
                <i class="fa-solid fa-utensils"></i>
                Restoran
              </h1>
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon text-oringe rounded"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-link" href="../index.html">Home</a>
                <a class="nav-link" href="menu.html">Menu</a>
                <a class="nav-link active" href="pictures.php">Pictures</a>
                <a class="nav-link" href="about.html">Restaurant</a>
                <a class="nav-link" href="contact.php">Contact</a>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <section class="container-xl p-0 mt-3 mt-xxl-5 bg-gradient">
        <div class="section-tile text-center">
          <h3 class="fs-2 p-4">Gallery</h3>
          <p class="fw-bold fs-5">Captured moments showcasing the essence of our restaurant and the joy of our guests</p>
        </div>
        <div class="container col-12 justify-content-center align-items-center">
          <div id="carouselExample" class="carousel slide">

          
          <div class="carousel-inner">
          <?php if ($images) {
                  $totalImages = count($images);
                  for ($i = 0; $i < $totalImages; $i++) {
                      // Start a new carousel-item div if it's the first image or a multiple of 3
                      if ($i % 3 == 0) {
                          // Close the previous carousel-item div if it's not the first item
                          if ($i != 0) {
                              echo '</div></div>';
                          }
                          // Add active class to the first item
                          $activeClass = ($i == 0) ? 'active' : '';
                          echo '<div class="carousel-item ' . $activeClass . '"><div class="row">';
                      }
                      ?>
                      <div class="col-lg-4 col-md-4 col-6 fixed-height">
                          <a href="#" class="d-block h-100">
                              <img class="img-fluid rounded h-100" src="<?php echo "../" . $images[$i]['image_path'] ?>" alt="">
                          </a>
                      </div>
                      <?php
                  }
                  // Close the last carousel-item div
                  echo '</div></div>';
              } ?>
          </div>



            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        
          </div>

    
        </div> 
      </div>
      </section>
    </main>

    <!-- / -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="../app.js"></script>
  </body>
</html>
