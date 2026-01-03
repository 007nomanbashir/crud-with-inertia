<template>
  <Head>
    <title>Edit</title>
  </Head>
  <div class="flex justify-between my-2">
    <h1 class="text-3xl">Edit: {{ data.name }}</h1>
    <Link
      class="text-white bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      href="/users"
      >Cancel</Link
    >
  </div>
  <hr />
  <div class="my-4">
    <form @submit.prevent="submit" class="max-w-md mx-auto">
      <div class="relative z-0 w-full mb-5 group">
        <input
          type="text"
          v-model="name"
          id="first_name"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=""
        />
        <label
          for="first_name"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Name</label
        >
        <div
          v-if="$page.props.errors.name"
          v-text="$page.props.errors.name"
          class="text-red-800"
        ></div>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <input
          type="email"
          v-model="email"
          id="email"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=""
        />
        <label
          for="email"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Email address</label
        >
        <div
          v-if="$page.props.errors.email"
          v-text="$page.props.errors.email"
          class="text-red-800"
        ></div>
      </div>
      <button
        type="submit"
        :disabled="processing"
        class="text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Submit
      </button>
    </form>
  </div>

  <hr />
</template>
<script>
import Layout from "../../Shared/Layout.vue";
// import { Inertia } from "@inertiajs/inertia";
import { router } from "@inertiajs/vue3";

export default {
  layout: Layout,
  props: {
    data: Object,
  },
  data() {
    return {
      name: this.data.name ?? "",
      email: this.data.email ?? "",
      processing: false,
    };
  },
  // let processing = ref(false),
  methods: {
    submit() {
      router.post(
        `/users/${this.data.id}`,
        {
          name: this.name,
          email: this.email,
        },
        {
          onStart: () => {
            this.processing = true;
          },
          onFinish: () => {
            this.processing = false;
          },
        }
      );
    },
  },
};
</script>
 