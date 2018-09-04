import { getLocalUser } from "./helpers/auth";

const user = getLocalUser();

export default {
    state: {
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
    },
    getters: {
        isLoading(state) {
            return state.loading;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        currentUser(state) {
            return state.currentUser;
        },
        authError(state) {
            return state.auth_error;
        },
    },
    mutations: {
        login(state) {
            state.loading = true;
            state.auth_error = null;
        },
        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },
        logout(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
        },
    },
    actions: {
        login(context) {
            context.commit("login");
        },
        refreshToken(context) {
            axios.get('/api/auth/refresh')
            .then((response) => {
                context.commit('loginSuccess', response.data);
            })
        },
        inspectToken(){
            const token = this.getters.currentUser.token
            if(token){
                const decoded = jwt_decode(token);
                const exp = decoded.exp
                const orig_iat = decode.orig_iat
                if(exp - (Date.now()/1000) < 1800 && (Date.now()/1000) - orig_iat < 628200){
                    this.dispatch('refreshToken')
                } else if (exp -(Date.now()/1000) < 1800){
                    // DO NOTHING, DO NOT REFRESH
                } else {
                    // PROMPT USER TO RE-LOGIN, THIS ELSE CLAUSE COVERS THE CONDITION WHERE A TOKEN IS EXPIRED AS WELL
                    console.log('Login again')
                }
            }
        }
    }
};