<div id="appLogin">
    <div class="d-flex justify-content-center align-items-center" style="width:100%; height:100vh;">
        <div class="col-11 col-lg-5 col-xxl-3 ">
            <div class="d-flex justify-content-center mb-5">
                <img src="img/logo-branca.png" class="img-fluid" alt="Logo TrashCol" id="logo-trashcol">
            </div>
            <?= isset($_GET['cadatro']) && $_GET['cadatro'] == true ? '<h1 class="text-success p-2 text-center bg-white">Cadastro efetuado!</h1>' :''?>
            <h1 class="text-center fw-bold mb-4 text-white" style="font-size: 3rem;">Faça Login</h1>
            <div>
                <form @submit="login">
                    <div class="item-login p-4 mb-2 bg-face d-flex flex-row justify-content-center bordaRadius cursor-pointer align-items-center">
                        <i class="bi bi-facebook mx-3 text-white" style="font-size: 32px;"></i><div style="margin-top: 1px; font-size: 1.7rem;" class="text-white">Continuar com Facebook</div>
                    </div>
                    <div class="item-login p-4 mb-2 bg-white d-flex flex-row justify-content-center bordaRadius cursor-pointer align-items-center">
                        <img src="img/g-logo.svg" class="img-fluid mx-3" width="32" height="32"><div style="margin-top: 1px;font-size: 1.7rem;"> &nbsp;Continuar com Google &nbsp; &nbsp;</div>
                    </div>

                    <div class="item-login p-4 mb-2 bg-white d-flex flex-row justify-content-center bordaRadius" style="width: 100%;">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-white" style="border: none;"> <img src="img/user.png" class="img-fluid mx-3" style="opacity: 0.6;"></span>
                            <input type="email" v-model="email" id="email"  class="form-control" placeholder="E-mail" aria-label="email" aria-describedby="email" style="border: none;font-size:1.7rem;" required>
                        </div>
                    </div>
                    <div class="item-login p-4 mb-2 bg-white d-flex flex-row justify-content-center bordaRadius">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-white" style="border: none;"> <img src="img/senha.png" class="img-fluid mx-3" style="opacity: 0.6;"></span>
                            <input type="password" v-model="senha" id="senha" class="form-control" placeholder="Senha" aria-label="senha" aria-describedby="senha" style="border: none;font-size:1.7rem;" required>
                        </div>
                    </div>
                    <p class="text text-danger text-center fs-4" id="result"></p>
                    <button class="btn p-4 mb-2 text-white fs-2 w-100" style="background-color:#097337; border-radius: 3rem;"> Fazer Login</button>
                </form>
                <div class="d-flex justify-content-center mb-1 mt-1">
                    <p class="text-white text fs-3 text-center">Você ainda não tem conta?</p>
                    <div>
                        <span class="text-white mx-2 text fs-3"> <ins><a href="/registrar">Criar conta</a></ins></span>
                    </div>

                </div>
                
            </div>
            
        </div>

    </div>
</div>
<script>

const login =  {
    data() {
        return {
            email: null,
            senha: null
        }
    },
    methods:{
        login(e){
            e.preventDefault();
            document.getElementById('senha').blur();
            const formData = new FormData(e.target);

            formData.append('email', this.email);
            formData.append('senha', this.senha);

            fetch('/login', {
                method: 'POST',
                body: formData
            }).then((response) => {
                    return response.text()
            }).then((dataRes)=>{
                if(dataRes === 'ok'){
                    window.location.href = "/";
                }else if(dataRes === 'si'){
                    document.getElementById("result").innerHTML = '<b>Login incorreto</b>';
                }else if(dataRes === 'ne'){
                    document.getElementById("result").innerHTML = '<b>Não existe conta cadastrada com este email</b>';
                }
                setTimeout(() => {
                    document.getElementById("result").innerHTML = '';  
                }, 3000);
            }).catch((error)=>{
                alert("Não foi possível efetuar login!");
            })
        }
    }
}
Vue.createApp(login).mount('#appLogin');
</script>
<style>
    body{
        background: #F2B90C !important;
    }
    
</style>
<style scoped>
    #logo-trashcol{
        max-width: 300px;
    }
    .text{
        font-size: 1.3rem;
    }
</style>
