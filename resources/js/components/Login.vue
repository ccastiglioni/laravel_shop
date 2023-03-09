<template>


    <div class="auth-wrapper">
        <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="/home">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Login</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center card-header">
            <h2 class="h3 mb-1 text-black">Login Acess</h2>
          </div>
          <div class="center col-6">

            <form ref="form"  method="POST" action="" @submit.prevent="login($event)">
                <input type="hidden" name="_token" v-bind:value="csrf_token">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" v-model="email" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Senha <span class="text-danger">*</span></label>
                    <input type="password" name="password" v-model="password" class="form-control"   >
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <!-- <label for="c_message" class="text-black"> Acesse o login para ver suas compras. <i> digite um email valido!</i></label> -->
                    <p class="mb-2 text-muted">Esqueceu sua senha? <a href="password/reset">Reset</a></p>
                    <p class="mb-0 text-muted">Não tem uma conta? <a href="register">Cadastro</a></p>
                  </div>
                </div>
                <div class="form-group row justify-content-center">
                  <div class="col-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                  </div>
                </div>

              </form>

              </div>
          </div>

        </div>
      </div>
    </div>
</template>

<script>
    export default {
        props: ['csrf_token'], //data (semelhante)
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login(e) {

                this.$refs.form.submit();

                /*
                 let url = 'http://localhost:8000/login'
                let configuracao = {
                    method: 'post',
                    headers: { "Content-Type": "application/json" },
                    body: new URLSearchParams({  //essa funcao encapsula pra x-www.form
                        'email': this.email,
                        'password': this.password
                    })
                }
                fetch(url, configuracao)
                  .then(response => response.json())
                    .then(dados => {
                        if(dados.token) {
                            document.cookie = 'token='+dados.token+';SameSite=Lax';
                        }
                        //dar sequência no envio do form de autenticação por sessão
                       e.target.submit()
                    })
                    */
            }
        }
    }
</script>
