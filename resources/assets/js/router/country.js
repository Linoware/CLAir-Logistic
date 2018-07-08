import Layout from '../layout/Layout1'
import Countries from '../components/country/Countries'
import Form from '../components/country/Form'

export default{
    path:'/freights',
    component:Layout,
    children:[
        {
            path: 'countries',
            component: Countries
        },
        {
            path: 'country/create',
            component: Form
        }
    ]
}