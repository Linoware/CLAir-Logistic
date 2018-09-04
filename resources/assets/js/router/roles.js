import Layout from '../layout/Layout1'
import Users from '../components/settings/roles/Roles'
import Form from '../components/settings/roles/Form'

export default{
    path:'/settings/roles',
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