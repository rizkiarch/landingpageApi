<script lang="ts" setup>
import { ref, reactive } from 'vue';
import { useRuntimeConfig } from "../../node_modules/nuxt/dist/app";

const config = useRuntimeConfig();
const loading = ref(false);
const title = ref('Data Teams');
const onCreate = ref(false);
const form = reactive({
  name: "",
  position: "",
});
const onSubmit = async () => {
  loading.value = true;
  try {
    const response = await fetch(`${config.public.apiBase}/api/teams`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(form),
    });

    if (!response.ok) {
      throw new Error(response.statusText);
    }

  } catch (error) {
    console.error('Error Fetching data : ', error);
  } finally {
    loading.value = false;
    onCreate.value = false;
  }
}
</script>

<template>
  <div class="q-pa-md">
    <!-- Component: teams/createModal -->
    <q-form @submit="onSubmit">
      <q-dialog v-model="onCreate" persistent>
        <q-card>
          <q-card-section>
            <div class="text-h6">Create {{ title }} </div>
          </q-card-section>

          <q-separator />

          <q-card-section style="max-height: 50vh" class="scroll">
            <div class="q-pa-md">
              <div class="q-gutter-y-md">
                <q-input filled v-model="form.name" label="Name" />
                <q-input filled v-model="form.position" label="Position" />
              </div>
            </div>

          </q-card-section>

          <q-separator />

          <q-card-actions align="right">
            <q-btn flat label="Decline" color="primary" v-close-popup />
            <q-btn color="primary" icon="save" label="Accept" @click="onSubmit" :loading="loading" />
          </q-card-actions>
        </q-card>
      </q-dialog>
    </q-form>
  </div>
</template>

<style scoped></style>
