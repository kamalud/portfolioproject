<template>
    <div class="ContactList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                <h3 class="card-title">Contact Table</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Date</th>
                      <th>Comment</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(contact,i) in contacts" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ contact.first_name }}</td>
                        <td>{{ contact.last_name }}</td>
                        <td>{{ contact.email }}</td>
                        <td>{{ contact.phone }}</td>
                        <td>{{ contact.created_at|time }}</td>
                        <td>{{ contact.comment }}</td>
                      <td>
                        <a style="cursor:pointer" class="badge bg-danger" @click="removeContact(contact.slug)"><i class="fa fa-trash"></i></a>
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
  name:'Contact',
 
  computed: {
    contacts(){
      return this.$store.getters.contactdata;
    }
  },
  mounted() {
    this.$store.dispatch('contactInfo');
  },
  methods: {
    removeContact:function(slug){
      this.confirm(()=>{
        axios.get('/contact/remove/'+slug).then((response)=>{
        this.$store.dispatch('contactInfo');
        this.$message({
          message: 'Contact delete success',
          type: 'success'
        });
      });
      });
    }
  },
}
</script>