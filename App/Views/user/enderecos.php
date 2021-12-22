<div id="appEndereco">
    <div class="container p-5">
        <?php
        if(isset($this->view->enderecos) && !empty($this->view->enderecos)){ ?>
        <h1 class="text-secondary mb-4" style="font-size: 1.8rem;">Endereço Encontrado:</h1>

        <?php foreach ($this->view->enderecos as $key => $endereco) { ?>
            
            <div class="d-flex p-2 mb-3" style="border: 2px solid <?= random_color(); ?>;">
                <div><h1><?= $endereco->logradouro ?>, Nº <?= $endereco->numero ?>, <?= $endereco->bairro ?>, <?= $endereco->cidade ?> - <?= $endereco->estado ?></h1><h1 class="text-secondary">Raio: <?= $endereco->raio ?> Metros</h1></div>
                <div class="d-flex" style="flex-direction: column;">
                    <div class="mb-3">
                        <i class="bi bi-pencil-square fs-2 text-info"  @click="alterar" data-id="<?= $endereco->id ?>" data-raio="<?= $endereco->raio ?>" data-logradouro="<?= $endereco->logradouro ?>" data-bairro="<?= $endereco->bairro ?>" data-cidade="<?= $endereco->cidade ?>" data-estado="<?= $endereco->estado ?>" data-numero="<?= $endereco->numero ?>"></i>
                    </div>
                    <div>
                        <i class="bi bi-trash-fill fs-2 text-danger" @click="remove" data-id="<?= $endereco->id ?>"></i>
                    </div>
                    
                </div>
            </div>
        
        <?php            
                }
            }else{
                echo '<h1 class="text-info mb-4 text-center" style="font-size: 1.8rem;">Nenhum Endereço Encontrado</h1>';
            }

        ?>
        

        <div class="mt-5">
            <div><h1 style="text-align: center; color:#e9b825; border:1px solid #e9b825; border-radius:40px;cursor:pointer;" class="p-4" data-bs-toggle="modal" data-bs-target="#exampleModal">+Cadastrar um novo endereço</h1></div>
        </div>
        <div class="fs-4" style="color:#097337; text-align:center;display: <?= isset($_GET['cadastro']) && $_GET['cadastro'] == true ? 'block' : 'none';?>;" id="returnCadastro">Endereço cadastrado com sucesso!</div>
        
    </div>
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="addEndereco" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" style="font-size: 2.0rem; color: #097337;">Cadastrar um novo endereço</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form @submit="addEnreco">
        <div class="modal-body">
            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" id="logradouro" placeholder="Ex: AV Walter Passos" required>
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text"name="bairro"  class="form-control" id="bairro" placeholder="Ex: Centro" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Nº</label>
                <input type="text" name="numero" class="form-control" id="numero" placeholder="Ex: 58">
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text"name="cidade"  class="form-control" id="cidade" placeholder="Ex: Ubaitaba" required>
            </div>
            <div class="mb-5">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" id="estado" placeholder="Ex: Bahia" required>
            </div>
            <hr/>
            
            <div class="mb-3">
                <label for="raio" class="form-label text-info">Raio de Alerta: <span style="padding: 0px 10px 0px; border-radius:50%;" class="bg-secondary text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Informe o raio de distância em que o alerta será ativado quando o coletor de lixo passar">!</span></label>
                <input type="number" name="raio" class="form-control" id="raio" placeholder="Em metros" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning" style="background:#e9b825;">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="modal-alterar" tabindex="-1" aria-labelledby="alteraEndereco" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" style="font-size: 2.0rem;color: #097337;">Alterar endereço</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formAltera" @submit="alteraEnvia">
        <div class="modal-body">
            <input type="hidden" name="id" id="id_alt">
            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" id="logradouro_alt" placeholder="Ex: AV Walter Passos" required>
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text"name="bairro"  class="form-control" id="bairro_alt" value="" placeholder="Ex: Centro" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Nº</label>
                <input type="text" name="numero" class="form-control" id="numero_alt" value="" placeholder="Ex: 58">
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text"name="cidade"  class="form-control" id="cidade_alt" value=""placeholder="Ex: Ubaitaba" required>
            </div>
            <div class="mb-5">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" id="estado_alt"  value=""placeholder="Ex: Bahia" required>
            </div>
            <hr/>
            
            <div class="mb-3">
                <label for="estado" class="form-label text-info">Raio de Alerta: <span style="padding: 0px 10px 0px; border-radius:50%;" class="bg-secondary text-white"  data-bs-toggle="tooltip" data-bs-placement="top" title="Informe o raio de distância em que o alerta será ativado quando o coletor de lixo passar">!</span></label>
                <input type="number" name="raio" class="form-control" id="raio_alt"  value="" placeholder="Em metros" required>
            </div>
            <div>
                <p class="text-success" id="retorno-att"></p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning" style="background:#e9b825;">Alterar</button>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
