import Layout1 from '../layout/Layout1'
import PageNotFound from '../components/pages/PageNotFound'
export default [{
  path: '/*',
  component: Layout1,
  children: [{
    path: '',
    component: PageNotFound
  }]
}]
