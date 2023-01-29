<?php

include '../Controller/articleC.php';
include '../Model/article.php';
$error = "";

// create client
$article = null;

// create an instance of the controller
$articleC = new ArticleC();
if (
    isset($_POST["nomAR"]) &&
    isset($_POST["imageAR"])  &&
    isset($_POST["date"])
  
) {
    if (
        !empty($_POST["nomAR"]) &&
        !empty($_POST["imageAR"]) &&
       !empty($_POST["date"])
        
    ) {
        $article = new Article(
            null,
            $_POST['nomAR'],
            $_POST['imageAR'] ,
           new DateTime($_POST['date']),
        
        );
        
        $articleC->addArticle($article);
     
        header('Location:listeArticle.php');
    } else
        $error = "Missing information";
}


?>

<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
   
</head>

<body >


                                                
 

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              Material Dashboard 2
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.html">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-up.html">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-in.html">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/product/material-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Free download</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section id="pageContent">
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4  href="addArticle.php"class="font-weight-bolder" >ADD ARTICLE</h4>
                  
                </div>
               
                  <form action="" method="POST" id="myForm"  >
                  <div class="input-control">
                    <div class="input-group input-group-outline mb-3">
                      <label for="nomAR" class="form-label" >name of article</label>
                      <input type="text"  id="nomAR" name="nomAR"  class="form-control">
                     
                    </div>
                    <div>
                      <span id="error"></span>
                      </div>
                    <div class="input-group input-group-outline mb-3">
                      <label for="imageAR" class="form-label">IMG</label>
                      <input type="text"  id="imageAR" name="imageAR" class="form-control">
                      
                    </div>
                    <div>
                      <span id="error1"></span>
                      </div>
                    <div class="input-group input-group-outline mb-3">
                      <label for="date" class="form-label"></label>
                      <input type="date" id="date" name="date" class="form-control">
                    
                      </div>
                      <div>
                      <span id="error2"></span>
                      </div>
                      <div class="text-center" >
                      <input type="submit" href="addArticle.php"  id="myForm" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="ADD" > 
                 
                    </div>
                    
                    
            
                   
      <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    
                    <a href="../View/listeArticle.php" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">BACK</a>
                    </div>
                    
                  </form>
                 
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
      <p style="color: red" id="erreur"></p>    
      </div>

    </section>
   
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
 
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    
       
       

                   
    </form>
    <script>
    
    let myForm = document.getElementById('myForm');

myForm.addEventListener('submit' , function(e){
let myname = document.getElementById('nomAR');
let myimage = document.getElementById('imageAR');
let mydate = document.getElementById('date');
if(myname.value=='')
{
let error = document.getElementById('error');
error.innerHTML = "Missed name ";
error.style.color = 'red';
e.preventDefault();
}
if(myimage.value=='')
{
let error = document.getElementById('error1');
error.innerHTML = "Missed image ";
error.style.color = 'red';
e.preventDefault();
}

if(mydate.value=='')
{
let error = document.getElementById('error2');
error.innerHTML = "Missed date ";
error.style.color = 'red';
e.preventDefault();
}
})
 

</script>
</body>

</html>