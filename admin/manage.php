<?php
require_once "includes/dbh.inc.php";

try {
  $query = "SELECT * FROM messages";
  $getmessages = $pdo->prepare($query);
  $getmessages->execute();
  $messages = $getmessages->fetchAll();
} catch (PDOException $e) {
  die("Query Failed : " . $e->getMessage());
}

//getting data for messages


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restoran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="preload" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="dns-prefetch" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="dns-prefetch" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="dns-prefetch" />
</head>

<body>
  <div class="container bg-secondary-subtle vh-100">
    <nav class="navbar bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">
          <h1 class="text-warning" style="color: rgb(254, 161, 22) !important">
            <i class="fa-solid fa-utensils"></i>
            Restoran
          </h1>
        </a>
      </div>
    </nav>

    <section class="container-xl pt-3 bg-gradient">
      <div class="section-tile text-center">
        <h1>Manage Portal</h1>
      </div>
      <section class="menu-section">
        <ul class="nav nav-pills mb-3 justify-content-center mt-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active menu-tabs" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
              <i class="fa-solid fa-envelope"></i> Back Office
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link menu-tabs" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
              <i class="fa-solid fa-book-open"></i> Guest Reservation
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link menu-tabs" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
              <i class="fa-solid fa-images"></i> Gallery
            </button>
          </li>
        </ul>

        <div class="tab-content animate__animated animate__fadeInUp animate__slow" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row justify-content-center">
              <div class="col-lg-10 mb-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="100">Date</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($messages) {
                      foreach ($messages as $message) {
                        if ($message['m_type'] == 1) {
                          $subject = 'General';
                          $style = "text-bg-primary";
                        } elseif ($message['m_type'] == 3) {
                          $subject = "Technical";
                          $style = "text-bg-warning";
                        } elseif ($message['m_type'] == 4) {
                          $subject = "Complaint";
                          $style = "text-bg-danger";
                        }

                        echo "<tr>
                                  <td>" . $message['date'] . "</td>
                                  <td>" . $message['first_name'] . " " . $message['last_name'] . "</td>
                                  <td>" . $message['email'] . "</td>
                                  <td><h2 class='badge " . $style . " '>" . $subject . "</h2></td>
                                  <td>" . $message['message'] . "</td>
                                  <td>
                                    <a href='./admin/includes/deletedata.inc.php?id" . $message['id'] . "' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a>
                                  </td>
                              </tr>
                        ";
                      }
                    }

                    ?>
                    <!-- <tr>
                      <td>23/7/2024</td>
                      <td>Emily</td>
                      <td>Email@gmail.com</td>
                      <td>Genral</td>
                      <td>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Quas, molestias corrupti adipisci, facilis
                        molestiae ducimus ullam perspiciatis cumque, fugiat
                        distinctio necessitatibus nisi commodi ratione
                        voluptas incidunt? Veritatis repellendus commodi sit.
                      </td>
                      <td>
                        <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr> -->

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="row">
              <div class="col-lg-10 mb-3">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>23/7/2024</td>
                      <td>Emily</td>
                      <td>Email@gmail.com</td>
                      <td>Genral</td>
                      <td>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Quas, molestias corrupti adipisci, facilis
                        molestiae ducimus ullam perspiciatis cumque, fugiat
                        distinctio necessitatibus nisi commodi ratione
                        voluptas incidunt? Veritatis repellendus commodi sit.
                      </td>
                      <td>
                        <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>23/7/2024</td>
                      <td>Emily</td>
                      <td>Email@gmail.com</td>
                      <td>Genral</td>
                      <td>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Quas, molestias corrupti adipisci, facilis
                        molestiae ducimus ullam perspiciatis cumque, fugiat
                        distinctio necessitatibus nisi commodi ratione
                        voluptas incidunt? Veritatis repellendus commodi sit.
                      </td>
                      <td>
                        <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <div class="row">
              <div class="col-lg-10 mb-3">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td>23/7/2024</td>
                      <td>Emily</td>
                      <td>Email@gmail.com</td>
                      <td>Genral</td>
                      <td>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Quas, molestias corrupti adipisci, facilis
                        molestiae ducimus ullam perspiciatis cumque, fugiat
                        distinctio necessitatibus nisi commodi ratione
                        voluptas incidunt? Veritatis repellendus commodi sit.
                      </td>
                      <td>
                        <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr> -->
                    <!-- <tr>
                      <td>23/7/2024</td>
                      <td>Emily</td>
                      <td>Email@gmail.com</td>
                      <td>Genral</td>
                      <td>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Quas, molestias corrupti adipisci, facilis
                        molestiae ducimus ullam perspiciatis cumque, fugiat
                        distinctio necessitatibus nisi commodi ratione
                        voluptas incidunt? Veritatis repellendus commodi sit.
                      </td>
                      <td>
                        <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
  </div>

  <!-- / -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>