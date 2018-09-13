import Layout from '../layout/Layout1'
import Countries from '../components/country/Countries'
import CountryForm from '../components/country/Form'
import Provinces from '../components/province/Provinces'
import ProvinceForm from '../components/province/Form'
import Cities from '../components/city/Cities'
import CityForm from '../components/city/Form'

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
            component: CountryForm
        },
        {
            path: 'country/view/:id',
            component: CountryForm,
            props: true
        },
        {
            path: 'provinces',
            component: Provinces
        },
        {
            path: 'province/create',
            component: ProvinceForm
        },
        {
            path: 'province/view/:id',
            component: ProvinceForm,
            props: true
        },
        {
            path: 'cities',
            component: Cities
        },
        {
            path: 'city/create',
            component: CityForm
        },
        {
            path: 'city/view/:id',
            component: CityForm,
            props: true
        },
    ]
}