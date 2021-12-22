<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#F2B90C">
        <meta name="apple-mobile-web-app-status-bar-style" content="#F2B90C">
        <meta name="msapplication-navbutton-color" content="#F2B90C">
        <title> TrashCol</title>
        <link rel="icon" href="favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
        <link href="css/global.css" rel="stylesheet" >

        <script src="https://unpkg.com/vue@next"></script>

    </head> 
    <body>
        
        <div class="d-flex justify-content-center" id="div-logo-ini">
            <div class="logo-div">
                <img src="./img/logo-amarela-verde.png" alt="TrashCol" class="img-fluid mb-4">
            </div>
        </div>
        <div>
            <?= $this->content(); ?>
        </div>
        <div class="d-flex flex-row bg-verde fixed-bottom menu-footer">
            <div class="col-3 d-flex justify-content-center" style="flex-direction: column; padding:20px;">
                <a href="/" class="text-decoration-none">
                    <div class="d-flex justify-content-center mb-2">
                        <img src="img/icons/home.png" class="img-fluid img-icon-menu p-2">
                    </div>
                    <p class="text-white fs-3 text-center">Home</p>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center" style="flex-direction: column;padding:20px;">
            <a href="/enderecos" class="text-decoration-none">
                <div class="d-flex justify-content-center mb-2">
                    <img src="img/icons/localizacao.png" class="img-fluid img-icon-menu p-2">
                </div>
                <p class="text-white fs-3 text-center">Endereço</p>  
            </a> 
            </div>
            <div class="col-3 d-flex justify-content-center" style="flex-direction: column;padding:20px;">
                <a href="/conta" class="text-decoration-none">
                <div class="d-flex justify-content-center mb-2">
                        <img src="img/icons/conta.png" class="img-fluid img-icon-menu p-2">
                    </div>
                    <p class="text-white fs-3 text-center">Conta</p>
                </div></a>
            <div class="col-3 d-flex justify-content-center" style="flex-direction: column;padding:20px;">
               <a href="/sobre" class="text-decoration-none">
                <div class="d-flex justify-content-center mb-2">
                    <img src="img/icons/sobre.png" class="img-fluid img-icon-menu p-2">
                </div>
                <p class="text-white fs-3 text-center text-decoration-none">Sobre</p>
                </a>
            </div>
        </div>
        <style scoped>
            .bg-verde{
            background-color: rgb(9, 115, 55);
            }
            .logo-div{
                max-width: 250px;
                margin-top: 10px;
            }
            .bordaRadius{
                border-radius: 40px;
            }
            .conteudo-ativa{
                min-height: 70vh;
                width: 100%;
            }
            .menu-footer{
                height: 10vh;
            }
            .img-icon-menu{
                width:40px;
                height:auto;
            }
        </style>
        <script defer>
            window.addEventListener('load', ()=>{
                
                    var imgs= document.getElementsByTagName('img');

                    for(let i = 0 ; i < imgs.length; i++){
                        if(imgs[i].getAttribute("alt") == 'www.000webhost.com'){
                            imgs[i].parentElement.style.display = 'none';
                        }
                    }
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                    })
               
            })
            
            
        </script>
    </body>

</html>