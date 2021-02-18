// import axios from "axios";

// let Api = axios.create({
//   baseURL: "http://localhost:8000/api"
// });

// Api.defaults.withCredentials = true;
// export default Api;

import axios from "axios";

let BaseApi = axios.create({
 //baseURL: "http://hms.ruh.ac.lk/api"
 baseURL: "http://localhost:8000/api"
});

let Api = function() {
  let token = localStorage.getItem("token");

  if (token) {
    BaseApi.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  }

  return BaseApi;
};

export default Api;
