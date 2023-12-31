import { mapGetters } from 'vuex'
export default {
    mounted() {
        // this.settingFun();
    },
    data(){
        return {
            settings:{}
        }
    },
    methods: {

        notifiyGlobal(mess){
            this.Messageactive = true
            this.Message = mess;
            setTimeout(() => {
                this.Messageactive = false
            }, 1000);
        },
        async callApi(method, url, dataObj ){
            try {
              return await axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            } catch (e) {
                return e.response
            }
        },
         callApi2(method, url, dataObj ){
            try {
              return axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            } catch (e) {
                return e.response
            }
        },
        dateformatglobal(date=''){
            return  User.dateformat(date);
         },
        async settingFun(){



                var res = await this.callApi('get',`/api/admin/setting/1`,[]);
                this.settings = res.data;
        },

        dateformatglobal(date=''){
           return  User.dateformat(date);
        }
        // checkUserPermission(key){
        //     if(!this.userPermission) return true
        //     let isPermitted = false;
        //     for(let d of this.userPermission){
        //         if(this.$route.name==d.name){
        //             if(d[key]){
        //                 isPermitted = true
        //                 break;
        //             }else{
        //                 break
        //             }
        //         }

        //     }
        //     return isPermitted
        //     // return this.$route.name;
        // }

    },
    computed: {

        // Users(){
        //     return this.$store.getters.setUpdateUser;
        // }

        ...mapGetters({
            'Users' : 'getUpdateUser',
            // 'userPermission' : 'getUserPermission',
            'getUserRoles' : 'getUserRoles',
            'settingss' : 'getUpdateSetting',
        }),

        // isReadPermitted(){
        //     return this.checkUserPermission('read')
        //  },
        //  isWritePermitted(){
        //      return this.checkUserPermission('write')
        //  },
        //  isUpdatePermitted(){
        //      return this.checkUserPermission('update')
        //  },
        //  isDeletePermitted(){
        //      return this.checkUserPermission('delete')
        //  },

    },




}
