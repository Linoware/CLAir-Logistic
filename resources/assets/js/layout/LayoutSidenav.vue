<template>
  <sidenav :orientation="orientation" :class="curClasses">

    <!-- Brand demo (see src/demo.css) -->
    <div class="demo-brand" v-if="orientation !== 'horizontal'">
      <span class="demo-brand-logo bg-primary">
        <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
      </span>
      <router-link to="/" class="demo-brand-name sidenav-text font-weight-normal ml-2">Appwork</router-link>
      <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto" @click="toggleSidenav()">
        <i class="ion ion-md-menu align-middle"></i>
      </a>
    </div>
    <div class="sidenav-divider mt-0" v-if="orientation !== 'horizontal'"></div>

    <!-- Links -->
    <div class="sidenav-inner" :class="{ 'py-1': orientation !== 'horizontal' }">

      <div  v-for="(navMenuGroup,i) in navMenuGroups" :key="i" style="width: 100%;">

        <sidenav-divider v-show="navMenuGroup.hasSection" class="mb-1"/>
        <sidenav-header v-show="navMenuGroup.hasSection" class="small font-weight-semibold">{{ navMenuGroup.label }}</sidenav-header>

        <div v-for="(navMenuItem,menu) in navMenuGroup.navMenuItems" :key="menu">
          <sidenav-menu v-if="navMenuItem.childrends.length>0" :icon="navMenuItem.icon" :active="isMenuActive(navMenuItem.route)" :open="isMenuOpen(navMenuItem.route)">
            <template slot="link-text">{{ navMenuItem.label }}</template>
            <sidenav-router-link v-if="navMenuItem.childrends" v-for="(childMenu,cmenu) in navMenuItem.childrends" :key="cmenu" :to="childMenu.route" :exact="true">{{ childMenu.label }}</sidenav-router-link>
          </sidenav-menu>

          <sidenav-router-link v-else :icon="navMenuItem.icon" :to="navMenuItem.route" :exact="true">{{ navMenuItem.label }}</sidenav-router-link>

        </div>

      </div>

    </div>
  </sidenav>
</template>

<script>
import { Sidenav, SidenavLink, SidenavRouterLink, SidenavMenu, SidenavHeader, SidenavBlock, SidenavDivider } from '../vendor/libs/sidenav'

export default {
  name: 'app-layout-sidenav',
  components: {
    Sidenav,
    SidenavLink,
    SidenavRouterLink,
    SidenavMenu,
    SidenavHeader,
    SidenavBlock,
    SidenavDivider
  },

  data(){
    return{

      navMenuGroups:[
        {
          hasSection: false,
          navMenuItems:[
            {
              icon:'ion ion-md-speedometer',label:'Dashboard',route:'/dashboards',childrends:[
                {
                  label:'Dashboard 1',route:'/dashboards/dashboard-1'
                }
              ]
            }
          ]
        },
        {
            hasSection:false,label:'Users',navMenuItems:[
                {
                    icon:'ion ion-ios-people',label:'Users',route:'/users',childrends:[
                        {
                            label:'Users List',route:'/users/list'
                        }
                    ]
                }
            ]
        },
        {
            hasSection:false,navMenuItems:[
                {
                    icon:'ion ion-md-download',label:'Components',route:'/components',childrends:[
                        {
                            label:'Countries',route:'/components/countries'
                        },
                        {
                            label:'Provinces',route:'/components/provinces'
                        },
                        {
                            label:'Cities',route:'/components/cities'
                        }
                    ]
                }
            ]
        },
        {
            hasSection:false,navMenuItems:[
                {
                    icon:'ion ion-md-settings',label:'Setting',route:'/setting',childrends:[
                        {
                            label:'Roles',route:'/settings/roles/list'
                        },
                        {
                            label:'Permission',route:'/settings/permissions/list'
                        }
                    ]
                }
            ]
        },
      ],

    }
  },

  props: {
    orientation: {
      type: String,
      default: 'vertical'
    }
  },

  computed: {
    curClasses () {
      let bg = this.layoutSidenavBg

      if (this.orientation === 'horizontal' && (bg.indexOf(' sidenav-dark') !== -1)) {
        bg = bg
          .replace(' sidenav-dark', '')
          .replace('-darker', '')
          .replace('-dark', '')
      }

      return `bg-${bg} ` + (
        this.orientation !== 'horizontal'
          ? 'layout-sidenav'
          : 'layout-sidenav-horizontal container-p-x flex-grow-0'
      )
    }
  },

  methods: {
    isMenuActive (url) {
      return this.$route.path.indexOf(url) === 0
    },

    isMenuOpen (url) {
      return this.$route.path.indexOf(url) === 0 && this.orientation !== 'horizontal'
    },

    toggleSidenav () {
      this.layoutHelpers.toggleCollapsed()
    }
  }
}
</script>
