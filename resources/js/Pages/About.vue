<script setup>
defineProps({
    user: String,
});
</script>

<template>
    <Head title="About" />
    <div>
        <h1>Hello {{ user }}</h1>
    </div>
</template>
