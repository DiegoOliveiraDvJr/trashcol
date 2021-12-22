
<div id="appIndex">
    <form @submit="endereco">
        <div class="input-group mb-1 ">
        <a href="/" class="input-group-text bg-verde text-white"><i class="bi bi-arrow-clockwise"></a></i>
            
                <input type="text" class="form-control" name="endereco" id="endereco_input" placeholder="Av Vasco Neto Ubaitaba, Bahia">
                <button class="input-group-text bg-verde text-white" type="submit">Buscar</button>
            
        </div>
    </form>
    
    <small id="result" class="text-warning"></small>
    <h5 id="result2" class="text-danger text-center mx-2 mt-3" style="display:none;">A Localização atual encontra-se desativada. Para ativa-lá entre nas configurações do aplicativo no seu dispositivo.</h5>
    <div class="d-flex justify-content-center align-items-center conteudo-ativa" style="flex-direction: column;z-index:99 !important;" id="mapa">
        <!-- <div class="alert alert-warning mb-5 fs-5" role="alert">
            Você ainda não verificou seu email! <ins @click="modalVerif" class="cursor-pointer">Clique aqui</ins> para verificar
        </div> -->
        <h2 class="text-dark fs-2 w-75 mb-5 fw-bold">Cadastre seu endereço ou ative a Localização para ter acesso ás informações dos coletores.</h2>
        <button class="btn btn-success p-4 mb-2 text-white fs-2 w-75 bordaRadius bg-verde d-none" @click="ativarLocalizacao">Ativar Localização</button>
        <button class="btn btn-success p-4 mb-2 text-white fs-2 w-75 bordaRadius bg-verde" @click="CadastrarEndereco">Cadastrar Endereço</button>
    </div>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

<style scoped>
    .bg-verde{
       background-color: rgb(9, 115, 55);
    }
    .logo-div{
        max-width: 250px;
        margin-top: 30px;
    }
    .bordaRadius{
        border-radius: 40px;
    }
    .conteudo-ativa{
        min-height: 75vh;
        width: 100%;
    }
    .menu-footer{
        height: 10vh;
    }
    .img-icon-menu{
        width:40px;
        height:auto;
    }
    input{
        text-align: center;
    }
    input::-webkit-input-placeholder {
        font-size: 1.2rem !important;
    }
    #map { width:100%;height:75vh; }
