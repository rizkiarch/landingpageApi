<template>
  <q-layout view="hHh lpR fFf">

    <q-header elevated class="bg-primary text-white">
      <q-toolbar>
        <q-btn dense flat round icon="menu" @click="toggleLeftDrawer" />

        <q-toolbar-title>
          <q-avatar>
            <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
          </q-avatar>
          Title
        </q-toolbar-title>

        <!-- <q-btn dense flat round icon="menu" @click="toggleRightDrawer" /> -->
      </q-toolbar>
    </q-header>

    <q-drawer show-if-above v-model="leftDrawerOpen" side="left" elevated>
      <q-list class="q-pl-lg">
        <q-item to="/Login-1" active-class="q-item-no-link-highlighting">
          <q-item-section avatar>
            <q-icon class="text-primary" name="dashboard" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Dasboard</q-item-label>
          </q-item-section>
        </q-item>
        <q-item to="/Lock" active-class="q-item-no-link-highlighting">
          <q-item-section avatar>
            <q-icon class="text-primary" name="perm_media" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Media</q-item-label>
          </q-item-section>
        </q-item>
        <q-item to="/Lock-2" active-class="q-item-no-link-highlighting">
          <q-item-section avatar>
            <q-icon class="text-primary" name="shopping_cart" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Product</q-item-label>
          </q-item-section>
        </q-item>
        <q-item to="/Pricing" active-class="q-item-no-link-highlighting">
          <q-item-section avatar>
            <q-icon class="text-primary" name="article" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Blog</q-item-label>
          </q-item-section>
        </q-item>
        <q-item to="/teams" active-class="q-item-no-link-highlighting">
          <q-item-section avatar>
            <q-icon class="text-primary" name="groups" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Teams</q-item-label>
          </q-item-section>
        </q-item>
        <q-item to="/Pricing" active-class="q-item-no-link-highlighting">
          <q-item-section avatar>
            <q-icon class="text-primary" name="support_agent" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Contact</q-item-label>
          </q-item-section>
        </q-item>
        <q-item-label header class="text-weight text-black">Generic</q-item-label>
        <q-item to="/Profile" active-class="q-item-no-link-highlighting">
          <q-item-section avatar>
            <q-icon class="text-primary" name="person" />
          </q-item-section>
          <q-item-section>
            <q-item-label>User</q-item-label>
          </q-item-section>
        </q-item>
        <q-expansion-item icon="settings" label="Web Settings">
          <q-list class="q-pl-lg">
            <q-item to="/Maintenance" active-class="q-item-no-link-highlighting">
              <q-item-section avatar>
                <q-icon class="text-primary" name="aspect_ratio" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Banner</q-item-label>
              </q-item-section>
            </q-item>
            <q-item to="/Maintenance" active-class="q-item-no-link-highlighting">
              <q-item-section avatar>
                <q-icon class="text-primary" name="view_carousel" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Carousel</q-item-label>
              </q-item-section>
            </q-item>

            <q-item to="/Maintenance" active-class="q-item-no-link-highlighting">
              <q-item-section avatar>
                <q-icon class="text-primary" name="image" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Photo Widget</q-item-label>
              </q-item-section>
            </q-item>
            <q-item to="/Maintenance" active-class="q-item-no-link-highlighting">
              <q-item-section avatar>
                <q-icon class="text-primary" name="photo_library" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Photo Product</q-item-label>
              </q-item-section>
            </q-item>
            <q-item to="/Maintenance" active-class="q-item-no-link-highlighting">
              <q-item-section avatar>
                <q-icon class="text-primary" name="contact_support" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Contact</q-item-label>
              </q-item-section>
            </q-item>
          </q-list>
        </q-expansion-item>
      </q-list>
    </q-drawer>

    <!-- <q-drawer show-if-above v-model="rightDrawerOpen" side="right" elevated>
      drawer content
    </q-drawer> -->

    <q-page-container>
      <router-view />
    </q-page-container>

    <!-- <q-footer elevated class="bg-grey-8 text-white text-center">
      <q-toolbar>
        <q-toolbar-title>
          <q-avatar>
            <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
          </q-avatar>
          <div>Footer</div>
        </q-toolbar-title>
      </q-toolbar>
    </q-footer> -->

  </q-layout>
</template>

<script>
import { ref } from 'vue'

export default {
  setup() {
    const leftDrawerOpen = ref(false)
    const rightDrawerOpen = ref(false)

    return {
      leftDrawerOpen,
      toggleLeftDrawer() {
        leftDrawerOpen.value = !leftDrawerOpen.value
      },

      rightDrawerOpen,
      toggleRightDrawer() {
        rightDrawerOpen.value = !rightDrawerOpen.value
      }
    }
  }
}
</script>