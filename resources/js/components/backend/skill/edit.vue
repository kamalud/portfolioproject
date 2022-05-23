<template>
    <div class="skillList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Skill Edit Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">skill</li>
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
                <h3 class="card-title">Skill Edit Form</h3>
                <router-link :to="{name:'skill'}" class="card-tools btn btn-primary"><i class="fa fa-list"></i> skill list</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form @submit.prevent="saveskill">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <input type="hidden" v-model="form.id" >
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">parsent</label>
                            <input type="number" class="form-control" v-model="form.parsent" :class="{ 'is-invalid': form.errors.has('parsent') }">
                            <has-error :form="form" field="parsent"></has-error>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">save skill</button>
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
        parsent:'',
        id:'',
      }),

    }
  },
  methods: {
    saveskill:function(){
      this.form.post('/skill/save').then((response)=>{
        this.$message({
          message: 'skill save success',
          type: 'success'
        });
        this.$router.push('/skill');
      });
    },
    Editskill:function(){
        axios.get('/skill/edit/'+ this.$route.params.slug).then((response)=>{
         this.form.fill(response.data.skill);
        });
    }
  },
  mounted() {
    this.Editskill();
  },
}
</script>