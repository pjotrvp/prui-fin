<script setup>
defineProps({
    user: String,
});
</script>

<template>
    <Head title="About" />
    <div>
        <h1>Hello {{ $page.props.auth.user }}</h1>
    </div>
</template>
