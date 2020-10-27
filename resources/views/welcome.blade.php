<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Espaço Musical JF</title>
        <link rel="icon" type="image/x-icon" href="assets/img/imglogo.jpg" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">
                   Espaço Musical JF
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive" >
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Cursos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">A Escola</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Serviços</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Professores</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#youtube">Youtube</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>

         <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Conheça nosso trabalho</div>
                <div class="masthead-heading text-uppercase">Bem-vindo ao <br> Espaço Musical JF</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#portfolio">Explore</a>
            </div>
        </header>
        
       
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cursos</h2>
                    <h3 class="section-subheading text-muted">Conheça um pouco mais sobre o que ensinamos na escola</h3>
                </div>
                <div class="row">
                    @foreach($courses as $c )
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$c->id}}">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{url("storage/{$c->image}")}}" width="100%" alt="{{$c->name}}" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{$c->name}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </section>


        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sobre nós</h2>
                    <h3 class="section-subheading text-muted">Conheça mais sobre nós</h3>
                </div>
               
                <div class="row">
                    <div class="col-md-6">
                        <div style="border: 1px solid black" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="assets/img/Panfleto.jpg" style="width: 100%; height: 100%;" alt="logo-escola"/>
                              </div>
                              <div class="carousel-item">
                                <img src="assets/img/logo_certo.jpg" style="width: 100%; height: 100%;" alt="logo-escola"/>
                              </div>
                              <div class="carousel-item">
                                <img src="assets/img/frente4_certo.png" style="width: 100%; height: 100%;" alt="logo-escola"/>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>

                    <div class="col-md-6">
                        <h2 style="text-align: center">A Escola</h2>
                        @foreach($history as $h)
                        <p>{{$h->history}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

         <!-- Services-->
        <section class="page-section bg-light" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Serviços</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-guitar fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Ensino Musical</h4>
                        <p class="text-muted">A qualidade do ensino, 
                            dedicação ao aluno e toda a experiência dos nossos professores, 
                            fazem com que sejamos a melhor escola para realizar o seu sonho de aprender um instrumento. 
                            A certeza de um bom aprendizado é medida pelos frutos colhidos, 
                            venha para melhor escola da região.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-toolbox fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Luthieria</h4>
                        <p class="text-muted">Contamos também com serviços de Luthieria, profissional com formação e 
                            longa experiência. Especializado em manutenção e reparo de instrumentos de cordas como: 
                            Violão, Guitarra, Baixo, Cavaquinho, Banjo, Ukelele, Viola e outros. 
                            Traga seu instrumento e realizaremos o melhor serviço da região.!</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-glass-cheers fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">JF Cerimonial</h4>
                        <p class="text-muted"><strong> JF Cerimonial.</strong>
                            Grupo Musical para casamentos e recepções,
                            várias formações com cantores e instrumentistas. 
                            Realizaremos o casamento dos seus sonhos, faça um orçamento conosco.</p>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Professores</h2>
                    <h3 class="section-subheading text-muted">Conheça nossa super equipe de professores</h3>
                </div>
                <div class="row">
                    @foreach($teachers as $t)
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{url("storage/{$t->image}")}}" alt="{{$t->name}}" />
                            <h4>{{$t->name}}</h4>
                            <p class="text-muted">{!! nl2br($t->information)!!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="youtube">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Youtube</h2>
                    <h3 class="section-subheading text-muted">Encontre-nos no Youtube e fique por dentro dos novos vídeos</h3>
                </div>
                <div class="row">
                    
                    <div class="col-md-6" style="padding-top: 1rem">
                        <h3 style="text-align: center">Se inscreva no canal do Espaço Musical JF no Youtube</h3>
                        <div  style="text-align: center">
                            <a style="text-align: center" class="btn btn-danger btn-group" href="https://www.youtube.com/channel/UC5Ve6ITFWiSSNNlFhAoj8Dg">
                            <i class="fab fa-youtube pr-1" ></i>
                            Espaço Musical JF
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6" style="padding-top: 1rem">
                        <h3 style="text-align: center">Se inscreva no canal do Professor Renato Anastácio no Youtube</h3>
                        
                        <div style="text-align: center">
                            <a style="text-align: center" class="btn btn-danger btn-group" href="https://www.youtube.com/channel/UCZJd2RM3zyziiwaxfYmYT2w?view_as=subscriber">
                                <i class="fab fa-youtube pr-1"></i>
                                Renato Anastácio
                            </a>
                        </div>
                    </div>
                </div>
        </section>
       
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Entre em Contato</h2>
                    <h3 class="text-muted">Saiba onde estamos localizados e agende uma visita</h3>
                </div>
                <div class="row">
               <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3709.6832777778727!2d-46.89250278554132!3d-21.598282697916854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b7cdeee7675fd5%3A0x8d44c64fe2344047!2sR.%20Francisquinho%20Dias%2C%20783%20-%20Centro%2C%20S%C3%A3o%20Jos%C3%A9%20do%20Rio%20Pardo%20-%20SP%2C%2013720-000!5e0!3m2!1spt-BR!2sbr!4v1599085303514!5m2!1spt-BR!2sbr" 
                width="95%" height="100%" frameborder="0" 
                style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
               </div>
               <div class="col-md-6">
                    <div style="text-align: center">
                        <h2 style="color: #FFF">Entre em contato pelo WhatsApp</h2>
                        <a class="btn" href="https://api.whatsapp.com/send?phone=551921810300&text=Olá,%20tenho%20interesse%20nas%20aulas!" style="font-size: 32px;border-radius: 64px; background-color: green; color: white; border: none;">
                            <i class="fab fa-whatsapp fa-2x" style="padding: 12px;"></i>
                        </a>
                        <br><br>
                        <h2 style="color: #FFF">Ou pelo Facebook da escola</h2>
                        <a class="btn btn-primary" style="border-radius: 100%;" href="https://www.facebook.com/espacomusicaljf/?ref=page_internal"><i class="fab fa-facebook-f fa-4x" style="padding: 5px"></i></a>
                    </div>
                    <br><br>
                    <div style="text-align: center">
                        <h4 style="color: #FFF"> Telefones:</h4>
                        <h5 style="color: #FFF"> (19) 2181-0300</h5>
                        <h5 style="color: #FFF"> (19) 9 9417-9400</h5>                        
                    </div>
               </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Todos os direitos reservados</div>
                    <div class="col-lg-4 text-lg-left">Copyright © Espaço Musical JF 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-primary btn-social mx-2" href="https://www.facebook.com/espacomusicaljf/?ref=page_internal"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-social mx-2" href="https://www.youtube.com/channel/UC5Ve6ITFWiSSNNlFhAoj8Dg"><i class="fab fa-youtube pr-1"></i></a>
                    </div>
                    
                </div>
            </div>
        </footer>

        <!-- Modal 1-->
        @foreach($courses as $c)
        <div class="portfolio-modal modal fade" id='portfolioModal{{$c->id}}' tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" width="50%" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h3 class="text-uppercase">{{$c->name}}</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <img class="img-fluid" style="border-radius: 80px" src="{{url("storage/{$c->image}")}}" alt="{{$c->name}}" />
                                        </div>
                                        <div class="col-md-6">
                                            <p>{!! nl2br($c->description)!!}</p>
                                            
                                            <?php $teacherCourse = DB::table('teacher_courses')
                                            ->join('teachers', 'teachers.id', 'teacher_id')
                                            ->join('courses', 'courses.id', 'course_id')
                                            ->select('teacher_courses.*', 'teachers.*','courses.*','teachers.name as teacher', 'teachers.image as img_teacher', 'courses.name as course')
                                            ->where('courses.id', $c->id)
                                            ->get();?>

                                            <h4 style="text-align: center">Professores</h4>
                                            <div class="row">
                                            @foreach($teacherCourse as $tc)
                                                <div class="col-md-3" style="box-direction: initial">
                                                    <img class="mx-auto rounded-circle" width="65%" src="{{url("storage/{$tc->img_teacher}")}}" alt="{{$tc->teacher}}" />
                                                    <p>{{$tc->teacher}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                        </div>
                                    </div>    
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
