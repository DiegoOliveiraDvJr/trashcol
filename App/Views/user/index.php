<div id="appRegistrar">
    <div class="d-flex justify-content-center align-items-center" style="width:100%; height:100vh;">
        <div class="col-11 col-lg-5 col-xxl-3 ">
            <div class="d-flex justify-content-center mb-5">
                <img src="img/logo-branca.png" class="img-fluid" alt="Logo TrashCol" id="logo-trashcol">
            </div>
            <h1 class="text-center fw-bold mb-4 text-white" style="font-size: 3rem;">Crie sua conta</h1>
            <div>
                <form @submit="registrar">
                    <div class="item-login p-4 mb-2 bg-white d-flex flex-row justify-content-center bordaRadius" style="width: 100%;">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-white" id="nome" style="border: none;"> <img src="img/user.png" class="img-fluid mx-3" style="opacity: 0.6;"></span>
                            <input type="nome" v-model="nome" class="form-control" placeholder="Nome" aria-label="nome" aria-describedby="nome" style="border: none;font-size:1.7rem;">
                        </div>
                    </div>
                    <div class="item-login p-4 mb-2 bg-white d-flex flex-row justify-content-center bordaRadius" style="width: 100%;">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-white" id="telefone" style="border: none;"> <img src="img/telefone.png" class="img-fluid mx-3" style="opacity: 0.6;"></span>
                            <input type="text" v-model="telefone" class="form-control" placeholder="telefone" aria-label="telefone" aria-describedby="telefone" style="border: none;font-size:1.7rem;">
                        </div>
                    </div>
                    <div class="item-login p-4 mb-2 bg-white d-flex flex-row justify-content-center bordaRadius" style="width: 100%;">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-white" id="email" style="border: none;"> <img src="img/email.png" class="img-fluid mx-3" style="opacity: 0.6;"></span>
                            <input type="email" v-model="email" class="form-control" placeholder="E-mail" aria-label="email" aria-describedby="email" style="border: none;font-size:1.7rem;">
                        </div>
                    </div>
                   
                    <div class="item-login p-4 mb-3 bg-white d-flex flex-row justify-content-center bordaRadius">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-white" id="senha" style="border: none;"> <img src="img/senha.png" class="img-fluid mx-3" style="opacity: 0.6;"></span>
                            <input type="password" v-model="senha" class="form-control" placeholder="Senha" aria-label="senha" aria-describedby="senha" style="border: none;font-size:1.7rem;">
                        </div>
                    </div>
                    <div>
                        <p v-if="campos" class="text-danger text  mb-2">Os campos devem ser preenchidos corretamente! <br> Nome: mínimo de 3 caracteres , email: mínimo de 10 caracteres , senha: mínimo de 8 caracteres </p>
                    </div>
                    <div class="p-3">
                        <div class="form-check mb-3">
                            <input class="form-check-input text" type="checkbox" value="" id="checkPolitica">
                            <label class="form-check-label text-white text" for="checkPolitica">
                                Ao informar meus dados, eu concordo com a <a href="/politica-de-privacidade" class="text-white"> Política de Privacidade</a>
                            </label>
                        </div>

                    </div>

                    <p class="text text-danger text-center fs-4" id="result"></p>
                    <input  type="submit" class="btn p-4 mb-2 text-white fs-2 w-100 bordaRadius" style="background-color:#097337;" value="Criar"> 
                </form>
               
                <div class="d-flex justify-content-center mb-1 mt-1">
                    <small class="text-white text fs-3">Você já tem conta?</small>
                    <div>
                        <span class="text-white mx-2 text fs-3"> <ins><a href="/login">Logar</a></ins></span>
                    </div>

                </div>
                
            </div>
            
        </div>

    </div>
</div>
<script>
const registrar =  {
    data() {
        return {
            nome: '',
            email: '',
            senha: '',
            telefone: '',
            campos: false
        }
    },
    methods:{
        registrar(e){
            e.preventDefault();
            if(document.getElementById('checkPolitica').checked){

                if(this.verificarcampos()){

                    const formData = new FormData(e.target);

                    formData.append('nome', this.nome);
                    formData.append('email', this.email);
                    formData.append('telefone', this.telefone);
                    formData.append('senha', this.senha);

                    const req = fetch('/user/registrar', {
                        method: "POST",
                        body: formData
                    }).then((response) => {
                        return response.text()
                    }).then((dataRes)=>{
                        
                        if(dataRes === 'ok'){
                            window.location.href = `/login?cadatro=${true}`;
                        }else if( dataRes === 'existe'){
                            document.getElementById("result").innerHTML = '<b>Já existe uma conta cadastrada com este email e/ou telefone</b>';
                        }else if(dataRes === 'falhou'){
                            document.getElementById("result").innerHTML = '<b>Não foi possível efetuar o cadastro! Tente novamente mais tarde.</b>';
                        }
                    }).catch((error)=>{

                    })
                }else{
                    this.campos = true;
                }
            }else{
                document.getElementById("result").innerHTML = '<b>Por favor informe que você concorda com nossa Política de Privacidade</b>';
            }
            
        },
        verificarcampos(){
            if(this.nome.length < 3 || this.senha.length < 8 || this.email < 10){
                
                return false;
            }
            return true
        }
    }
}
Vue.createApp(registrar).mount('#appRegistrar');
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
        line-height: 1.2;
    }
    input:focus {
        box-shadow: none !important;
        border: 0 none !important;
        outline: 0 !important;
    } 
    .form-check-input:checked {
        background-color: #097337;
        border-color: #097337;
    }
</style>
