import Layout1 from '../layout/Layout1'
import VueMasonry from '../components/miscellaneous/VueMasonry'
export default [{
  path: '/miscellaneous',
  component: Layout1,
  children: [{
    path: 'vue-masonry',
    component: VueMasonry
  }]
}]
