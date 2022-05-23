import HOME from '../components/backend/page/home'
// User List===================================================
import UserList from '../components/backend/user/list'
import UserAdd from '../components/backend/user/add'
import UserEdit from '../components/backend/user/edit'
// User List===================================================
import ProfileList from '../components/backend/profile/list'
import ProfileEdit from '../components/backend/profile/edit'
import PasswordList from '../components/backend/profile/password'
// Biodata List===================================================
import About from '../components/backend/about/list'
import AboutAdd from '../components/backend/about/add'
import AboutEdit from '../components/backend/about/edit'
// User List===================================================


// Biodata List===================================================
import BioData from '../components/backend/biodata/list'
import BioDataAdd from '../components/backend/biodata/add'
import BioDataEdit from '../components/backend/biodata/edit'
// Education List===================================================


import Education from '../components/backend/education/list'
import EductionAdd from '../components/backend/education/add'
import EductionEdit from '../components/backend/education/edit'
// Socail List===================================================

import Socail from '../components/backend/social/list'
import SocailAdd from '../components/backend/social/add'
import SocailEdit from '../components/backend/social/edit'

// Socail List===================================================

import Portfolio from '../components/backend/portfolio/list'
import PortfolioAdd from '../components/backend/portfolio/add'
import PortfolioEdit from '../components/backend/portfolio/edit'
// Skill List===================================================


import skill from '../components/backend/skill/list'
import skillAdd from '../components/backend/skill/add'
import skillEdit from '../components/backend/skill/edit'
// setting List===================================================


import setting from '../components/backend/setting/list'
import settingAdd from '../components/backend/setting/add'
import settingEdit from '../components/backend/setting/edit'

// Category List===================================================
import category from '../components/backend/category/list'
import categoryAdd from '../components/backend/category/add'
import categoryEdit from '../components/backend/category/edit'

// Contact List===================================================

import ContactList from '../components/backend/contact/contact'



export const routes = [
    {path:'/home',component:HOME,name:'home'},
    {path:'/user',component:UserList,name:'user'},
    {path:'/add',component:UserAdd,name:'add'},
    {path:'/edit/:id',component:UserEdit,name:'edit'},
    // profile List===================================================
    {path:'/profile',component:ProfileList,name:'profile'},
    {path:'/profileedit',component:ProfileEdit,name:'profileedit'},
    {path:'/passwordchange',component:PasswordList,name:'password'},

    // biodata List===================================================

    {path:'/biodata',component:BioData,name:'biodata'},
    {path:'/biodataadd',component:BioDataAdd,name:'biodataadd'},
    {path:'/biodataedit/:slug',component:BioDataEdit,name:'biodataedit'},


    
    // about List===================================================

    {path:'/about',component:About,name:'about'},
    {path:'/aboutadd',component:AboutAdd,name:'aboutadd'},
    {path:'/aboutedit/:slug',component:AboutEdit,name:'aboutedit'},


    // Education List===================================================

    {path:'/education',component:Education,name:'eduction'},
    {path:'/eductionadd',component:EductionAdd,name:'eductionadd'},
    {path:'/educationedit/:slug',component:EductionEdit,name:'eductionedit'},
    // Socail List===================================================
    {path:'/social',component:Socail,name:'social'},
    {path:'/socialadd',component:SocailAdd,name:'socialadd'},
    {path:'/socialedit/:slug',component:SocailEdit,name:'socialedit'},
  // Socail List===================================================


  {path:'/portfolio',component:Portfolio,name:'portfolio'},
  {path:'/portfolioadd',component:PortfolioAdd,name:'portfolioadd'},
  {path:'/portfolioedit/:slug',component:PortfolioEdit,name:'portfolioedit'},

  // Skill List==================================================


  {path:'/skill',component:skill,name:'skill'},
  {path:'/skilladd',component:skillAdd,name:'skilladd'},
  {path:'/skilledit/:slug',component:skillEdit,name:'skilledit'},

  // setting List==================================================

  
  {path:'/setting',component:setting,name:'setting'},
  {path:'/settingadd',component:settingAdd,name:'settingadd'},
  {path:'/settingedit/:slug',component:settingEdit,name:'settingedit'},

  // Category List==================================================

  {path:'/category',component:category,name:'category'},
  {path:'/categoryadd',component:categoryAdd,name:'categoryadd'},
  {path:'/categoryedit/:slug',component:categoryEdit,name:'categoryedit'},

  // Contact List==================================================

    {path:'/contact',component:ContactList,name:'contact'},

  ]