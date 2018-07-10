import Layout from '../layout/Layout1'
import Countries from '../components/country/Countries'
import Form from '../components/country/Form'

export default{
    path:'/components',
    component:Layout,
    children:[
        {
            path: 'countries',
            component: Countries
        },
        {
            path: 'country/create',
            component: Form
        },
        {
            path: 'country/view/:id',
            component: Form,
            props: true
        },
        {
            path: 'provinces',
            component: Countries
        },
        {
            path: 'province/create',
            component: Form
        },
        {
            path: 'province/view/:id',
            component: Form,
            props: true
        },
        {
            path: 'cities',
            component: Countries
        },
        {
            path: 'city/create',
            component: Form
        },
        {
            path: 'city/view/:id',
            component: Form,
            props: true
        },
    ]
}