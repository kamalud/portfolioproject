<template>
    <div class="categoryList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">category</li>
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
                <h3 class="card-title">category Form</h3>
                <router-link :to="{name:'category'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> category list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="savecategory">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">save category</button>
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
      }),

    }
  },
  methods: {
    savecategory:function(){
      this.form.post('/category/save').then((response)=>{
        this.$message({
          message: 'category save success',
          type: 'success'
        });
        this.form.name='';
      });
    }
  },
}
</script>