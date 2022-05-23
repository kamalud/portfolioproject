<template>
    <div class="userList">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Add Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link :to="{name:'home'}">Home</router-link></li>
              <li class="breadcrumb-item active">User Add Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">User Add Form</h3>
                <router-link :to="{name:'profile'}" class="card-title float-right"><i class="fa fa-list"></i> UserList</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form role="form" @submit.prevent="passwordchange" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                                <label>Old password</label>
                                <input type="password" v-model="form.old_password" class="form-control" placeholder="Enter Old password">
                                <div class="text-danger" v-if="form.errors.has('old_password')" v-html="form.errors.get('old_password')" />
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                                <label>new password</label>
                                <input type="password" v-model="form.password" class="form-control" placeholder="Enter new password">
                                <div class="text-danger" v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" v-model="form.password_confirmation" class="form-control" placeholder="Enter Confirm password">
                                <div class="text-danger" v-if="form.errors.has('password_confirmation')" v-html="form.errors.get('password_confirmation')" />
                          </div>
                      </div>
                      
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-danger float-right">Reset</button>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
</template>

<script>
export default {
    name:'userAdd',
     data: () => ({
    form: new Form({
      old_password:'',
      password:'',
      password_confirmation:'',
      image:'',
    })
  }),
    methods:{
      passwordchange(){
        this.form.post('/profile/change_p').then(response=>{
          
         if(response.data.message){
           this.$router.push('/profile');
             this.$message({
           message: 'Password Change successfully',
           type: 'success'
          });
         }else{
             this.$message({
           message: 'Password Old password does not mach',
           type: 'info'
          });
         }
        })
      },
    }
}
</script>
