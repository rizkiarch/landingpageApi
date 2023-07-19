<script lang="ts" setup>
import { ref, onMounted, reactive, computed } from 'vue';
import { useRuntimeConfig } from "../../node_modules/nuxt/dist/app";
// import createModal from '../../components/teams/createModal.vue';


const title = ref('Data Teams');
const loading = ref(true);
useHead({
  title: computed(() => title.value),
});
// get api data
const config = useRuntimeConfig();
onMounted(async () => {
  loading.value = true;
  try {
    const response = await fetch(`${config.public.apiBase}/api/teams`);
    const data = await response.json();
    setTimeout(() => {
      teams.value = data;
      loading.value = false;
    });
  } catch (error) {
    console.error('Error Fetching data : ', error);
  }
});
// get column table
const teams = ref([]);
const columns =
  [
    {
      key: "name",
      label: "Name",
      field: "name",
      sortable: true,
      align: "left",
    },
    {
      key: "position",
      label: "Position",
      field: "position",
      sortable: true,
      align: "left",
    },
    {
      name: "button",
      label: "Action",
      align: "left",
    },
  ];
// filter search
const filter = ref('');


// create data
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

const onEdit = ref(false);

</script>

<template>
  <q-page padding>

    <div class="col text-right q-mb-sm">
      <q-btn color="primary" icon="add" label="create" @click="onCreate = true" />
    </div>

    <q-table title="Teams" :rows="teams.data" :columns="columns" row-key="name" :filter="filter" :loading="loading" dense>
      <!-- filter search -->
      <template v-slot:top-right>
        <q-input borderless dense debounce="300" v-model="filter" placeholder="Search">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
      </template>

      <template v-slot:loading>
        <q-inner-loading showing label="Please wait..." label-class="text-teal" color="primary"
          label-style="font-size: 1.1em" />
      </template>
      <!-- no data :( -->
      <!-- <template v-slot:no-data="{ icon, message, filter }">
        <div class="full-width row flex-center text-accent q-gutter-sm">
          <q-icon size="2em" name="sentiment_very_dissatisfied" />
          <span>
            Well this is sad... {{ message }}
          </span>
          <q-icon size="2em" :name="filter ? 'warning' : icon" />
        </div>
      </template> -->
      <!-- button -->
      <template v-slot:body-cell-button="props">
        <q-td :props="props">
          <div class="q-gutter-sm">
            <q-btn dense size="sm" color="info" icon="edit" @click="onEditModal(props.row)" /><q-btn dense size="sm"
              color="red" icon="delete" @click="onDelete(props)" />
          </div>
        </q-td>
      </template>
    </q-table>

    <!-- modal create -->
    <q-form @submit="onSubmit">
      <q-dialog v-model="onCreate" persistent>
        <q-card>
          <q-card-section>
            <div class="text-h6">Create {{ title }} </div>
          </q-card-section>

          <q-separator />

          <q-card-section style="max-height: 50vh" class="scroll">
            <div class="q-gutter-y-md">
              <q-input filled v-model="form.name" label="Name" dense />
              <q-input filled v-model="form.position" label="Position" dense />
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

    <!-- modal edit-->
    <q-form @submit="onEdit">
      <q-dialog v-model="onEdit" persistent>
        <q-card>
          <q-card-section>
            <div class="text-h6">Edit</div>
          </q-card-section>

          <q-separator />

          <q-card-section style="max-height: 50vh" class="scroll">
            <div class="q-gutter-y-md">
              <q-input filled v-model="formEdit.name" label="Name" dense />
              <q-input filled v-model="formEdit.position" label="Position" dense />
            </div>
          </q-card-section>

          <q-separator />

          <q-card-actions align="right">
            <q-btn flat label="Decline" color="primary" v-close-popup />
            <q-btn flat label="Accept" color="primary" v-close-popup />
          </q-card-actions>
        </q-card>
      </q-dialog>
    </q-form>
  </q-page>
</template>

<style scoped></style>
