import Layout1 from '../layout/Layout1'
import Buttons from '../components/Typography'
export default [{
  path: '/ui',
  component: Layout1,
  children: [{
    path: 'buttons',
    component: Buttons
  }]
}]
