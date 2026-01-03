<template>
  <Head>
    <title>Users</title>
  </Head>
  <div class="flex justify-between my-2">
    <div class="flex items-center">
      <h1 class="text-3xl">users</h1>
      <small class="text-blue-500 ml-3"
        ><Link href="users/create">Create User</Link></small
      >
    </div>
    <input
      type="search"
      placeholder="Search ..."
      v-model="search"
      class="border px-2 rounded-lg"
    />
  </div>
  <hr />
  <div class="overflow-x-auto p-4">
    <table class="min-w-full divide-y divide-gray-200 rounded-xl shadow-md">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
            Email
          </th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
            Full Name
          </th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
            Action
          </th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white">
        <tr v-if="users.data.length === 0">
          <td colspan="3" class="px-6 py-4 text-center text-gray-500">
            No data found.
          </td>
        </tr>
        <!-- Example row - dynamically repeat this in your framework (React, Vue, etc.) -->
        <tr v-for="user in users.data" :key="user.id">
          <td class="px-6 py-4 text-sm text-gray-800">{{ user.email }}</td>
          <td class="px-6 py-4 text-sm text-gray-800">{{ user.name }}</td>
          <td class="px-6 py-4 text-sm text-gray-800">
            <Link class="px-2 text-blue-700" :href="`edit/${user.id}`">Edit</Link>
            <button
              @click="deleteUser(user.id)"
              class="text-red-600 cursor-pointer"
            >
              Delete
            </button>
          </td>
        </tr>
        <!-- More rows... -->
      </tbody>
    </table>
    <div class="mt-8">
      <Component
        :is="page.url ? 'Link' : 'span'"
        v-for="(page, index) in users.links"
        :key="index"
        :href="page.url"
        preserve-scroll
        v-html="page.label"
        :class="[
          'py-1 px-2 rounded shadow bg-blach',
          page.active ? 'bg-gray-500 text-white' : 'bg-white text-gray-700',
        ]"
      />
    </div>
  </div>
</template>
<script>
import { watch } from "vue";
import Layout from "../../Shared/Layout.vue";
import { Inertia } from "@inertiajs/inertia";
import { debounce } from "lodash";
import { router } from "@inertiajs/vue3";
import Swal from "sweetalert2";

export default {
  layout: Layout,
  props: {
    users: Object,
    filters: Object,
  },
  data() {
    return {
      search: this.filters.search,
    };
  },
  methods: {
    deleteUser(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc2626", // red
        cancelButtonColor: "#6b7280", // gray
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          router.delete(`delete/${id}`, {
            onSuccess: () => {
              Swal.fire("Deleted!", "User has been deleted.", "success");
            },
            onError: () => {
              Swal.fire("Error!", "Something went wrong.", "error");
            },
          });
        }
      });
    },
  },
  watch: {
    search: debounce(function (value) {
      console.log("Search changed to:", value);
      this.$inertia.get(
        "users",
        { search: value },
        { preserveState: true, replace: true }
      );
    }, 300),
  },
};
</script>

 