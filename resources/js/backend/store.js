import Vue from "vue";
import Vuex from 'vuex';
Vue.use(Vuex)



const store = new Vuex.Store({
    state:{
        // bookList:['Book 1','Book 2','Book 3','Book 4']
        Users:{},
        // userPermission:{},
        userRoles:{},
        settingsss:{},

    },// as like data(){return:{}}
    mutations:{
        // ADD_BOOK(state,data){
        //     state.bookList.push(data)
        // },
        // //method 2 direct call
        // REMOVE_BOOK(state,index){
        //     state.bookList.splice(index,1)

        // }


        setUpdateUser(state,data){
            state.Users = data
        },


        // setUserPermission(state,data){
        //     state.userPermission = data
        // },
        setUpdateSetting(state,data){
            state.settingsss = data
        },

        setUserRoles(state,data){
            state.userRoles = data
        }

    },
    getters:{

        getUpdateUser(state){
            return state.Users
        },

        // getUserPermission(state){
        //     return state.userPermission
        // }


        getUserRoles(state){
            return state.userRoles
        },
        getUpdateSetting(state){
            return state.settingsss
        },

        // totalBook(state){
        //     return state.bookList.length;
        // }

    },// as like computed:{}
    actions:{


        //method 1
        // addBook(content,data){
        //     content.commit('ADD_BOOK',data)
        // }
         //method 2
        // addBook({commit},data){
        //     commit('ADD_BOOK',data)
        // },
        //  removeBook({commit},data){
        //     commit('REMOVE_BOOK',data)
        // }

        //  getUser({commit},data){
        //     commit('GET_USERS',data)
        // }




    },// as like methods:{}

});



export default store;
