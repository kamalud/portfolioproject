<template>
    <div class="aboutList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>about Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">about</li>
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
                <h3 class="card-title">about Form</h3>
                <router-link :to="{name:'about'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> about list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="saveabout">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">title</label>
                            <input type="text" class="form-control" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>

                         <div class="col-md-6 form-group">
                            <label for="">Experince Year</label>
                            <input type="text" class="form-control" v-model="form.date" :class="{ 'is-invalid': form.errors.has('date') }">
                            <has-error :form="form" field="date"></has-error>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="">Description</label>
                            <ckeditor :editor="editor" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description	') }" :config="editorConfig"></ckeditor>
                            <has-error :form="form" field="description	"></has-error>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">save about</button>
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
 import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
  name:'add',
  data(){
    return {
      form : new Form({
        name:'',
        title:'',
        date:'',
        description	:'',
      }),

       editor: ClassicEditor,
        editorConfig: {
            // The configuration of the editor.
        }

    }
  },
  methods: {
    saveabout:function(){
      this.form.post('/about/save').then((response)=>{
        this.$message({
          message: 'about save success',
          type: 'success'
        });
        this.form.name='';
        this.form.title='';
        this.form.date='';
        this.form.description	='';
      });
    }
  },
}
</script>