<script>
const endereco =  {
    data() {
        return {
        }
    },
    methods:{
        addEnreco(e){
            e.preventDefault();
            const data = new FormData(e.target)
            
            const req = fetch('/user/endereco', {
                        method: "POST",
                        body: data
                    }).then((response) => {
                        return response.text()
                    }).then((dataRes)=>{
                        
                        if(dataRes === 'ok'){
                            window.location.href = `/enderecos?cadastro=${true}`;
                        }else if(dataRes === 'falhou'){
                            document.getElementById("returnCadastro").style.display='block';
                            document.getElementById("returnCadastro").style.color='#dc3545';
                            document.getElementById("returnCadastro").innerHTML = '<b>Não foi possível efetuar o cadastro! Tente novamente mais tarde.</b>';
                        }
                    }).catch((error)=>{

                    })
            
        },
        remove(e){
            const form = document.createElement('form');

            const formData = new FormData(form);

            formData.append('id', e.target.getAttribute('data-id'));

            const req = fetch('/user/endereco-remove', {

                    method: "POST",
                    body: formData

                    }).then((response) => {
                        return response.text()
                    }).then((dataRes)=>{
                        
                        if(dataRes === 'ok'){
                            window.location.href = `/enderecos`;
                        }else if(dataRes === 'falhou'){
                            document.getElementById("returnCadastro").style.display='block';
                            document.getElementById("returnCadastro").style.color='#dc3545';
                            document.getElementById("returnCadastro").innerHTML = '<b>Não foi possível remover o endereço! Tente novamente mais tarde.</b>';
                        }
                    
                    }).catch((error)=>{

                    })
        },
        alterar(e){
            document.getElementById("id_alt").value = e.target.getAttribute('data-id');
            document.getElementById("cidade_alt").value = e.target.getAttribute('data-cidade');
            document.getElementById("bairro_alt").value = e.target.getAttribute('data-bairro');
            document.getElementById("estado_alt").value = e.target.getAttribute('data-estado');
            document.getElementById("numero_alt").value = e.target.getAttribute('data-numero');
            document.getElementById("raio_alt").value = e.target.getAttribute('data-raio');
            document.getElementById("logradouro_alt").value = e.target.getAttribute('data-logradouro');

            var modal = new bootstrap.Modal(document.getElementById('modal-alterar'), {});
            modal.show();
        },
        alteraEnvia(e){
            e.preventDefault();

            const formData = new FormData(e.target);

            const req = fetch('/user/endereco-altera', {

                    method: "POST",
                    body: formData

                    }).then((response) => {
                        return response.text()
                    }).then((dataRes)=>{
                        
                        if(dataRes === 'ok'){
                            document.getElementById('retorno-att').innerText = 'Endereço alterado';
                            setTimeout(()=>{
                                window.location.href = `/enderecos`;
                            }, 2000)
                        }else if(dataRes === 'falhou'){
                            
                            document.getElementById("returnCadastro").innerHTML = '<b>Não foi possível alterar o endereço! Tente novamente mais tarde.</b>';
                            document.getElementById("returnCadastro").style.color='#dc3545';
                            document.getElementById("returnCadastro").style.display='block';
                        }
                    
                    }).catch((error)=>{

                    })
        }
    },
    
    mounted() {
        setTimeout(()=>{
            document.getElementById("returnCadastro").style.display='none';
        }, 3500)
    },
}
Vue.createApp(endereco).mount('#appEndereco');
</script>
<style>
    h1{
        font-size: 1.5rem;
        line-height: 1.5rem;
    }
    label{
        font-size: 2.0rem;
        line-height: 2.2rem;
    }
    input{
        font-size: 1.8rem !important;
        color: #097337 !important;
    }
    .tooltip-inner{
        font-size: 1.3rem;
    }
</style>

<?php
function random_color($start = 0x000000, $end = 0xFFFFFF) {
    return sprintf('#%06x', mt_rand($start, $end));
 }


?>