<?php

if(isset($_GET['reservation'])){
  $selected='selected';
  $date_time='true';
}else{
  $date_time='false';
  $selected='';
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
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
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
        <nav
          class="navbar navbar-expand-lg px-lg-5 px-md-4 px-sm-3 animate__animated animate__fadeInDown"
        >
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
                <a class="nav-link" href="pictures.php">Pictures</a>
                <a class="nav-link" href="about.html">Restaurant</a>
                <a class="nav-link active" href="contact.php">Contact</a>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <section
        class="col-lg-6 col-md-8 col-sm-12 mx-auto pb-5 p-0 mt-1 mt-xxl-2 bg-gradient"
      >
        <div class="section-tile text-center py-4">
          <h3 class="about-title border-bottom-1 border-warning">Contact Us</h3>
        </div>

        <div class="col-12 mx-auto">
          <form
            class="px-5"
            action="../admin/includes/formhandler.inc.php"
            method="post"
          >
            <div class="row">
              <div
                class="col-lg col-md col-sm-12 mb-3 animate__animated animate__fadeInLeft"
              >
                <label for="first-name" class="form-label">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="first-name"
                  name="first-name"
                  placeholder="First name"
                  required
                />
              </div>
              <div
                class="col-lg col-md col-sm-12 mb-3 animate__animated animate__fadeInRight"
              >
                <label for="last-name" class="form-label">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="last-name"
                  name="last-name"
                  placeholder="Last name"
                  required
                />
              </div>
            </div>
            <div class="mb-3 animate__animated animate__fadeInUp">
              <label for="email-input" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email-input"
                name="email"
                placeholder="your@email.com"
                required
              />
            </div>
            <div class="mb-3 animate__animated animate__fadeInDown" id='select_div'>
              <label for="subject" class="form-label">Subject</label>
              <select
                class="form-select"
                id="subject"
                name="subject"
                aria-label="Default select example"
                required
              >
                <option value="0">Select your Subject</option>
                <option value="1">General</option>
                <option value="2" <?php echo $selected; ?>>Reservation</option>
                <option value="3">Technical</option>
                <option value="4">Complaint</option>
              </select>
            </div>
            

            <?php if($date_time === 'true'){ ?>

            <div class='row mb-2 existing_div'> 
              <div class="col-4 animate__animated animate__fadeInUp">
                <label for="date-input" class="form-label">Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="date-input"
                  name="date"
                  required
                />
              </div>
              <div class="col-4 animate__animated animate__fadeInUp">
                <label for="time-input" class="form-label">Time</label>
                <input
                  type="time"
                  class="form-control"
                  id="time-input"
                  name="time"
                  placeholder="hrs:mins"
                  required
                />
              </div>
              <div class="col-4 mb-3 animate__animated animate__fadeInDown">
              <label for="people" class="form-label">Peoples</label>
              <select
                class="form-select"
                id="people"
                name="people"
                aria-label="Default select example"
                required
              >
                <option value="1">1 People</option>
                <option value="2">2 People</option>
                <option value="3">3 People</option>
                <option value="4">4 People</option>
                <option value="5">5 People</option>
                <option value="6">6 People</option>
                <option value="7">7 People</option>
                <option value="8">8 People</option>
                <option value="9">9 People</option>
                <option value="10">10 People</option>
                <option value="11">11 People</option>
                <option value="12">12 People</option>
                <option value="13">13 People</option>
              </select>
              </div>
            </div>
            <?php } ?>

            <div class="mb-4 animate__animated animate__fadeInDown">
              <label for="message" class="form-label">Message</label>
              <textarea
                class="form-control"
                id="message"
                name="message"
                rows="3"
                placeholder="Your message...."
                required
              ></textarea>
            </div>
            <div class="text-center col-12 mt-2">
              <button
                type="submit"
                class="btn btn-lg text-white mx-auto custom-btn"
              >
                Submit
              </button>
            </div>
          </form>
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

    <script>
      
      document.addEventListener('DOMContentLoaded', () => { 
      const select_div = document.getElementById('select_div');
      let  subject_input = document.getElementById("subject");

      let newDiv = `
            <div class="row mb-2 existing_div"> 
              <div class="col-4 animate__animated animate__fadeInUp">
                <label for="date-input" class="form-label">Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="date-input"
                  name="date"
                  required
                />
              </div>
              <div class="col-4 animate__animated animate__fadeInUp">
                <label for="time-input" class="form-label">Time</label>
                <input
                  type="time"
                  class="form-control"
                  id="time-input"
                  name="time"
                  placeholder="hrs:mins"
                  required
                />
              </div>
              <div class="col-4 mb-3 animate__animated animate__fadeInDown">
              <label for="people" class="form-label">Peoples</label>
              <select
                class="form-select"
                id="people"
                name="people"
                aria-label="Default select example"
                required
              >
                <option value="1">1 People</option>
                <option value="2">2 People</option>
                <option value="3">3 People</option>
                <option value="4">4 People</option>
                <option value="5">5 People</option>
                <option value="6">6 People</option>
                <option value="7">7 People</option>
                <option value="8">8 People</option>
                <option value="9">9 People</option>
                <option value="10">10 People</option>
                <option value="11">11 People</option>
                <option value="12">12 People</option>
                <option value="13">13 People</option>
              </select>
              </div>
            </div>`;

      subject_input.addEventListener("change", () => {
        let existing_div = document.querySelector('.existing_div');
        if(subject_input.value == 2){
  
          if(!existing_div){
            select_div.insertAdjacentHTML('afterend', newDiv);
          }

        }else{
          if(existing_div){
            existing_div.remove();
          }
        }
      });
    });
    </script>
  </body>
</html>
