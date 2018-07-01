import Layout1 from '../layout/Layout1'
import Bootstrap from '../components/tables/Bootstrap'
export default [{
  path: '/tables',
  component: Layout1,
  children: [{
    path: 'bootstrap',
    component: Bootstrap
  }]
}]
