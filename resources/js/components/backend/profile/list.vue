<template>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 m-auto">

            <!-- Profile Image -->
            <div class="card card-primary card-outline m-3">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       :src="file_link(profiles.image)"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{profiles.name}}</h3>

                <p class="text-muted text-center">{{profiles.address}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{profiles.email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right">{{profiles.mobile}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right">{{profiles.gender}}</a>
                  </li>
                </ul>

                <router-link :to="{name:'profileedit'}" class="btn btn-primary btn-block"><b>Edit profile</b></router-link>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</template>

<script>
export default {
  name:'List',
 
  computed: {
    profiles(){
      return this.$store.getters.profile;
    }
  },
  mounted() {
    this.$store.dispatch('profileInfo');
  },
  methods:{
    file_link:function(image){
      return 'uploads/profile/'+image;
    }
  }
  
}
</script>