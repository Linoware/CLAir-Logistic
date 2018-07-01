import Pages from '../layout/Pages'
import PageNotFound from '../components/pages/PageNotFound'
export default [{
  // Layout 2
  path: '/pages',
  component: Pages,
  children: [{
    path: '/*',
    component: PageNotFound
  }]
},]
