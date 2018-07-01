import Layout1 from '../layout/Layout1'
import Vue2GoogleMaps from '../components/charts/Vue2GoogleMaps';
export default [{
  path: '/charts',
  component: Layout1,
  children: [{
    path: 'vue2-google-maps',
    component: VuewGoogleMaps
  }]
}]
