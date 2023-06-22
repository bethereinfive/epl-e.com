<template>
    <div>


        <header class="header-text" style="background-color: var(--defaltColor);margin-bottom: -16px;">
        <p class="py-2 text-white">Recharge </p>
    </header>
    <form @submit.stop.prevent="onSubmit" class="mt-5">
    <!-- <main class="mx-3">
        <div class="bg-white lh-1 mt-4 py-3 topp w-100 shadow">
            <p class="ms-2">Current Balance</p>
            <p class="fs-1 fw-bold py-1 text-center">৳{{ parseFloat(row.user.balance).toFixed(2) }}</p>
        </div>
        <div class="bg-white lh-1 mt-3 w-100 shadow">
          <input type="text" v-model="form.amount" class="border-danger py-3 w-100">
        </div>


    </main> -->
<section class="fw-bold mt-3 mx-3">
    <div class="grid-container">
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 400 }" @click="form.amount = 400">৳400</p>
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 500 }" @click="form.amount = 500">৳500</p>
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 1100 }" @click="form.amount = 1100">৳1100</p>
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 2600 }" @click="form.amount = 2600">৳2600</p>
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 6000 }" @click="form.amount = 6000">৳6000</p>
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 10000 }" @click="form.amount = 10000">৳10000</p>
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 16000 }" @click="form.amount = 16000">৳16000</p>
        <p class="bg-white py-3 shadow text-center w-100" :class="{ 'active':form.amount == 25000 }" @click="form.amount = 25000">৳25000</p>


      </div>

    <div class="bg-white border border-2 border-danger  mt-3 py-3 shadow w-100" @click="PymamentSelect('onepay')">
        <div class="d-flex gap-2 ms-2 w-50">
            <img :src="$asseturl+'Recharge/onepay.png'" alt="" style="width: 25px;"> <p>OnePay</p> <img v-if="paymentType=='onepay'" src="https://static.vecteezy.com/system/resources/previews/010/141/449/original/check-mark-icon-sign-symbol-design-free-png.png" alt="" style="width: 25px;">
        </div>
    </div>

    <div class="bg-white border border-2 border-danger  mt-3 py-3 shadow w-100" @click="PymamentSelect('USDT')">
        <div class="d-flex gap-2 ms-2 w-50">
            <img :src="$asseturl+'Recharge/currency_usdttrc20.png'" alt="" style="width: 25px;"> <p>USDT</p> <img  v-if="paymentType=='USDT'" src="https://static.vecteezy.com/system/resources/previews/010/141/449/original/check-mark-icon-sign-symbol-design-free-png.png" alt="" style="width: 25px;">
        </div>
    </div>


    <button class="btn btn-primary mt-3" type="submit">Recharge Now</button>
</section>
</form>







    </div>
</template>

<script>
export default {
    data() {
        return {
               popup:false,
            form: {
                amount: '',
            },


            payMethods: '',
            paymentType: 'onepay',

            amount: 0,
            step: 1,
            copyMessage:'',
            rates:'',
            con:false,
        }
    },
    methods: {

        PymamentSelect(type){
            this.paymentType = type
        },

         randomLetter(length) {
                let result = 'S'+this.dateformatglobal()[10]+this.dateformatglobal()[11]+this.dateformatglobal()[12]+Math.floor(Math.random() * (999999999999 - 11111111111));
                return result;
            },
        async onSubmit() {

            if (this.settings.min_deposit > Number(this.form.amount)) {
                this.notifiyGlobal(`Minimum deposit amount ${this.settings.min_deposit}`);
            } else {
                this.form['orderid'] = this.randomLetter(20);
                localStorage.setItem('rechargeData',JSON.stringify(this.form))
                var regTimer = new Date(new Date().getTime() + 300000);
                localStorage.setItem('regTimer',regTimer);

                if(this.paymentType=='onepay'){
                    this.$router.push({ name: 'rechargepage' });

                }else if(this.paymentType=='USDT'){
                    this.$router.push({ name: 'rechargepageUsd' });

                }

            }


        },



    },
    mounted() {


    },
}
</script>
<style scoped>
.mainitem {
    display: flex !important;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
}
.money-style {
    text-align: center;
    width: 31%;
    border-radius: 5px;
    background-color: #eceded;
    color: #000;
    font-size: 15px;
    margin: 7px 1%;
    height: 50px;
    box-sizing: border-box;
    line-height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.active {
    color: #fff;
    background: var(--defaltColor) !important;
}
button.btn.btn-primary {
    background: var(--defaltColor) !important;
    border: var(--defaltColor) !important;
    height: 38px;
    width:100%;
}

.grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 5px;
      }



</style>
