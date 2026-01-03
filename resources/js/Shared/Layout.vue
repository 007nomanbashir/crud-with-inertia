<template>
  <section class="bg-gray-200 p-6">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>
        <p class="text-sm ml-4"> {{ $page.props.auth.userName ? `Hi! ${$page.props.auth.userName}` : null }}</p>
      </div>
      <Nav />
    </header>
  </section>
  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <slot />
    </div>
  </section>
</template>
<script>
import Nav from "../Shared/Nav.vue";
export default {
  components: { Nav },
};
</script>