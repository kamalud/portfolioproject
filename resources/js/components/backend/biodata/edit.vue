<template>
    <div class="biodataList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>biodata Edit Form</h1>
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
                <h3 class="card-title">biodata Edit Form</h3>
                <router-link :to="{name:'biodata'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> biodata list</router-link>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <form @submit.prevent="saveupdate">
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
                            <input type="date " class="form-control" v-model="form.birthday  " :class="{ 'is-invalid': form.errors.has('birthday ') }">
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
  name:'edit',
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
        id :'',
      })
    }
  },
   methods: {
    saveupdate:function(){
      this.form.post('/biodata/update').then((response)=>{
        this.$message({
          message: 'biodata update success',
          type: 'success'
        });
        this.$router.push('/biodata');
      });
    },
    Editbiodata:function(){
        axios.get('/biodata/edit/'+ this.$route.params.slug).then((response)=>{
         this.form.fill(response.data.biodata);
        });
    }

  },
  mounted() {
    this.Editbiodata();
  },
}
</script>