<div>
    <div style="background-color: #f2b90c;" class="p-3">
        <div class="container">
            <div class="row text-center mb-4">
                <i class="bi bi-person-circle text-white" style="font-size: 10rem;"></i>
                <h1 class="text-white" style="font-size: 2.4rem;"><?= $_SESSION['user']['nome']; ?></h1>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;">
        <div class="row d-flex justify-content-center">
            <div style="border-left: 4px solid #097337;" class="w-75">
                <ul style="list-style: none;">
                    <li>Alterar dados</li>
                    <li>Ver e-mail</li>
                    <li>Trocar numero</li>
                    <li>Ver endereços</li>
                    <li><a href="/logout" class="text-decoration-none" style="color: #212529;"><i class="bi bi-box-arrow-left"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <span style="position: absolute; top:5px; left:5px; color:#fff"><a href="./" class="text-white"><i class="bi bi-arrow-left fw-bold" style="font-size: 2.4rem;"></i></a></span>
</div>
<style>
    li{
        font-size: 2.2rem;
        line-height: 2.2rem;
        margin-bottom: 20px;
        
    }
</style>
<script>
    window.addEventListener('load', ()=>{
        document.getElementById('div-logo-ini').remove();
    })
</script>
