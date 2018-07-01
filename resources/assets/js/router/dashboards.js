import Layout1 from '../layout/Layout1'
import Dashboard1 from '../components/dashboards/Dashboard1'
export default [{
  path: '/dashboards',
  component: Layout1,
  children: [{
    path: 'dashboard-1',
    component: Dashboard1,
    meta:{
      requiresAuth: true
    }
  }]
}]
