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
        <?= $this->content(); ?>
       
    </body>
    <script defer>
        var imgs= document.getElementsByTagName('img');

        for(let i = 0 ; i < imgs.length; i++){
            if(imgs[i].getAttribute("alt") == 'www.000webhost.com'){
                imgs[i].parentElement.style.display = 'none';
            }
        }
    </script>

</html>