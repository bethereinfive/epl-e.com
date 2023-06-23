<template>
    <section id="bigbgs">
        <main class="container" style="">
            <!---->
            <div data-v-6daec649="" class="form-container" style="min-height: 0px">
                <form data-v-6daec649="" class="pt-5" @submit.prevent="register">

                    <div class="d-flex" style="flex-direction: column;">
                    <span data-v-6daec649="" class="login100-form-logo">
                        <i data-v-6daec649="" class="zmdi zmdi-landscape"></i>
                        <img data-v-6daec649="" style="border-radius: 50%;" :src="$asseturl + 'frontend/img/logos.png'" width="60px" />
                    </span>
                    <span data-v-6daec649="" class="login100-form-title pt-3 pb-3 text-white">
                        Sign Up
                    </span>
                    </div>
                    <div data-v-6daec649="" data-validate="Enter username" class="wrap-input100 validate-input">
                        <input data-v-6daec649="" type="text" v-model="form.name" placeholder="Name"
                            class="input100" required />
                    </div>
                    <span data-v-6daec649="" class="help-block"></span>
                    <div data-v-6daec649="" data-validate="Phone Number" class="wrap-input100 validate-input">
                        <input data-v-6daec649="" v-model="form.mobile" type="text" name="username"
                            placeholder="Phone Number" class="input100" required />
                    </div>
                    <span data-v-6daec649="" class="help-block"></span>
                    <div data-v-6daec649="" data-validate="Refer Code" class="wrap-input100 validate-input">
                        <input data-v-6daec649="" type="text" name="refer_code" v-model="form.ref_by"
                            placeholder="Refer Code" class="input100" required />
                    </div>
                    <span data-v-6daec649="" class="help-block"></span>
                    <div data-v-6daec649="" data-validate="Enter password" class="wrap-input100 validate-input">
                        <!-- <i data-v-6daec649="" class="fa fa-eye" aria-hidden="true"
                            style="position: absolute; right: 20px; top: 13px"></i> -->
                        <input data-v-6daec649="" type="password" name="pass" v-model="form.password"
                            placeholder="Password" class="input100" required/>
                    </div>
                    <div data-v-6daec649="" data-validate="Enter password" class="wrap-input100 validate-input">
                        <!-- <i data-v-6daec649="" class="fa fa-eye" aria-hidden="true"
                            style="position: absolute; right: 20px; top: 13px"></i> -->
                        <input data-v-6daec649="" type="password" name="pass" v-model="form.password_confirmation"
                            placeholder="Confirm Password" class="input100" required />
                    </div>


<!--
                    <span data-v-6daec649="" class="help-block"></span>
                    <div data-v-6daec649="" class="wrap-input100 validate-input text-center">
                        <p data-v-6daec649="" class="captcha">{{ genaratedCaptcha }}</p>
                    </div>
                    <div data-v-6daec649="" class="wrap-input100 validate-input">
                        <input data-v-6daec649="" type="text" name="captcha" placeholder="Type Captcha"
                            v-model="captcha" class="input100" required />
                    </div> -->



                    <div data-v-6daec649="" class="container-login100-form-btn">
                        <button data-v-6daec649="" type="subimt" class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>
                    <div data-v-6daec649="" class="text-center p-t-90" style="line-height: 35px;">
                        <p data-v-6daec649="" class="text69 text-white">Have You Account?</p>
                        <router-link :to="{ name: '/login' }" data-v-6daec649="" class="text95 text-white" style="color: #fbff58 !important;">
                            Login
                        </router-link>
                    </div>
                </form>
            </div>
        </main>
    </section>
</template>
<script>
export default {
    created() {
        this.genaratedCaptcha = Math.random()
            .toString(36)
            .substring(2, 6 + 2);
        // if (User.loggedIn()) {
        //     this.$router.push({ name: 'home' })
        // }
        // localStorage.setItem('dmdevice',1)
        // console.log(this.$route.query.ref);
        if (this.$route.query.ref) {
            this.form.ref_by = this.$route.query.ref;
            this.refer = 1;
        } else {
            this.form.ref_by = "11111";
            this.refercheck();
        }
        this.form.country = "+880";
        this.countryList();
        this.addcountry();
    },
    data() {
        return {
            btndis: true,
            captcha: "",
            genaratedCaptcha: "",
            mobileCode: null,
            form: {
                country: null,
                name: "",
                username: null,
                mobile: null,
                password: null,
                password_confirmation: null,
                withdrawpass: "123456",
                ref_by: null,
            },
            usernameMatch: 1,
            refer: 0,
            errors: {},
            codes: {},
            showPassword: true,
            CshowPassword: true,
            WshowPassword: true,
        };
    },
    methods: {
        // setLang(){
        //     localStorage.setItem('language',this.$i18n.locale)
        // },

        async usernamecheck() {
            if (this.form.username == "") {
                this.usernameMatch = 0;
            } else {
                var res = await this.callApi(
                    "get",
                    `/api/count/username/check?username=${this.form.username}`,
                    []
                );
                if (res.data == 0) {
                    this.usernameMatch = 2;
                } else {
                    this.usernameMatch = 1;
                }
            }
        },
        async countryList() {
            var res = await this.callApi(
                "get",
                `${this.$asseturl}CountryCodes.json`,
                []
            );
            // console.log(res)
            this.codes = res.data;
        },
        async addcountry() {
            // this.form.mobile = this.form.country
            this.mobileCode = this.form.country;
        },
        async refercheck() {
            if (this.form.ref_by == "") {
                this.refer = 0;
            } else {
                var res = await this.callApi(
                    "get",
                    `/api/count/username/check?username=${this.form.ref_by}`,
                    []
                );
                if (res.data == 0) {
                    this.refer = 2;
                } else {
                    this.refer = 1;
                }
            }
        },
        register() {
            // if(localStorage.getItem('dmdevice')){
            //     Notification.customError(`This device has already have an account!`);
            // }else{
            // if (this.genaratedCaptcha === this.captcha) {
                // if(this.usernameMatch!=2){
                // Notification.customError('please Enter deferent username');
                // }else{
                if (this.refer != 1) {
                    Notification.customError("Opps,Refer code is Invalid");
                } else {
                    if (this.form.password === this.form.password_confirmation) {
                        axios
                            .post("api/auth/register", this.form)
                            .then((res) => {
                                if (res.data == 422) {
                                    Notification.customError("This Phone Number Already Exist");
                                } else if (res.data == 444) {
                                    Notification.customError(
                                        `This device has already have an account!`
                                    );
                                    localStorage.setItem("dmdevice", 1);
                                } else {
                                    // console.log(res)
                                    if (res.status == 201) {
                                        Notification.customSuccess("Registration Success");
                                        localStorage.setItem("dmdevice", 1);
                                        this.$router.push({ name: "/login" });
                                    } else {
                                        Notification.customError(
                                            "Something want wrong. Please Try again or contact with admin"
                                        );
                                    }
                                    // User.responseAfterLogin(res)
                                }
                                // console.log(res.data)
                                // User.responseAfterLogin(res)
                            })
                            .catch((error) => (this.errors = error.response.data.errors));
                    } else {
                        Notification.customError(
                            "Password and Confirm password does not match"
                        );
                    }
                }
                // }
            // } else {
            //     Notification.customError("Captcha does not match!");
            // }
            // }
        },
    },
};
</script>
<style lang="css" scoped>
.languagechange {
    width: 100px;
    float: right;
}

button.button {
    padding: 7px 5px;
}
</style>
