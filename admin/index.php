<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../user/css/stylesheet_login.css">
    <link rel="stylesheet" href="./css/eye.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png" />
    <script>
        function myFunction() {
            var x = document.getElementById("password-field");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>
<body>
    <section class="Form my-1 mx-5">
      <div class="container">
        <div class="row content g-0">
          <div class="col-lg-5">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="../user/images/login-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../user/images/login-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../user/images/login-3.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <div class="mb-3">
                <img src="./images/logo-02.png" alt="" width="70%">
            </div>
            <h3>Login Admin</h3>
            <form method="POST" action="proses_login.php">
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- Username -->
                  <input type="text" class="form-control my-3 p-3" name="username" placeholder="Username" required>
<!--                    <span class="fa-solid fa-lock"></span>-->
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- Password -->
                    <input id="password-field" type="password" class="form-control my-3 p-3" name="password" placeholder="Password" value="" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle" onclick="myFunction()"></span>
                </div>
              </div>
                <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label mb-2" for="form2Example3">
                        Remember me
                    </label>
                    </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- button -->
                  <button type="submit" class="btn1 mb-4">Log in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="js/hide.js"></script>
</body>
</html>