<template>
    <div class="categoryList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>category Tables</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">category Table</h3>
                <router-link :to="{name:'categoryadd'}" v-if="categorys.length < 3" class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add category</router-link>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(category,i) in categorys" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ category.name }}</td>
                        <td>{{ category.created_at|time }}</td>
                      <td>
                        <router-link :to="`/categoryedit/${category.slug}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" v-if="portfolies.length < 1"   @click="removecategory(category.slug)"><i class="fa fa-trash"></i></a>
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
  name:'categoryList',
 
  computed: {
    categorys(){
      return this.$store.getters.category;
    },
    portfolies(){
        return this.$store.getters.Portfolioget;
    }
  },
  mounted() {
    this.$store.dispatch('categoryInfo');
    this.$store.dispatch('portfolioInfo');
  },
  methods: {
    removecategory:function(slug){
      this.confirm(()=>{
        axios.get('/category/remove/'+slug).then((response)=>{
                    this.$store.dispatch('categoryInfo');
                    this.$message({
                      message: 'category delete success',
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