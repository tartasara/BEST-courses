<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
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
    description: string;
    learning: string[];
};

const props = defineProps<{ courses: Course[] }>();
const activeCourse = ref(props.courses[0]);
const activeHeroSlideIndex = ref(0);
const heroSlides = [
    {
        image: 'https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=1600&q=85',
        alt: 'Sunlight over a European city',
    },
    {
        image: 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=1600&q=85',
        alt: 'Mountain lake surrounded by green hills',
    },
    {
        image: 'https://images.unsplash.com/photo-1516483638261-f4dbaf036963?auto=format&fit=crop&w=1600&q=85',
        alt: 'Colorful houses along the Italian coast',
    },
    {
        image: 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=1600&q=85',
        alt: 'Spring flowers in soft afternoon light',
    },
];
const activeHeroSlide = computed(
    () => heroSlides[activeHeroSlideIndex.value]!,
);

function showPreviousHeroSlide() {
    activeHeroSlideIndex.value =
        (activeHeroSlideIndex.value - 1 + heroSlides.length) % heroSlides.length;
}

function showNextHeroSlide() {
    activeHeroSlideIndex.value =
        (activeHeroSlideIndex.value + 1) % heroSlides.length;
}

const testimonials = [
    {
        name: 'Student testimonial',
        course: 'Spring Course participant',
        quote: 'Add a real student quote about the people you met, what you learned, and the moment you will remember most.',
        image: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=240&h=240&q=80',
    },
    {
        name: 'Student testimonial',
        course: 'Spring Course participant',
        quote: 'Share how the course brought together new ideas, hands-on learning, and friendships from across Europe.',
        image: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=240&h=240&q=80',
    },
    {
        name: 'Student testimonial',
        course: 'Spring Course participant',
        quote: 'Tell future participants about the experience that inspired you to see your subject in a different way.',
        image: 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&w=240&h=240&q=80',
    },
    {
        name: 'Student testimonial',
        course: 'Spring Course participant',
        quote: 'Add a few words about the people, places, and small surprises that made your BEST course special.',
        image: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=240&h=240&q=80',
    },
];
</script>

<template>
    <Head title="Spring Courses 2027" />

    <div id="top" class="site-shell">
        <BestSiteHeader />

        <main>
            <section class="hero-section">
                <div class="hero-copy">
                    <p class="eyebrow"><span></span> Learn. Explore. Connect.</p>
                    <h1>Spring Courses <span>2027</span></h1>
                    <p class="hero-description">
                        A week that takes you somewhere new. Find your course,
                        meet your people, and make this spring count.
                    </p>
                    <a class="hero-cta" href="#courses">
                        Find your course <span aria-hidden="true">↓</span>
                    </a>
                </div>
                <div class="hero-art" aria-label="Spring inspiration">
                    <Transition name="hero-slide-fade" mode="out-in">
                        <img
                            :key="activeHeroSlide.image"
                            :src="activeHeroSlide.image"
                            :alt="activeHeroSlide.alt"
                        />
                    </Transition>
                    <button
                        class="hero-slide-arrow hero-slide-previous"
                        type="button"
                        aria-label="Show previous image"
                        @click="showPreviousHeroSlide"
                    >
                        <span aria-hidden="true">←</span>
                    </button>
                    <button
                        class="hero-slide-arrow hero-slide-next"
                        type="button"
                        aria-label="Show next image"
                        @click="showNextHeroSlide"
                    >
                        <span aria-hidden="true">→</span>
                    </button>
                    <div class="hero-sticker">
                        <span>EUROPE</span>
                        <strong>is your<br />classroom</strong>
                        <span class="sticker-star" aria-hidden="true">✳</span>
                    </div>
                </div>
            </section>

            <section id="courses" class="courses-section">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow"><span></span> Your next adventure</p>
                        <h2>The 5 courses<span class="heading-period">.</span></h2>
                    </div>
                    <p class="section-aside">
                        Pick a topic that sparks your curiosity.
                    </p>
                </div>

                <div class="course-explorer">
                    <div class="course-list" aria-label="Available courses">
                        <button
                            v-for="(course, index) in courses"
                            :key="course.slug"
                            class="course-choice"
                            :class="{ 'is-active': activeCourse?.slug === course.slug }"
                            type="button"
                            :aria-pressed="activeCourse?.slug === course.slug"
                            @mouseenter="activeCourse = course"
                            @focus="activeCourse = course"
                            @click="activeCourse = course"
                        >
                            <span class="course-index">0{{ index + 1 }}</span>
                            <span class="course-choice-title">{{ course.title }}</span>
                            <span class="course-arrow" aria-hidden="true">↗</span>
                        </button>
                    </div>

                    <Transition name="course-fade" mode="out-in">
                        <article v-if="activeCourse" :key="activeCourse.slug" class="course-preview">
                            <img :src="activeCourse.image" :alt="activeCourse.location" />
                            <div class="preview-content">
                                <h3>{{ activeCourse.title }}</h3>
                                <ul class="preview-facts">
                                    <li><span aria-hidden="true">⌖</span>{{ activeCourse.location }}</li>
                                    <li><span aria-hidden="true">◷</span>{{ activeCourse.dates }}</li>
                                    <li><span aria-hidden="true">€</span>{{ activeCourse.price }}</li>
                                </ul>
                                <Link
                                    class="apply-button"
                                    :href="`/courses/${activeCourse.slug}`"
                                >
                                    Apply now <span aria-hidden="true">↗</span>
                                </Link>
                            </div>
                            <span class="preview-number">SPRING<br />2027</span>
                        </article>
                    </Transition>
                </div>
            </section>

            <section id="testimonials" class="testimonials-section">
                <div class="section-heading testimonial-heading">
                    <div>
                        <p class="eyebrow"><span></span> The best part is the people</p>
                        <h2>Testimonials<span class="heading-period">.</span></h2>
                    </div>
                    <p class="section-aside">
                        Here is what some students had to say<br />
                        about the experience.
                    </p>
                </div>

                <div class="testimonial-grid">
                    <article
                        v-for="(testimonial, index) in testimonials"
                        :key="index"
                        class="testimonial-card"
                    >
                        <img :src="testimonial.image" :alt="testimonial.name" />
                        <div class="testimonial-copy">
                            <span class="quote-mark" aria-hidden="true">“</span>
                            <p>{{ testimonial.quote }}</p>
                            <div class="testimonial-person">
                                <strong>{{ testimonial.name }}</strong>
                                <span>{{ testimonial.course }}</span>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>

        <ContactFooter />
    </div>
</template>
