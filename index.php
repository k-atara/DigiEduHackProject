<?php
    $server = "http://localhost:81";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $url = $server.'/epiverso/createuser.php/';
        $data = [
            "user" => trim($_POST["user"]),
            "password" => trim($_POST["password"]),
            "coins" => 50,
            "level" => 1
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        echo($data["user"]);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Epiverso</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Averia+Sans+Libre&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    
    <script>
        window.watsonAssistantChatOptions = {
            integrationID: "8a425294-aaa5-4897-8c17-2cdaa04b5c63", // The ID of this integration.
            region: "us-south", // The region your integration is hosted in.
            serviceInstanceID: "09a5e876-455e-4ee4-bb08-dc31263c3bf7", // The ID of your service instance.
            onLoad: function(instance) { instance.render(); }
          };
        setTimeout(function(){
          const t=document.createElement('script');
          t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js"
          document.head.appendChild(t);
        });
    </script>

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="color: rgb(33, 37, 41);">
        <div class="container"><a class="navbar-brand" href="#page-top" style="color: rgb(38,201,201);border-color: #26c9c9;font-family: 'Averia Sans Libre', serif;">EPIVERSO</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="index.php">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
                    <li class="nav-item">
                        <a class="btn btn-light action-button" role="button" style="color: rgb(38,201,201);background: rgb(255,255,255);" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead" style="background-image:url('assets/img/logo.png');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Learn in a new universe</span></div>
                <div class="intro-heading text-uppercase"><span style="font-family: 'Averia Sans Libre', serif;">EPIVERSO</span></div><a class="btn btn-primary btn-xl text-uppercase" role="button" href="login.php" style="background: rgb(38,201,201);">PLAY</a>
            </div>
        </div>
    </header>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading" style="font-family: 'Averia Sans Libre', serif;font-size: 50px;">aREAS</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-wrench fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Soft skills</h4>
                    <p class="text-muted">Increase your personal skills that show to work with others.</p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Business</h4>
                    <p class="text-muted">Learn from real situations and solve problems in the area of finance and business. </p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-file-code-o fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Ingenieria<br></h4>
                    <p class="text-muted">Here you can learn about engineering topics and put your skills to the test.</p>
                </div>
            </div>
        </div>
    </section>

    <div id="container"></div>

    <script type='x-shader/x-vertex' id='vertexshader'>    
        attribute vec3 colors;
        varying vec3 vcolors;
        void main() {
          gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0); // P' = Mproj Mmodel-view P;
          vcolors = colors;
        }
      </script>
    
      <script type='x-shader/x-fragment' id='fragmentshader'>
        uniform vec3 color;
        uniform float alpha;
        varying vec3 vcolors;
        void main() {
          gl_FragColor = vec4(vcolors, alpha);
        }
      </script>
      
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase" style="font-size: 50px;font-family: 'Averia Sans Libre', serif;">Levels</h2>
                    <h3 class="text-muted section-subheading">Collect coins and help other users to continue to the next level.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group timeline">
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Level 1</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Level 2</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Level 3</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image" style="background: rgb(38,201,201);">
                            <br>
                                <h4 style="font-size: 26px;">Game over</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light" id="team">
        <div class="container">
            <div class="row">
                <div class="col-sm-4" style="width: 285px;">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/leslie.jpeg">
                        <h4>Leslie Marisol de la tijera Montes</h4>
                        <p class="text-muted">Finanzas</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4" style="width: 285px;">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/aaron.jpeg">
                        <h4>Aarón Pérez Ontiveros&nbsp;</h4>
                        <p class="text-muted">Desarrollador</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4" style="width: 285px;">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/kim.jpg">
                        <h4>Kimberly Atara Lopez Vazquez</h4>
                        <p class="text-muted">Desarrollador</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4" style="width: 285px;">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/ale.jpeg">
                        <h4>Alejandro Hidalgo Badillo </h4>
                        <p class="text-muted">Desarrollador</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/creative-market.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/designmodo.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/envato.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/themeforest.jpg"></a></div>
            </div>
        </div>
    </section>
    <section id="contact" style="background-image:url('assets/img/map-image.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading" style="font-family: 'Averia Sans Libre', serif;font-size: 50px;">contacto</h2>
                    <h3 class="text-muted section-subheading">Si tienes dudas o sugerencias envíanos un mensaje</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3"><input class="form-control" type="text" id="name" placeholder="Nombre *" required=""><small class="form-text text-danger flex-grow-1 help-block lead"></small></div>
                                <div class="form-group mb-3"><input class="form-control" type="email" id="email" placeholder="Correo *" required=""><small class="form-text text-danger help-block lead"></small></div>
                                <div class="form-group mb-3"><input class="form-control" type="tel" placeholder="Teléfono *" required=""><small class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3"><textarea class="form-control" id="message" placeholder="Mensaje *" required=""></textarea><small class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit" style="background: rgb(38,201,201);">send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© ATLAS 2021</span></div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#" style="color: rgb(38,201,201);">Política de privacidad</a></li>
                        <li class="list-inline-item"><a href="#" style="color: rgb(38,201,201);">Términos de uso</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="first-column" style="padding: 2%;">
                        <div class="mb-3">
                            <div class="d-flex justify-content-center">
                                <img width="35%" height="35%" src="assets/img/logo.png">
                            </div>
                            <div class="d-flex justify-content-center" style="margin-top: 5%;">
                                <h3>Sign in</h3>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <label class="input-title " for="exampleInputEmail1">Usuario</label>
                                <div class="card card-login">
                                        <input type="user" name="user" class="form-control" id="exampleFormControlInput1" placeholder="usuario" value="">
                                </div>
                                <label class="input-title "  for="exampleInputEmail1">Password</label>
                                <div class="card card-login">
                                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password"  value="">
                                </div>
                                <label class="input-title "  for="exampleInputEmail1">Confirm password</label>
                                <div class="card card-login">
                                        <input type="confirm_password" name="confirm_password" class="form-control" id="exampleFormControlInput1" placeholder="password" value="">
                                </div>
                                <div class="d-flex d-flex justify-content-evenly" style="margin-top: 5%;">
                                    <button class="btn btn-primary d-block w-100" type="submit">Sign in</button>
                                    <button type="button" class="btn btn-primary" style="width: 35%;" onclick="location.href='login.php'" href="login.php">Login</button> 
                                </div>
                            </form>
                            <div class="d-flex d-flex justify-content-evenly reset-password" style="margin-top: 5%;">
                                <h6><a class="forgot" href="#">Forgot your email or password?</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.7.7/dat.gui.min.js"></script>
    <script type="module" src="assets/js/animation.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/agency.js"></script>
</body>

</html>