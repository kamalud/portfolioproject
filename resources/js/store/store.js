import axios from "axios";

export default {
  state:{
      userData:[],
      profileData:[],
      BioData:[],
      AboutData:[],
      AuthuserData:[],
      ContactData:[],
      EducationData:[],
      SocialData:[],
      PortfolioData:[],
      skillData:[],
      settingData:[],
      categoryData:[],
  },
  getters:{
      user:function(state){
         return state.userData;
      },
      profile:function(state){
        return state.profileData;
     },
      biodata:function(state){
        return state.BioData;
      },
      about:function(state){
      return state.AboutData;
     },

     authuser:function(state){
      return state.AuthuserData;
     },

     education:function(state){
      return state.EducationData;
     },

     Sociallist:function(state){
      return state.SocialData;
     },

     Portfolioget:function(state){
      return state.PortfolioData;
     },

     skill:function(state){
      return state.skillData;
     },
     setting:function(state){
      return state.settingData;
     },

     category:function(state){
      return state.categoryData;
     },

     contactdata:function(state){
      return state.ContactData;
     },
  },
  actions:{

    UserInfo:function(data){
        axios.get('/user/show').then((response)=>{
          data.commit('userList',response.data.users);
        });
    },
    profileInfo:function(data){
      axios.get('/profile/show').then((response)=>{
        data.commit('profileList',response.data.profile);
      });
     },

    biodataInfo:function(data){
      axios.get('/biodata/show').then((response)=>{
        data.commit('bioinfo',response.data.biodatas);
      });
    },

    aboutInfo:function(data){
      axios.get('/about/show').then((response)=>{
        data.commit('aboutinfo',response.data.abouts);
      });
     },

     AuthUserInfo:function(data){
      axios.get('/user/userList').then((response)=>{
        data.commit('AuthuserList',response.data.users);
      });
      },
      educationInfo:function(data){
        axios.get('/education/show').then((response)=>{
          data.commit('EducationList',response.data.education);
        });
        },

        SocialInfo:function(data){
          axios.get('/social/show').then((response)=>{
            data.commit('SocialList',response.data.social);
          });
          },

          portfolioInfo:function(data){
            axios.get('/portfolio/show').then((response)=>{
              data.commit('PortfolioList',response.data.portfolio);
            });
          },

          skillInfo:function(data){
            axios.get('/skill/show').then((response)=>{
              data.commit('skillList',response.data.skill);
            });
          },
          
          settingInfo:function(data){
            axios.get('/setting/show').then((response)=>{
              data.commit('settingList',response.data.setting);
            });
          },
        

       categoryInfo:function(data){
        axios.get('/category/show').then((response)=>{
          data.commit('categoryList',response.data.category);
        });
      },

      contactInfo:function(data){
        axios.get('/contact/show').then((response)=>{
          data.commit('contactioinfo',response.data.contact);
        });
      },

    },
  mutations:{
    userList:function(state,data){
      state.userData = data
    },
    profileList:function(state,data){
      state.profileData = data
    },

    bioinfo:function(state,data){
      state.BioData = data
    },

    aboutinfo:function(state,data){
      state.AboutData = data
    },

    AuthuserList:function(state,data){
      state.AuthuserData = data
    },

    EducationList:function(state,data){
      state.EducationData = data
    },
    
    SocialList:function(state,data){
      state.SocialData = data
    },

    PortfolioList:function(state,data){
      state.PortfolioData = data
    },

    skillList:function(state,data){
      state.skillData = data
    },
    
    settingList:function(state,data){
      state.settingData = data
    },
    
    categoryList:function(state,data){
      state.categoryData = data
    },
    

    contactioinfo:function(state,data){
      state.ContactData = data
    },

  }

}