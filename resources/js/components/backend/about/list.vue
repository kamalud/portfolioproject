<template>
    <div class="aboutList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>about Tables</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">about Table</h3>
                <router-link :to="{name:'aboutadd'}" v-if="abouts.length < 3" class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add about</router-link>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Experince date</th>
                      <th>Description</th>
                      <th>Time</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(about,i) in abouts" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ about.name }}</td>
                        <td>{{ about.title }}</td>
                        <td>{{ about.date }}</td>
                        <td>{{ about.description }}</td>
                        <td>{{ about.created_at|time }}</td>
                      <td>
                        <router-link :to="`/aboutedit/${about.slug}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" @click="removeabout(about.slug)"><i class="fa fa-trash"></i></a>
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
  name:'aboutList',
 
  computed: {
    abouts(){
      return this.$store.getters.about;
    }
  },
  mounted() {
    this.$store.dispatch('aboutInfo');
  },
  methods: {
    removeabout:function(slug){
      this.confirm(()=>{
        axios.get('/about/remove/'+slug).then((response)=>{
                    this.$store.dispatch('aboutInfo');
                    this.$message({
                      message: 'about delete success',
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