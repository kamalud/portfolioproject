<template>
    <div class="settingList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
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
                <h3 class="card-title">Setting Table</h3>
                <router-link :to="{name:'settingadd'}" v-if="settings.lenght < 1" class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add setting</router-link>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>Backend logo</th>
                      <th>Time</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(setting,i) in settings" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ setting.name }}</td>
                        <td><img style="width:40px;height: 40px" :src="file_link(setting.image)" /></td>
                        <td>{{ setting.created_at|time }}</td>
                      <td>
                        <router-link :to="`/settingedit/${setting.slug}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" @click="removesetting(setting.slug)"><i class="fa fa-trash"></i></a>
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
  name:'settingList',
 
  computed: {
    settings(){
      return this.$store.getters.setting;
    }
  },
  mounted() {
    this.$store.dispatch('settingInfo');
  },
  methods: {
    removesetting:function(slug){
      this.confirm(()=>{
        axios.get('/setting/remove/'+slug).then((response)=>{
                    this.$store.dispatch('settingInfo');
                    this.$message({
                      message: 'setting delete success',
                      type: 'success'
                    });
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
          });
       });
    },
    
      file_link:function(image){
        return 'uploads/setting/'+image;
       }
  },
}
</script>