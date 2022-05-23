<template>
    <div class="SocialList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Social Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Social</li>
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
                <h3 class="card-title">Social Table</h3>
                <router-link :to="{name:'socialadd'}" v-if="Socials.length < 1" class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add Social</router-link>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>Facebook</th>
                      <th>Youtube</th>
                      <th>Github</th>
                      <th>linkedin</th>
                      <th>whatsapp</th>
                      <th>Instragram</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(social,i) in Socials " :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ social.name }}</td>
                        <td>{{ social.facebook }}</td>
                        <td>{{ social.youtube }}</td>
                        <td>{{ social.github }}</td>
                        <td>{{ social.linkedin}}</td>
                        <td>{{ social.whatsapp}}</td>
                        <td>{{ social.instragram}}</td>
                      <td>
                        <router-link :to="`/socialedit/${social.slug}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" @click="removeSocial(social.slug)"><i class="fa fa-trash"></i></a>
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
  name:'SocialList',
 
  computed: {
    Socials(){
      return this.$store.getters.Sociallist;
    }
  },
  mounted() {
    this.$store.dispatch('SocialInfo');
  },
  methods: {
    removeSocial:function(slug){
      this.confirm(()=>{
        axios.get('/social/remove/'+slug).then((response)=>{
        this.$store.dispatch('SocialInfo');
        this.$message({
          message: 'Social delete success',
          type: 'success'
        });
      });
      });
    }
  },
}
</script>