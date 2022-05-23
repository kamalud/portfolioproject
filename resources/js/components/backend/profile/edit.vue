<template>
    <div class="profileList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>profile update Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">profile Form</h3>
                <router-link :to="{name:'profile'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> profile list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="saveprofile" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">profile name</label>
                        <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                      <div class="col-md-4 form-group">
                            <label for="">Gender</label>
                            <select class="form-control" v-model="form.gender">
                              <option value="">Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">profile</option>
                            </select>
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for=""> Email</label>
                            <input type="email" class="form-control" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for=""> mobile</label>
                            <input type="number" class="form-control" v-model="form.mobile" :class="{ 'is-invalid': form.errors.has('mobile') }">
                            <has-error :form="form" field="mobile"></has-error>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for=""> address</label>
                            <input type="text" class="form-control" v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }">
                            <has-error :form="form" field="address"></has-error>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for=""> image</label>
                            <input type="file"  :class="{ 'is-invalid': form.errors.has('image') }" @change="loadImage($event)">
                            <has-error :form="form" field="image"></has-error>
                        </div>
                        <div class="col-md-6 form-group m-auto">
                          <img :src="form.image" alt="" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">profile update</button>
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
        gender:'',
        address:'',
        mobile:'',
        image:'',
        id:'' 
      })
    }
  },
    methods: {
    saveprofile:function(){
      this.form.post('/profile/update').then((response)=>{
        this.$message({
          message: 'profile update success',
          type: 'success'
        });
        this.$router.push('/profile');
      });
    },
    Editprofile:function(){
        axios.get('/profile/edit').then((response)=>{
         this.form.fill(response.data.profile);
        });
    },


  },
  mounted() {
    this.Editprofile();
  },
}
</script>
<style>
 img{
     width:150px;
     height :160px;
     border: 1px solid hsl(0, 1%, 54%);
 }
</style>