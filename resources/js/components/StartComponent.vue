<template>
    <div class="container">
        <form method="POST" v-bind:action="loginRoute">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="height: 80vh; border: 1px solid #CFCFCF; border-radius: 5px; display: flex;">
                    <div style="flex: 45%; background-color: #F4F4F4; padding-left: 10px; padding-right: 10px;">
                        <img :src="formImage" alt="remote-work.png" style="width: 100%; padding-top: 50%;">
                    </div>
                    <div style="flex: 55%; padding-left: 10px; padding-right: 10px;">
                        <div class="card-body">
                            <form>
                                <div class="text-left">
                                    <h3 style="color: #505050; padding-top: 25%;">{{ formText }}</h3>
                                    <p class="text-muted">
                                        ¿No tienes cuenta? <a href="#" class="">Registrate</a>.
                                    </p>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control form-control-sm" v-model="formInputs.emailInput.data" id="floatingInput" name="email" placeholder="nombre@ejemplo.com">
                                    <label for="floatingInput">Correo electrónico</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control form-control-sm" v-model="formInputs.passwordInput.data" id="floatingPassword" name="password" placeholder="Contraseña">
                                    <label for="floatingPassword">Contraseña</label>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                    <button type="button" class="btn" v-bind:class="{ 'disabled': formInputs.emailInput.passwordError && formInputs.passwordInput.passwordError, 'btn-primary': !waitingResponse,'btn-default':waitingResponse}" v-on:click="validateLoginForm">
                                        <span v-if="!waitingResponse">Iniciar</span>
                                        <span v-if="waitingResponse" class="fa fa-circle-o-notch fa-spin"></span>
                                    </button>
                                    
                                </div>
                                <div class="text-center mt-4">
                                    <p class="text-muted">
                                        ¿Olvisaste tus datos? <a href="#" class="">Click aquí</a>.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
        urlBase: window.location.origin,
        formImage: '/images/remote-work.png',
        loginRoute: '/login',
        formText: 'Iniciar sesión',
        waitingResponse: false,
        formInputs:{
        emailInput:{
            data: '',
            emailError: false,
            emailErrorMsg: ''
        },
        passwordInput:{
            data: '',
            passwordError: false,
            passwordErrorMsg: ''
        }
      }
    }
  },
  methods:{
    validateCredentials: function(){
        let elvue = this;
        let formData = new FormData();
        formData.append("email", this.formInputs.emailInput.data);
        formData.append("password",this.formInputs.passwordInput.data);
        elvue.waitingResponse = true;
        axios.post('vuelogin',formData).then((response)=>{
            let received = response.data;
            console.log(received);
            if(received.status){
                // setTimeout(()=>{window.location.href = elvue.urlBase},1000);
                window.location.href = elvue.urlBase + '/home';
            }
            else{
                elvue.errorAlert(received.message);
            }
        }).then(()=>{elvue.waitingResponse = false})
    },
    // methods
    errorAlert: function(message){
        iziToast.show({
            // theme: 'dark',
            // icon: 'icon-person',
            title: '',
            message: message,
            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
            messageSize: '14'
        });
    },
    validateLoginForm: function(){
        // Validar Email
        if(this.formInputs.emailInput.data == "" ||
            this.formInputs.emailInput.data == null ||
            this.formInputs.emailInput.data == undefined){
            this.formInputs.emailInput.emailError = true;
            this.formInputs.emailInput.emailErrorMsg = "Correo es requerido";
        }
        else{
            this.formInputs.emailInput.emailError = false;
            this.formInputs.emailInput.emailErrorMsg = '';
        }
        if(this.formInputs.passwordInput.data == "" ||
            this.formInputs.passwordInput.data == null ||
            this.formInputs.passwordInput.data == undefined){
            this.formInputs.passwordInput.passwordError = true;
            this.formInputs.passwordInput.passwordErrorMsg = "Contraseña es requerida";
        }
        else{
            this.formInputs.passwordInput.passwordError = false;
            this.formInputs.passwordInput.passwordErrorMsg = '';
        }
        this.validateCredentials();
    }
  },
  mounted: function(){
    
  }
}
</script>