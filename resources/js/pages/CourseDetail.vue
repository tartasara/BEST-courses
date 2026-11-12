<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import BestSiteHeader from '@/components/BestSiteHeader.vue';
import ContactFooter from '@/components/ContactFooter.vue';

type Course = {
    slug: string;
    title: string;
    category: string;
    location: string;
    dates: string;
    price: string;
    duration: string;
    level: string;
    hours_per_day: string;
    image: string;
    application_url?: string;
    description: string;
    learning: string[];
};

defineProps<{ course: Course }>();

const applicationUrl =
    'https://www.best.eu.org/event/details.jsp?activity=k3bk10u';
</script>

<template>
    <Head :title="course.title" />

    <div class="site-shell">
        <BestSiteHeader />

        <main class="detail-main">
            <Link class="back-link" href="/">
                <span aria-hidden="true">←</span> Back to main page
            </Link>

            <section class="detail-intro">
                <p class="eyebrow"><span></span> {{ course.category }}</p>
                <h1>{{ course.title }}</h1>
                <p class="detail-description">{{ course.description }}</p>
                <div class="detail-meta">
                    <span><i aria-hidden="true">⌖</i>{{ course.location }}</span>
                    <span><i aria-hidden="true">◷</i>{{ course.dates }}</span>
                </div>
            </section>

            <div class="detail-image">
                <img :src="course.image" :alt="`View of ${course.location}`" />
                <span class="image-label">YOUR CLASSROOM FOR A WEEK</span>
            </div>

            <section class="detail-bottom">
                <div class="learning-column">
                    <p class="eyebrow"><span></span> Take something with you</p>
                    <h2>What you’ll learn</h2>
                    <ul class="learning-list">
                        <li v-for="item in course.learning" :key="item">
                            <span aria-hidden="true">↗</span>{{ item }}
                        </li>
                    </ul>
                </div>

                <aside class="course-facts">
                    <h2>The details</h2>
                    <dl>
                        <div><dt>Duration</dt><dd>{{ course.duration }}</dd></div>
                        <div><dt>Level</dt><dd>{{ course.level }}</dd></div>
                        <div><dt>Working time</dt><dd>{{ course.hours_per_day }}</dd></div>
                        <div><dt>Course fee</dt><dd>{{ course.price }}</dd></div>
                    </dl>
                    <a
                        class="apply-button detail-apply"
                        :href="course.application_url ?? applicationUrl"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Apply now <span aria-hidden="true">↗</span>
                    </a>
                    <p class="apply-note">You’ll continue to the BEST application page.</p>
                </aside>
            </section>
        </main>

        <ContactFooter />
    </div>
</template>
