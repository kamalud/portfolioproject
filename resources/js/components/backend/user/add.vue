<template>
    <div class="userList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9 m-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Form</h3>
                <router-link :to="{name:'user'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> user list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="saveUser">
                    <div class="row">
                      <div class="col-md-6 form-group">
                            <label for="">user Roll</label>
                            <select class="form-control" v-model="form.usertype">
                              
                              <option value="Admin">Admin</option>
                              <option value="user">user</option>
                            </select>
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">user name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">user Email</label>
                            <input type="email" class="form-control" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">user password</label>
                            <input type="password" class="form-control" v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">save user</button>
                    <button type="reset" class="btn btn-default float-right">cancle</button>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
</template>
<script>
export default {
  name:'add',
  data(){
    return {
      form : new Form({
        name:'',
        email:'',
        usertype:'',
        password:'',
      })
    }
  },
  methods: {
    saveUser:function(){
      this.form.post('/user/save').then((response)=>{
        this.$message({
          message: 'User save success',
          type: 'success'
        });
        this.form.name='';
        this.form.email='';
        this.form.password=''
      });
    }
  },
}
</script>