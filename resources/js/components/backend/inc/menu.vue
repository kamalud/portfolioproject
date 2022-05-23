<template>
    <div>
        <div class="menu">
            <div class="menu">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link :to="{name:'home'}" class="brand-link">
      <img :src="file_link (settings.image)" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dasboard</span>

    </router-link>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img :src="file_link(users.image)" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <router-link :to="{name:'profile'}" class="d-block">{{users.name}}</router-link>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" v-if="users.usertype == 'Admin'">
                <router-link :to="{name:'user'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{name:'profile'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>profile List</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{name:'password'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>password change</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'category'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>category List</p>
                </router-link>
              </li>
            </ul>
          </li>

         <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'category'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>category List</p>
                </router-link>
              </li>
            </ul>
          </li>

          
          <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                portfolio List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'portfolio'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>portfolio</p>
                </router-link>
              </li>
            </ul>
          </li>
         <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                portfolio List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'portfolio'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>portfolio</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Biodata 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'biodata'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>biodata List</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Biodata 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'biodata'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>biodata List</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                About
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'about'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </router-link>
              </li>
            </ul>
          </li>
          
          <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                About
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'about'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Eduction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'eduction'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Education</p>
                </router-link>
              </li>
            </ul>
          </li>
          
          <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Eduction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'eduction'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Education</p>
                </router-link>
              </li>
            </ul>
          </li>
          
          <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Social
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'social'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>social icon</p>
                </router-link>
              </li>
            </ul>
          </li>
          
          <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Social
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'social'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>social icon</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Skill List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'skill'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Skill</p>
                </router-link>
              </li>
            </ul>
          </li>
            <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Skill List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'skill'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Skill</p>
                </router-link>
              </li>
            </ul>
          </li>

           <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Setting List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'setting'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>setting</p>
                </router-link>
              </li>
            </ul>
          </li>

          
           <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Setting List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'setting'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>setting</p>
                </router-link>
              </li>
            </ul>
          </li>

           <li class="nav-item" v-if="users.usertype == 'Admin'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Customer List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'contact'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>contact</p>
                </router-link>
              </li>
            </ul>
          </li>
          
           <li class="nav-item" v-if="users.usertype == 'user'">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Customer List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name:'contact'}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>contact</p>
                </router-link>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PortfolioMenu',
   computed: {
    users(){
      return this.$store.getters.authuser;
    },
    settings(){
      return this.$store.getters.setting;
    }
  },
  mounted() {
    this.$store.dispatch('AuthUserInfo');
    this.$store.dispatch('settingInfo');
  },

    methods: {
    file_link:function(image){
      return 'uploads/profile/'+image;
    },
    image_links:function(image){
      return 'uploads/setting/'+image;
    }
    },
};
</script>

<style lang="scss" scoped>

</style>