<script setup>
</script>

<template>
  <Head>
    <title>Prui Financial</title>
    <meta head-key="description" name="description" content="This is the default description">
  </Head>
    <div>
        <header class="bg-black text-white py-4">
            <nav
                class="bg-black flex items-center justify-between p-4 max-w-screen-lg mx-auto"
            >
                <!-- Space between links -->
                <div class="flex space-x-6">
                    <Link :href="route('home')">Home</Link>
                    <Link :href="route('about')">About</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <!-- Content from pages will appear here -->
            <slot />
        </main>
    </div>
</template>
