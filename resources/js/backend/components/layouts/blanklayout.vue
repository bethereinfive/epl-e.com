<template>
    <div>
    <!-- <section id="call">
      <img :src="$asseturl+'frontend/img/phone.png'" alt="phone" />
    </section> -->

        <slot></slot>

<section style="padding: 40px;"></section>
        <section id="menus">
            <div class="container-fluid">
                <div class="row" style="    align-items: center;">
                    <div class="col-3 p-0" style="width: 20% !important;">
                        <div class="menu">
                            <router-link :to="{name:'Authuser'}">
                                <img :src="$asseturl+'frontend/img/home.png'" alt="Home">
                                <img :src="$asseturl+'frontend/img/HomeA.png'" alt="Home" class="activeimg">
                                <p>Home</p>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-3 p-0" style="width: 20% !important;">
                        <div class="menu">
                            <router-link :to="{name:'UserTeam'}">
                                <img :src="$asseturl+'frontend/img/team.png'" alt="Home">
                                <img :src="$asseturl+'frontend/img/TeamA.png'" alt="Home" class="activeimg">
                                <p>Team</p>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-3 p-0" style="width: 20% !important;">
                        <div class="menu">
                            <router-link :to="{name:'Usertask'}">
                                <img :src="$asseturl+'frontend/img/Task.png'" style="height: 60px !important;" alt="Home">
                                <img :src="$asseturl+'frontend/img/TaskA.png'" alt="Home" class="activeimg">
                                <p>Tasks</p>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-3 p-0" style="width: 20% !important;">
                        <div class="menu">
                            <a :href="$asseturl+'_EPL_17241802.apk'">
                                <img :src="$asseturl+'frontend/img/android.png'" alt="Home">
                                <img :src="$asseturl+'frontend/img/TaskA.png'" alt="Home" class="activeimg">
                                <p>App</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-3 p-0" style="width: 20% !important;">
                        <div class="menu">
                            <router-link :to="{name:'Useraccount'}">
                                <img :src="$asseturl+'frontend/img/profile.png'" alt="Home">
                                <img :src="$asseturl+'frontend/img/AccountA.png'" alt="Home" class="activeimg">
                                <p>Account</p>
                            </router-link>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </div>
</template>
<script>
  export default {
    created() {
                this.createlink('frontend/css/bootstrap.min.css');
        this.createlink('frontend/css/style.css');
        this.createlink('frontend/css/font-awesome.min.css');

        this.createscript('frontend/js/bootstrap.bundle.min.js');
        this.createscript('frontend/js/bootstrap.min.js');
    },
    data(){
        return {
            isActive:false
        }},
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                window.scrollTo(0,0);
            },
            deep: true
        }
    },
    mounted() {
this.getData();

    },
    methods: {

        async getData() {
            this.isActive = true

        var resN = await this.callApi('get',`/api/admin/setting`,[])
        var id = localStorage.getItem('userid');
        // var res = await this.callApi('get', `/api/admin/user/${id}`, []);


        this.$store.commit('setUpdateSetting', resN.data)
        // this.$store.commit('setFrontUpdateUser', res.data)
        this.isActive = false

        },


        createlink(url=''){
            let recaptchaScript = document.createElement('link')
            recaptchaScript.setAttribute('href', this.$asseturl+url)
            recaptchaScript.setAttribute('rel', 'stylesheet')
            document.head.appendChild(recaptchaScript)
        },
        createscript(url=''){
            let recaptchaScript = document.createElement('script')
            recaptchaScript.setAttribute('src', this.$asseturl+url)
            document.body.appendChild(recaptchaScript)
        }
    }
  }
</script>
<style>
.col-6.amount_item span {
  border: 2px solid #e8ba31;
  display: block;
  text-align: center;
  margin: 6px 0px;
  padding: 4px 3px;
  cursor: pointer;
}
</style>
