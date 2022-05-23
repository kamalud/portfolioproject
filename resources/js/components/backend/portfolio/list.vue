<template>
    <div class="portfolioList">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> portfolio Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link :to="{name:'adminhome'}">Home</router-link></li>
              <li class="breadcrumb-item active"> portfolio Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"> portfolio Table</h3>
                <router-link :to="{name:'portfolioadd'}" class="card-title float-right"><i class="fa fa-plus-circle"></i> Add portfolio</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th> portfolio name</th>
                      <th> category name</th>
                      <th>Image</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(portfolio,i) in portfolies" :key="i">
                      <td>{{ i+1 }}</td>
                      <td>{{ portfolio.name }}</td>
                      <td>{{ portfolio.category.name }}</td>
                      <td>
                        <img style="width:40px;height:40px" :src="imageLink(portfolio.image)" alt="">
                      </td>
                      <td>{{ portfolio.created_at|time }}</td>
                      <td>
                        <router-link :to="`/portfolioedit/${portfolio.slug}`" class="btn btn-primary"><i class="fa fa-edit"></i></router-link>
                          <a @click="remove(portfolio.slug)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
</template>

<script>
export default {
    name:'portfolioAdd',
    computed:{
        portfolies(){
            return this.$store.getters.Portfolioget;
        }
    },
    mounted() {
      this.$store.dispatch('portfolioInfo');
    },
    methods:{
      imageLink:function(name){
      return 'uploads/portfolio/' + name;
    },
    remove:function (slug){
       this.confirm(()=>{
        axios.get('portfolio/remove/'+slug).then(response=>{
        this.$store.dispatch('portfolioInfo');
        this.$message({
            message: 'portfolio info remove success',
            type: 'info'
          });
       })
     })
    }

    }
}
</script>
