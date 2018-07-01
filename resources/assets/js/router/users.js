import Layout from '../layout/Layout1'
import Users from '../components/users/Users'

export default{
    path:'/users',
    component:Layout,
    children:[
        {
            path: 'list',
            component: Users
        },
    ]
}