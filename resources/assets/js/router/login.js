import Login from '../layout/Login'
import LoginForm from '../components/login/LoginForm'
export default [{
  path: '/login',
  component: Login,
  children: [{
    path: '',
    component: LoginForm
  }]
}]
