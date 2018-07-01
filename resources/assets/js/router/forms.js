import Layout1 from '../layout/Layout1'
import LayoutAndElements from '../components/forms/LayoutsAndElements'
export default [{
  path: '/forms',
  component: Layout1,
  children: [{
    path: 'layouts-and-elements',
    component: LayoutAndElements
  }]
}]
