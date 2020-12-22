import axios from "axios";

export default axios.create({
  baseURL:"http://hms.ruh.ac.lk/api"
  //baseURL: "http://localhost:8000/api"
})

