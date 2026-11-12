<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import BestBrandMarks from '@/components/BestBrandMarks.vue';
</script>

<template>
    <header class="site-header">
        <BestBrandMarks />

        <nav class="site-nav" aria-label="Main navigation">
            <Link class="nav-link" href="/">Home</Link>
            <a class="nav-link" href="/#testimonials">
                Testimonials
            </a>
        </nav>
    </header>
</template>