</style>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script>
    const index =  {
        data() {
            return {
                verificaModal: false,
                localizacao: false
            }
        },
        methods:{
            ativarLocalizacao(){
                if(!navigator.geolocation){
                    alert('localização desativada')
                }
                navigator.geolocation.getCurrentPosition((pos) => {
                    const div= document.getElementById('mapa');
                    div.innerHTML='<div id="map"></div>';

                    var mymap = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 13);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2luZ3NvZmRpZWdvIiwiYSI6ImNrdnd6d3NsaTZza3cydXMxMXFqNHRwYXUifQ.xHuSziaLignGWB6WqJwiVw', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            maxZoom: 18,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'your.mapbox.access.token'
                        }).addTo(mymap);

                        var marker = L.marker([pos.coords.latitude, pos.coords.longitude]).addTo(mymap);

                        marker.bindPopup("<b>Você está aqui</b>").openPopup();
                        document.querySelector('.leaflet-control-attribution').innerHTML = '<a></a>';
                })
                
            },
            constroiMapa(lat, long){
                const div = document.getElementById('mapa');
                div.innerHTML='<div id="map"></div>';
                document.getElementById('map').innerHTML='';
                var mymap = L.map('map').setView([lat, long], 13);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2luZ3NvZmRpZWdvIiwiYSI6ImNrdnd6d3NsaTZza3cydXMxMXFqNHRwYXUifQ.xHuSziaLignGWB6WqJwiVw', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken: 'your.mapbox.access.token'
                    }).addTo(mymap);

                    var marker = L.marker([lat, long]).addTo(mymap);

                    var marker2 = L.marker([-14.312317, -39.322422]).addTo(mymap);
                    marker2.bindPopup("<b>Coletor de lixo AB</b>");

                    var marker3 = L.marker([-14.312733, -39.315341]).addTo(mymap);
                    marker3.bindPopup("<b>Coletor de lixo BB</b>");

                    var marker4 = L.marker([-14.309645, -39.321030]).addTo(mymap);
                    marker4.bindPopup("<b>Coletor de lixo CA</b>");

                    const markrs = document.getElementsByClassName('leaflet-marker-icon');
                    
                    for(let i = 0; i < markrs.length; i++){
                        if(i!=0){
                            markrs[i].setAttribute('src', './img/marker-icon-cam.png');
                         }
                        //else{
                        //     markrs[0].style.display="none";
                        // }
                    }

                document.querySelector('.leaflet-control-attribution').innerHTML = '<a></a>';

            },
            CadastrarEndereco(){
                window.location.href = "/enderecos";
            },
            modalVerif(){
                
                if(!this.verificaModal){ 
                    const req = fetch('http://localhost:8080/user/verifica-email', {
                        method: "POST",
                        body: null
                    }).then((response) => {
                        return response.text()
                    }).then((dataRes)=>{

                        if(dataRes){
                            const app = document.querySelector('#appIndex');
                            let divModal = document.createElement('div');
                            divModal.innerHTML= '<div class="modal" tabindex="-1" id="modal-verifica"> <div class="modal-dialog modal-dialog-centered"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title fs-2">Verificar email</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <p class="fs-3 text-info text-center mb-4 mt-3">Enviamos um código de verificação para seu email</p> <div class="d-flex justify-content-center"><input maxlength="6" type="text" placeholder="informe o código de verificação" class="form-control text-secondary fs-1" style="max-width:300px;"></div></div> <div class="modal-footer"><span class="me-auto"></span> <button type="button" class="btn btn-success bg-verde text-white fs-5">Verificar</button> </div> </div> </div></div>';
                            app.appendChild(divModal);
                            var modal = new bootstrap.Modal(document.getElementById('modal-verifica'), {});
                            modal.show();
                            this.verificaModal = true;

                        }
                        
                    }).catch((error)=>{

                    })
                    
                    
                 }else{
                    var modal = new bootstrap.Modal(document.getElementById('modal-verifica'), {});
                    modal.show();
                 }
                
            },
            endereco(e){
                e.preventDefault();
                
                let enderco = document.getElementById('endereco_input').value;
                var url = `https://nominatim.openstreetmap.org/search?format=json&limit=1&q=${enderco}`;
               
                fetch(url, {
                        method: "POST",
                        body: null
                    }).then((response) => {
                        return response.json()
                    }).then((dataRes)=>{

                       dataRes.length ? this.constroiMapa(dataRes[0].lat, dataRes[0].lon) : document.getElementById('result').innerText = "Não foi possível encontrar o endereço informado";
                       setTimeout(() =>{
                        document.getElementById('result').innerText = ''; 
                       }, 2500)

                    }).catch((error)=>{

                    })
            },

            getDistance(origin, destination) {
                // return distance in meters
                var lon1 = this.toRadian(origin[1]),
                    lat1 = this.toRadian(origin[0]),
                    lon2 = this.toRadian(destination[1]),
                    lat2 = this.toRadian(destination[0]);

                var deltaLat = lat2 - lat1;
                var deltaLon = lon2 - lon1;

                var a = Math.pow(Math.sin(deltaLat/2), 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(deltaLon/2), 2);
                var c = 2 * Math.asin(Math.sqrt(a));
                var EARTH_RADIUS = 6371;
                return c * EARTH_RADIUS * 1000;
            },

            toRadian(degree) {
                return degree*Math.PI/180;
            },

            resetLatLog(mark,circle){

                if(!navigator.geolocation){
                     return null;
                }
                navigator.geolocation.getCurrentPosition((pos) => {
                    mark.setLatLng([pos.coords.latitude, pos.coords.longitude]);
                    circle.setLatLng([pos.coords.latitude, pos.coords.longitude]);
                })
                
            },

            spawnNotification() {
               
                const notification = new Notification("TrashCol", {
                    body: 'Um caminhão está a 500 metros de você'
                });

            }
            
            
        },
       
        mounted() {

            if(!navigator.geolocation){
                return null;
            }
            // Notification.requestPermission();

            navigator.geolocation.getCurrentPosition((pos) => {
                this.localizacao = true;
                const div= document.getElementById('mapa');
                div.innerHTML='<div id="map"></div>';

                var mymap = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 13);

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2luZ3NvZmRpZWdvIiwiYSI6ImNrdnd6d3NsaTZza3cydXMxMXFqNHRwYXUifQ.xHuSziaLignGWB6WqJwiVw', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken: 'your.mapbox.access.token'
                    }).addTo(mymap);

                    var myIcon = L.icon({
                        iconUrl: './img/marker-icon.png',
                        iconSize: [38, 38],
                        iconAnchor: [22, 94],
                        popupAnchor: [-3, -76],
                        shadowSize: [68, 95],
                        shadowAnchor: [22, 94]
                    });

                    var marker = L.marker([pos.coords.latitude, pos.coords.longitude]).addTo(mymap);

                    marker.bindPopup("<b>Você está aqui</b>").openPopup();

                    var marker2 = L.marker([-14.314174, -39.317903]).addTo(mymap);
                    marker2.bindPopup("<b>Coletor de lixo AB</b>");

                    var marker3 = L.marker([-14.312733, -39.315341]).addTo(mymap);
                    marker3.bindPopup("<b>Coletor de lixo BB</b>");

                    var marker4 = L.marker([-14.309645, -39.321030]).addTo(mymap);
                    marker4.bindPopup("<b>Coletor de lixo CA</b>");

                    

                    document.querySelector('.leaflet-control-attribution').innerHTML = '<a></a>';

                    var circle = L.circle([pos.coords.latitude, pos.coords.longitude], {
                        color: '#097337',
                        fillColor: '#6fe2a1',
                        fillOpacity: 0.5,
                        radius: 500
                    }).addTo(mymap);

                    document.querySelector('.leaflet-marker-icon').setAttribute('src', './img/marker-icon.png');

                    const markrs = document.getElementsByClassName('leaflet-marker-icon');
                    
                    for(let i = 0; i < markrs.length; i++){
                        if(i!=0){
                            markrs[i].setAttribute('src', './img/marker-icon-cam.png');
                        }
                    }
                    
                    
                    
                    setTimeout(()=>{
                        marker3.setLatLng([-14.312754, -39.316253]);
                       
                    }, 3000)

                    setTimeout(()=>{
                        marker3.setLatLng([-14.312390, -39.316543]);
                       
                    }, 10000)

                    setTimeout(()=>{
                        marker4.setLatLng([-14.309304, -39.320885]);
                       
                    }, 3000)

                    setTimeout(()=>{
                        marker4.setLatLng([-14.309003, -39.321332]);
                       
                    }, 13000)

                    setTimeout(()=>{
                        marker4.setLatLng([-14.309003, -39.321332]);
                       
                    }, 20000)

                    setInterval(()=>{
                        this.resetLatLog(marker, circle)
                    },1000)

                    
                    setTimeout(()=>{
                        marker2.setLatLng([-14.314291, -39.319408]);
                       
                    }, 3000)

                    setTimeout(()=>{
                        marker2.setLatLng([-14.314353, -39.319836]);
                       
                    }, 6000) 

                    setTimeout(()=>{
                        marker2.setLatLng([-14.314402, -39.320250]);
                       
                    }, 13000) 

        
                    setTimeout(()=>{
                        marker2.setLatLng([-14.314402, -39.320250]);
                       
                    }, 18000) 

                    setTimeout(()=>{
                        marker2.setLatLng([-14.314628, -39.322707]);
                       
                    }, 22000) 

                    setTimeout(()=>{
                        marker2.setLatLng([-14.314236, -39.324016]);

                        var distance = this.getDistance([pos.coords.latitude, pos.coords.longitude], [-14.314236, -39.324016])
                        distance = Math.round(distance);
                        let alerta = document.createElement('div');
                        
                        if(true){
                        
                            alerta.innerHTML=`<audio style="display: none;" controls autoplay><source src="./alerta/alerta-som.ogg" type="audio/ogg"><source src="./alerta/alerta-som.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"> <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/> </symbol> <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16"> <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/> </symbol> <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16"> <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/> </symbol></svg><div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" style="flex-direction: column;z-index: 9999 !important; position: fixed; top: 45%; right: 0; width: 100%; box-shadow: 0px 13px 15px -5px rgb(0 0 0 / 68%); margin-left: 10px; font-size: 2.2rem;" role="alert"> <svg class="bi flex-shrink-0 me-2" width="50" height="50" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg> <div class="p-3 fs-2" style="line-height:2rem; z-index:99999;"> O <strong>coletor AB</strong> está a <strong> ${distance} metros </strong> de você! <br><strong>Não esqueça de colocar o lixo para fora</strong>. </div> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
                            document.querySelector('body').appendChild(alerta);
                            // this.spawnNotification();
                            
                        }
                       
                    }, 30000)

                    
                    
            })
            
            
            window.addEventListener('load', ()=>{
                  
                var refreshIntervalId = setInterval(() => {
                    this.localizacao == false ? document.getElementById('result2').style.display="block" : this.localizacao == true;
                    if(this.localizacao){
                        clearInterval(refreshIntervalId);
                        document.getElementById('result2').style.display="none";
                    } 
                }, 1000);
                // setTimeout(() => {
                //     this.localizacao == false ? document.getElementById('result2').style.display="block" : '';
                // }, 500);
                
                
            })
            
        },
    }
Vue.createApp(index).mount('#appIndex');
</script>

