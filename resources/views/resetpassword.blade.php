<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>resetpassword</title>
</head>
<body>

    <section class="vh-100" style="background-color: #5d7fdb;">
        <div class="container py-5 h-50">
          <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-2">
                  <div class="col-md-1 col-lg-5 d-md-block">
                    <img src="template/img/penduduk.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                        <form action="/login" method="POST">
                            @csrf
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #5d7fdb;"></i>
                          <span class="h1 fw-bold mb-0">Reset Password</span>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example17">Username</label>
                          <input name="name" type="name" id="form2Example17" class="form-control form-control-lg" />
                        </div>
      
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27">Password</label>
                          <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27">Confirm Password</label>
                          <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" />
                        </div>
      
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Confirm</button>
                        
                        <p class=" pb-lg-0 " style="color: #393f81;">sudah punya akun? <a href="/login"
                            style="color: #040511;">masuk</a></p>
                        
                      </form>

      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>