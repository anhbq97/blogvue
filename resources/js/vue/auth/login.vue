<template>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-4">
        <h4>Login</h4>
      </div>
    </div><br>
    <div class="row" v-if="code != 0">
      <button v-if="code == 200" class="alert alert-success">{{ message }}</button>
      <button v-else class="alert alert-danger">{{ message }}</button>
    </div>
    <div class="row">
      <div class="col-md-4 offset-4">
        <form action="/action_page.php">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email" v-model="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" v-model="password">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Remember me
            </label>
          </div><br>
          <button type="button" class="btn btn-primary" @click.prevent="login()">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  
  data: function () {
    return {
        email: 'bquocanh.97@gmail.com',
        password: 'H40th13npr0.',
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
