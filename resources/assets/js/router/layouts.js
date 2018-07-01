import Layout1 from '../layout/Layout1'
import Layout1Example from '../components/layouts/Layout1Example'
export default [{
  path: '/layouts/layout-1',
  component: Layout1,
  children: [{
    path: '',
    component: Layout1Example
  }]
}]
