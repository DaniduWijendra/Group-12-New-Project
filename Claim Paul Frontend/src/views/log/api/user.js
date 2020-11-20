import Api from "./api"
//import Csrf from "./csrf"
export default{

     register(form){
        //await Csrf.getCookie();

        return Api().post('/register',form);
    },

    login(form){
        //await Csrf.getCookie();
        
        return Api().post('/login',form);
    },

    logout() {
        //await Csrf.getCookie();
    
        return Api().post("/logout");
      },

      auth() {
        return Api().get("/user");
      }
    
};
