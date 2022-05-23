<template>
    <div class="socialList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Social Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Social</li>
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
                <h3 class="card-title">Social Form</h3>
                <router-link :to="{name:'social'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> social list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="savesocial">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">facebook</label>
                            <input type="text" class="form-control" v-model="form.facebook" :class="{ 'is-invalid': form.errors.has('facebook') }">
                            <has-error :form="form" field="facebook"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">youtube </label>
                            <input type="text " class="form-control" v-model="form.youtube " :class="{ 'is-invalid': form.errors.has('youtube') }">
                            <has-error :form="form" field="youtube "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">github </label>
                            <input type="number " class="form-control" v-model="form.github " :class="{ 'is-invalid': form.errors.has('github') }">
                            <has-error :form="form" field="github "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">linkedin  </label>
                            <input type="text " class="form-control" v-model="form.linkedin  " :class="{ 'is-invalid': form.errors.has('linkedin ') }">
                            <has-error :form="form" field="linkedin  "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">whatsapp  </label>
                            <input type="text " class="form-control" v-model="form.whatsapp  " :class="{ 'is-invalid': form.errors.has('whatsapp ') }">
                            <has-error :form="form" field="whatsapp  "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">instragram  </label>
                            <input type="text" class="form-control" v-model="form.instragram  " :class="{ 'is-invalid': form.errors.has('instragram ') }">
                            <has-error :form="form" field="instragram  "></has-error>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">save social</button>
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
        facebook:'',
        youtube:'',
        github:'',
        linkedin:'',
        whatsapp:'',
        instragram:'',
      })
    }
  },
  methods: {
    savesocial:function(){
      this.form.post('/social/save').then((response)=>{
        this.$message({
          message: 'social save success',
          type: 'success'
        });
        this.form.name='';
        this.form.facebook='';
        this.form.youtube='';
        this.form.github='';
        this.form.linkedin='';
        this.form.whatsapp='';
        this.form.instragram='';
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