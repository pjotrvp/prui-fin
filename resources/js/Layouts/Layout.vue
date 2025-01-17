<script setup></script>

<template>
    <Head>
        <title>Prui Financial</title>
        <meta
            head-key="description"
            name="description"
            content="This is the default description"
        />
    </Head>
    <div>
        <header>
            <nav>
                <!-- Space between links -->
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                    <Link :href="route('register')" class="nav-link">Register</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <!-- Content from pages will appear here -->
            <slot />
        </main>
    </div>
</template>
