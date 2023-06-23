<template>


    <section id="bigbgs">

<main class="container" style="">
                        <!---->
                        <div data-v-c1501c16="">
                            <div data-v-c1501c16="" class="form-container" style="padding-bottom: 0;">
                                <form data-v-c1501c16="" style="padding-top: 6rem;text-align: center;" @submit.prevent='login'>


                                    <div class="d-flex" style="flex-direction: column;">


                                        <span data-v-c1501c16="" class="login100-form-logo"><img style="border-radius: 50%;" :src="$asseturl+'frontend/img/logos.png'" width="60px" /></span>
                                        <span data-v-c1501c16="" class="login100-form-title pt-3 pb-3 text-white"> Log in </span>

                                    </div>

                                    <div data-v-c1501c16="">
                                        <div data-v-c1501c16="" data-validate="Enter username" class="wrap-input100 validate-input"><input data-v-c1501c16="" type="text" name="username" v-model="form.mobile" placeholder="Mobile Number" class="input100" /></div>
                                        <div data-v-c1501c16="" data-validate="Enter password" class="wrap-input100 validate-input">
                                            <!-- <i data-v-c1501c16="" class="fa fa-eye" aria-hidden="true" style="position: absolute; right: 20px; top: 13px;"></i> -->
                                            <input data-v-c1501c16="" type="password" name="pass" v-model="form.password" placeholder="Password" class="input100" />
                                        </div>
                                    </div>
                                    <div data-v-c1501c16="" class="container-login100-form-btn pt-5">
                                        <button data-v-c1501c16="" type="submit" class="login100-form-btn">
                                            <span  v-if="loadLogin">Loading....</span>
                                            <span  v-else>Login</span>
                                        </button>
                                    </div>
                                    <div data-v-c1501c16="" class="text-center p-t-90" style="line-height: 35px;">
                                        <p data-v-c1501c16="" class="text69 text-white">No Account?</p>
                                        <router-link :to="{name:'register'}" data-v-c1501c16=""  class="text95 text-white" style="color: #fbff58 !important;">
                                            Register
                                        </router-link>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </main>













    </section>




</template>

<script>
export default {

    created() {

        this.addcountry();
        this.countryList();
    },

    data() {
        return {



            emailLogin: "",
            passwordLogin: "",
            emailReg: "",
            passwordReg: "",
            confirmReg: "",
            emptyFields: false,
            form: {
                mobile: '',
                password: ''
            },
            country: '+880',
            mobileCode: '',
            errors: {},
            codes: {},
            loadLogin: false
        }
    },
    methods: {


        async countryList() {
            var res = await this.callApi('get', `${this.$asseturl}CountryCodes.json`, []);
            // console.log(res)
            this.codes = res.data
        },
        async addcountry() {
            this.mobileCode = this.country
        },

        login() {
            this.loadLogin = true

            if (this.form.mobile == "" || this.form.password == "") {
                this.emptyFields = true;
            } else {

                axios.post('/login', this.form)
                    .then(res => {


                        if (res.data == 0) {
                            Notification.customError('Please Enter Valid Phone Number and Password');
                            this.loadLogin = false
                        } else if (res.data == 422) {
                            Notification.customError('Your Account Has Been Banded!');
                            this.loadLogin = false
                        } else if (res.data == 444) {
                            Notification.customError('You Cant Login Multiple account same device!');
                            this.loadLogin = false
                            localStorage.setItem('dmdevice', 1)
                        } else {




                            localStorage.setItem('dmdevice', 1)
                            User.responseAfterLogin(res)
                            if (res.data.role == 'admin') {
                                window.location.href = '/dashboard/adddmin'
                            } else {
                                window.location.href = '/dashboard/user'
                            }

                            Notification.customSuccess('Signed in successfully Complete');

                            // this.$router.push({name: 'home'})
                            // window.location.href = '/dashboard'

                        }
                    })
                    .catch(error => this.errors = error.response.data.errors)



            }





        },


        blur(id) {
            const child = document.getElementById(id);
            if (this.form[id] == '') {
                child.parentNode.classList.remove("blursuccess");
                child.parentNode.classList.add("blurerror");
            } else {
                child.parentNode.classList.remove("blurerror");
                child.parentNode.classList.add("blursuccess");
            }

        },




    }
}
</script>

<style lang="css" scoped>
.languagechange {
    width: 100px;
    float: right;
}

section.vh-100 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
}

.blurerror input {
    border: 1px solid red !important;
}

.blurerror label {
    color: red !important;
}

.blursuccess input {
    border: 1px solid green !important;
}

.blursuccess label {
    color: green !important;
}

.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}

*,
*:focus {
    outline: none
}

/* .form{
  width: 500px;
  margin: 0 auto;
  margin-top: 150px;
  font-family: sans-serif;
  background: #fff
} */
.form-item {
    position: relative;
    margin-bottom: 15px
}

.form-item input {
    display: block;
    width: 100%;
    height: 40px;
    background: transparent;
    border: solid 1px #ccc;
    transition: all .3s ease;
    padding: 0 15px
}

.form-item input:focus {
    border-color: blue
}

.form-item label {
    position: absolute;
    cursor: text;
    z-index: 2;
    top: 13px;
    left: 10px;
    font-size: 12px;
    font-weight: bold;
    background: #fff;
    padding: 0 10px;
    color: #999;
    transition: all .3s ease
}

.form-item input:focus+label,
.form-item input:valid+label {
    font-size: 11px;
    top: -5px
}

.form-item input:focus+label {
    color: blue
}
</style>

