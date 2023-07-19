// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      apiBase: 'http://localhost:8000'
    }
  },
  modules: [
    'nuxt-quasar-ui'
  ],
  // quasar: { /* */ },
  devtools: { enabled: true }
})
