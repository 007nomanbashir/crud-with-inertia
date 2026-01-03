<template>
  <nav>
    <ul class="flex space-x-6 list-inside">
      <!-- <li v-if="$page.props.auth.user"> -->
      <Link
        class="text-black-500 hover:underline"
        :class="{ 'font-bold underline': $page.url == '/' }"
        href="/"
        >Home</Link
      >
      <!-- </li> -->
      <!-- <li v-if="$page.props.auth.user"> -->
      <Link
        class="text-black-500 hover:underline"
        :class="{ 'font-bold underline': $page.url.startsWith('/users') }"
        href="/users"
        >Users</Link
      >
      <!-- </li> -->
      <!-- <li v-if="$page.props.auth.user"> -->
      <Link
        class="text-black-500 hover:underline"
        :class="{ 'font-bold underline': $page.url.startsWith('/settings') }"
        href="/settings"
        >Settings</Link
      >
      <!-- </li> -->

      <li v-if="!$page.props.auth.userName">
        <Link
          class="text-black-500 hover:underline"
          :class="{ 'font-bold underline': $page.url.startsWith('/login') }"
          href="/login"
          >LogIn</Link
        >
      </li>

      <li v-if="$page.props.auth.userName">
        <Link
          class="text-black-500 hover:underline cursor-pointer " method="post"
          :class="{ 'font-bold underline': $page.url.startsWith('/logout') }"
          href="/logout"
          >logout</Link
        >
      </li>
    </ul>
  </nav>
</template>
