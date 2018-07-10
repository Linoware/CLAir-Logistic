import Layout from '../layout/Layout1'
import Users from '../components/users/Users'
import Form from '../components/users/Form'

export default{
    path:'/users',
    component:Layout,
    children:[
        {
            path: 'list',
            component: Users
        },
        {
            path: 'create',
            component: Form
        },
        {
            path: 'view/:id',
            component: Form,
            props: true
        }
    ]
}