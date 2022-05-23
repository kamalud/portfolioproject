<template>
    <div class="settingList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>setting Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">setting</li>
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
                <h3 class="card-title">setting Form</h3>
                <router-link :to="{name:'setting'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> setting list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="savesetting">
                    <div class="row">
                        <div class="col-md-9 form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for=""> Backend Icon</label>
                            <input type="file" name="image"  :class="{ 'is-invalid': form.errors.has('image') }" @change="loadImage($event)">
                            <has-error :form="form" field="image"></has-error>
                        </div>

                         <div class="col-md-4 form-group">
                             <label for=""> Backend Icon</label>
                              <img :src="form.image" alt="" >
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">save setting</button>
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
        image:'',
      }),

    }
  },
  methods: {
    savesetting:function(){
      this.form.post('/setting/save').then((response)=>{
        this.$message({
          message: 'setting save success',
          type: 'success'
        });
        this.form.name='';
        this.form.image='';
        this.form.image2='';
        this.form.image3	='';
      });
    }
  },
}
</script>
<style>
 img{
     width:90px;
     height :100px;
     border: 1px solid hsl(0, 1%, 54%);
 }
</style>