<template>
    <div class="skillList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>skill Tables</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">skill Table</h3>
                <router-link :to="{name:'skilladd'}"  class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add skill</router-link>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>Parsent</th>
                      <th>Time</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(skill,i) in skills" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ skill.name }}</td>
                        <td>{{ skill.parsent }}%</td>
                        <td>{{ skill.created_at|time }}</td>
                      <td>
                        <router-link :to="`/skilledit/${skill.slug}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" @click="removeskill(skill.slug)"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
  name:'skillList',
 
  computed: {
    skills(){
      return this.$store.getters.skill;
    }
  },
  mounted() {
    this.$store.dispatch('skillInfo');
  },
  methods: {
    removeskill:function(slug){
      this.confirm(()=>{
        axios.get('/skill/remove/'+slug).then((response)=>{
                    this.$store.dispatch('skillInfo');
                    this.$message({
                      message: 'skill delete success',
                      type: 'success'
                    });
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
          });
      });
      
     

    }
  },
}
</script>