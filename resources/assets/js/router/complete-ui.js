import LayoutBlank from '../layout/LayoutBlank'
import CuiComponents from '../cui-components/Base'
export default [{
  path: '/complete-ui',
  component: LayoutBlank,
  children: [{
    path: '',
    component: CuiComponents
  }]
}]
