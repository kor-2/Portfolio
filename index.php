<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'asset/default_template/header.php';

?>
<header class="bg-header py-5">
        
      

    <div class="text-center text-light">
        <img src="asset/img/#" alt="photo corentin heckmann" class="img-responsive" />
        <h1 class="font-weight-bold">HECKMANN CORENTIN</h1>

        <div class="white-line m-auto"></div>
        <p>Devloppeur Web</p>
    </div>
</header>




<main class="mt-5">
    
    <div class="text-center mb-5" id="portfolio">
        <h2 class="font-weight-bold text-dark-blue " >PORTFOLIO</h2>
        <div class="dark-blue-line m-auto"></div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3  m-3">
        <div class="col">
            <div class="card ">
                <img src="..." class="card-img-top" alt="..." />
                <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center bg-header py-5 px-2 text-light" id="info">
        <h2 class="font-weight-bold" >INFO</h2>
            <div class="white-line m-auto"></div>
                <p class="mt-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                    lobortis a tortor quis venenatis. Donec vehicula odio massa, eu
                    scelerisque dui consectetur nec. Praesent et turpis risus. Vestibulum
                    pretium vehicula molestie. Sed eget dolor turpis. Duis vitae nisi id
                    mauris rhoncus lobortis at non justo. Nam ac consectetur sem. Maecenas
                    vel enim ac justo molestie congue. Phasellus ligula urna, mollis ut
                    libero sit amet, suscipit mollis nisl.
                </p>

                <button type="button" class="btn btn-outline-light" href="asset/pdf/#">Mon CV PDF</button>
            
    </div>


    <div class="row justify-content-center m-0">
       
        <div class="col-lg-8 col-xl-7 mx-3">

            <h2 class="font-weight-bold text-center mt-4" id="contact" >CONTACT</h2>
            <div class="dark-blue-line m-auto"></div>
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
             
                <div class="form-floating mt-5">
                    <input class="form-control" id="name" type="text" placeholder="Entrer votre nom ...."  />
                    <label for="name">Nom complet</label>
                    
                </div>
                
                <div class="form-floating mb-3">
                    <input class="form-control" id="email"  type="email" placeholder="adresse@example.com" />
                    <label for="email">Adresse email</label>
                    
                </div>
                
                <div class="form-floating mb-3">
                    <input class="form-control" id="sujet" type="text" placeholder="Votre sujet..."/>
                    <label for="sujet">Sujet</label>
                    
                </div>
                
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="message" type="text" placeholder="Votre message ..." style="height: 10rem"></textarea>
                    <label for="message">Message</label><br>

                <div class="text-center">
                    <button class="btn btn-primary btn-xl "id="submitButton" type="submit">Envoyer</button>
                </div>
                              
                
            </form>
          </div>
    </div>


</main>

<?php  require_once 'asset/default_template/footer.php'; ?>

    