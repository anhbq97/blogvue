<template>
    <div class="container">
      <p>Hello DAy la Dashboard</p>
    </div>
</template>
  
  <script>
  export default {
    name: 'Dashboard',
    
    data: function () {
      return {
          email: '',
          password: '',
          message: '',
          code: 0
      }
    },
    methods: {
      login() {
          axios.post(process.env.MIX_APP_URL_LOCAL + '/api/v1/auth/login', {
            email: this.email,
            password: this.password,
          }).then(response => {
            this.code = 400;
            this.message = response.data.message;
  
            if (response.data.code == 200) {
              localStorage.setItem('USER', JSON.stringify(response.data.data.user));
              localStorage.setItem('TOKEN', response.data.data.access_token);
              localStorage.setItem('isLogged', 1);
              this.$router.push('/dashboard');
            }
          })
          .catch(error => {
              console.log(error);
          })
      },
    }
  }
  </script>
  