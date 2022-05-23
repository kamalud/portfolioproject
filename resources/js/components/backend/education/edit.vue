<template>
    <div class="educationList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Education Edit Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">education</li>
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
                <h3 class="card-title">education Edit Form</h3>
                <router-link :to="{name:'eduction'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> education list</router-link>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <form @submit.prevent="saveupdate">
                    <div class="row">
                      <div class="col-md-6 form-group">
                            <label for="">Group name</label>
                            <select class="form-control" v-model="form.group" :class="{ 'is-invalid': form.errors.has('gender') }">
                              <option value="Science">Scince</option>
                              <option value="Arts">Arts</option>
                              <option value="Buissness studay">Buissness studay</option>
                            </select>
                            <has-error :form="form" field="gender"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">board name</label>
                            <input type="text" class="form-control" v-model="form.board" :class="{ 'is-invalid': form.errors.has('board') }">
                            <has-error :form="form" field="board"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Result </label>
                            <input type="number " class="form-control" v-model="form.result " :class="{ 'is-invalid': form.errors.has('result') }">
                            <has-error :form="form" field="result "></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">year </label>
                            <input type="number " class="form-control" v-model="form.year " :class="{ 'is-invalid': form.errors.has('year') }">
                            <has-error :form="form" field="year "></has-error>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">save education</button>
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
        id:'',
        group:'',
        board:'',
        result:'',
        year:'',
      })
    }
  },
   methods: {
    saveupdate:function(){
      this.form.post('/education/update').then((response)=>{
        this.$message({
          message: 'education update success',
          type: 'success'
        });
        this.$router.push('/education');
      });
    },
    Editeducation:function(){
        axios.get('/education/edit/'+ this.$route.params.slug).then((response)=>{
         this.form.fill(response.data.education);
        });
    }

  },
  mounted() {
    this.Editeducation();
  },
}
</script>