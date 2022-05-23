<template>
    <div class="userList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Table</h3>
                <router-link :to="{name:'add'}" class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add user</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>User Roll</th>
                      <th>name</th>
                      <th>email</th>
                      <th>Profile image</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user,i) in users" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ user.usertype }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                        <img style="width:40px;height:40px" :src="imageLink(user.image)" alt="">
                      </td>
                      <td>
                        <router-link :to="`/edit/${user.id}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" @click="removeuser(user.id)"><i class="fa fa-trash"></i></a>
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
  name:'List',
 
  computed: {
    users(){
      return this.$store.getters.user;
    }
  },
  mounted() {
    this.$store.dispatch('UserInfo');
  },
  methods: {
    imageLink:function(name){
      return 'uploads/profile/'+name;
    },
    removeuser:function(id){
      this.confirm(()=>{
        axios.get('/user/remove/'+id).then((response)=>{
        this.$store.dispatch('UserInfo');
        this.$message({
          message: 'User delete success',
          type: 'success'
        });
      });
      });
    }
  },
}
</script>