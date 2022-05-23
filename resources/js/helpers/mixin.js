import Vue from 'vue';

Vue.mixin({
    methods:{
        confirm:function(callbacke){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) callbacke();
              })

        },
        loadImage:function(e){
          let file = e.target.files[0];
          let reader = new FileReader();
          reader.onload = e => {
            this.form.image = e.target.result;
          }
          reader.readAsDataURL(file);
      },
      
      loadImage2:function(e){
          let file = e.target.files[0];
          let reader = new FileReader();
          reader.onload = e => {
            this.form.image2 = e.target.result;
          }
          reader.readAsDataURL(file);
      },
      
      loadImage3:function(e){
        let file = e.target.files[0];
        let reader = new FileReader();
        reader.onload = e => {
          this.form.image3 = e.target.result;
        }
        reader.readAsDataURL(file);
    },
    }
});