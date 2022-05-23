<template>
    <div class="portfolioList">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>portfolio Add Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">portfolio Add Form</li>
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
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">portfolio Add Form</h3>
                <router-link :to="{name:'portfolio'}" class="card-title float-right"><i class="fa fa-list"></i> portfolioList</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form role="form" @submit.prevent="saveportfolio" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                                <label>portfolio name</label>
                                <input type="text" v-model="form.name" class="form-control" placeholder="Enter your name">
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
                        <input  type="file" @change="loadImage($event)" id="image" name="image">
                          <div class="text-danger" v-if="form.errors.has('image')" v-html="form.errors.get('image')" />
                      </div>
                        <div class="col-md-4">
                        <img :src="form.image" alt="">
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
    name:'portfolioAdd',
     data: () => ({
    form: new Form({
      name: '', 
      category_id:'',
      image:'',
    })
  }),
    methods:{
      saveportfolio(){
        this.form.post('/portfolio/save').then(response=>{
           this.form.name="";
           this.form.category_id="";
           this.form.image="";
         this.$message({
          message: 'portfolio save successfully',
          type: 'success'
        });
        })
      },
    },
    
  computed: {
    categorys(){
      return this.$store.getters.category;
    }
  },
  mounted() {
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
