<template>
    <div class="portfolioList">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>portfolio Edit Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">portfolio Edit Form</li>
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
                <h3 class="card-title">portfolio Edit Form</h3>
                <router-link :to="{name:'portfolio'}" class="card-title float-right"><i class="fa fa-list"></i> portfolioList</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form role="form" @submit.prevent="updateuer" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                                <label>portfolio name</label>
                                <input type="text" v-model="form.name" class="form-control" placeholder="Enter your name">
                                <input type="hidden" v-model="form.id">
                                <div class="text-danger" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                                <label>category name</label>
                                 <select class="form-control" v-model="form.category_id">
                                    <option v-for="(data,i) in categorys" :key="i" :value="data.id">{{data.name}}</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.has('category_id')" v-html="form.errors.get('category_id')" />
                          </div>
                      </div>
                      <div class="col-md-4">
                        <label for="Image">Image</label>
                        <input  type="file" @change="loadImage($event)" name="image">
                          <div class="text-danger" v-if="form.errors.has('image')" v-html="form.errors.get('image')" />
                      </div>
                        <div class="col-md-4">
                        <img :src="imageLink(form.image)" alt="">
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-danger float-right">Reset</button>
                </div>
              </form>
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
    name:'portfolioEdit',
     data: () => ({
    form: new Form({
      name: '',
      category_id: '',
      id: '',
      image:'',
    })
  }),
    methods:{
      updateuer(){
        this.form.post('/portfolio/update').then(response=>{
          this.$router.push('/portfolio');
         this.$message({
          message: 'portfolio Update successfully',
          type: 'success'
        });
        })
      },
      getportfolio:function(){
        axios.get('/portfolio/edit/'+this.$route.params.slug).then(response=>{
            this.form.fill(response.data.portfolio);
        })
       },
       imageLink:function(name){
        if(name.length < 256)
        return 'upload/portfolio/' + name;
        else
        return this.form.image;
       },
    },
    computed:{
        categorys(){
         return this.$store.getters.category;
       }
    },
    mounted() {
        this.getportfolio();
    this.$store.dispatch('categoryInfo');
    },
    
    
}
</script>

<style>
  img{
    width:90px;
    height:90px;
  }

</style>
