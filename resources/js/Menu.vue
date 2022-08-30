<template>
     <div class="page-body-wrapper sidebar-icon">
    <!-- Page Sidebar Start-->
    <header class="main-nav">
      <div class="sidebar-user text-center"><router-link class="setting-primary" to="/setting"><i class="fa-solid fa-gear"></i></router-link><img class="img-90 rounded-circle" src="/images/dashboard/1.png" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">Student</span></div><router-link to="/profil">
          <h6 class="mt-3 f-14 f-w-600">
             {{user.name}}
        </h6></router-link>
        <ul>
            <li><span><span class="counter"> {{lengthFolder}}</span></span>
              <p>Složek</p>
            </li>
          <li><span> <span class="counter"> {{lengthPackage}}</span></span>
            <p>Balíčků</p>
          </li>
          <li><span><span class="counter"> {{lengthQuestion}}</span></span>
            <p>Otázek</p>
          </li>
        </ul>
      </div>
      <nav>
        <div class="main-navbar">
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
          <div id="mainnav">
            <ul class="nav-menu custom-scrollbar">
              <li class="back-btn">
                <div class="mobile-back text-end"><span>Zpátky</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
              </li>
              <li class="dropdown"><router-link class="nav-link menu-title" to="/dashboard"><i class="fa-solid fa-chart-line"></i><span>Dashboard</span></router-link> </li>

              <li class="sidebar-main-title">
                <div>
                  <h6>Produktivita</h6>
                </div>
              </li>
              <li class="dropdown"><router-link class="nav-link menu-title" to="/checklist"><i class="fa-solid fa-clipboard-check"></i><span>Checklist</span></router-link> </li>
              <li class="dropdown"><router-link class="nav-link menu-title" to="/scheduled"><i class="fa-solid fa-calendar-days"></i><span>Návyky</span></router-link> </li>
              <li class="sidebar-main-title">
                <div>
                  <h6>Účení</h6>
                </div>
              </li>
              <li class="dropdown"><router-link class="nav-link menu-title" to="/folders"><span><i class="fa-solid fa-folder-open"></i>Učení</span></router-link> </li>
              <li class="dropdown"><router-link class="nav-link menu-title" to="/edit-folders"><span><i class="fa-solid fa-file-pen"></i>Správce balíčků</span></router-link> </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/public"><i class="fa-solid fa-box-open"></i><span>Veřejné balíčky</span></a> </li>

              <li class="sidebar-main-title">
                <div>
                  <h6>Ostatní</h6>
                </div>
              </li>

              <li class="dropdown"><router-link class="nav-link menu-title" to="/navod"><i class="fa-solid fa-book"></i><span>Návod</span></router-link> </li>
              <li class="dropdown"><router-link class="nav-link menu-title" to="/profil"><i class="fa-solid fa-user"></i><span>Profil</span></router-link> </li>
              <li class="dropdown"><router-link class="nav-link menu-title" to="/setting"><i class="fa-solid fa-gear"></i><span>Nastavení</span></router-link> </li>

            </ul>
          </div>
          <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>


      </nav>
    </header>


  </div>
</template>

<script>
    export default {
         data() {
             return {
                 user: '',
                 package: '',
                 folder: '',
                 question: '',
             }
         },

        async mounted() {
           await this.getUser();
         },

         computed:{
             lengthFolder(){
                 return this.folder.length;
             },
             lengthPackage(){
                 return this.package.length;
             },
             lengthQuestion(){
                 return this.question.length;
             }
         },

         methods: {
             getUser() {
                axios.get('/api/users').then(response => {
                    this.user = response.data;
                    this.package = response.data.package;
                    this.folder = response.data.folder;
                    this.question = response.data.question;
                })
                .catch(error => {
                    return this.$router.push('../../404')
                });
             }
         },
    }
</script>

<style lang="scss" scoped>

</style>
