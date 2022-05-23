<template>
    <div class="biodataList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>biodata Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">biodata</li>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">biodata Form</h3>
                <router-link :to="{name:'biodata'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> biodata list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="savebiodata">
                    <div class="row">
                      <div class="col-md-6 form-group">
                            <label for="">gender</label>
                            <select class="form-control" v-model="form.gender" :class="{ 'is-invalid': form.errors.has('gender') }">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                            <has-error :form="form" field="gender"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">email</label>
                            <input type="email" class="form-control" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">address </label>
                            <input type="text " class="form-control" v-model="form.address " :class="{ 'is-invalid': form.errors.has('address') }">
                            <has-error :form="form" field="address "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">mobile </label>
                            <input type="number " class="form-control" v-model="form.mobile " :class="{ 'is-invalid': form.errors.has('mobile') }">
                            <has-error :form="form" field="mobile "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">nationality  </label>
                            <input type="text " class="form-control" v-model="form.nationality  " :class="{ 'is-invalid': form.errors.has('nationality ') }">
                            <has-error :form="form" field="nationality  "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">relisgim  </label>
                            <input type="text " class="form-control" v-model="form.relisgim  " :class="{ 'is-invalid': form.errors.has('relisgim ') }">
                            <has-error :form="form" field="relisgim  "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">birthday  </label>
                            <input type="date" class="form-control" v-model="form.birthday  " :class="{ 'is-invalid': form.errors.has('birthday ') }">
                            <has-error :form="form" field="birthday  "></has-error>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">save biodata</button>
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
        address:'',
        gender:'',
        mobile:'',
        birthday:'',
        nationality:'',
        relisgim :'',
      })
    }
  },
  methods: {
    savebiodata:function(){
      this.form.post('/biodata/save').then((response)=>{
        this.$message({
          message: 'biodata save success',
          type: 'success'
        });
        this.form.name='';
        this.form.email='';
        this.form.address='';
        this.form.gender='';
        this.form.mobile='';
        this.form.relisgim='';
        this.form.nationality='';
        this.form.birthday='';
      });
    }
  },
}
</script>
<style>
 label{
   text-transform: uppercase;
 }
</style>