import { setAuthorization } from "./general";
import axios from 'axios'
import store from '../store'

export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                setAuthorization(response.data.access_token);

                if(response.data.status==1){
                    res(response.data);    
                }else{
                    rej("Account Locked, Please Contact Your IT Support");    
                }
            })
            .catch((err) =>{

                rej("Wrong Username or Password");
                
            })
    })
}

export function getLocalUser() {
    const userStr = localStorage.getItem("user");

    if(!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}