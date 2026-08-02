<script setup lang="ts">
import TopBar from '@/Components/Home/TopBar.vue';
import QuickActionsHub from '@/Components/Home/QuickActionsHub.vue';
import TodayCards from '@/Components/Home/TodayCards.vue';
import AyahOfDayBanner from '@/Components/Home/AyahOfDayBanner.vue';
import RecommendedGrid from '@/Components/Home/RecommendedGrid.vue';
import TopReciters from '@/Components/Home/TopReciters.vue';
import BottomNav from '@/Components/Home/BottomNav.vue';
import {
  homeUser,
  readingProgress,
  listeningProgress,
  ayahOfDay,
  recommendedItems,
  topReciters,
} from '@/data/home-dummy-data';
</script>

<template>
  <div :style="{ minHeight: '100vh', paddingBottom: 'var(--space-20)', background: 'var(--color-bg-sunken)' }">
    <!-- Hero: خلفية متدرجة تحاكي سماء الغروب، بدل الأبيض الفارغ -->
    <div
      :style="{
        background: 'radial-gradient(120% 100% at 15% 0%, rgba(216,180,254,0.55), transparent 55%), radial-gradient(100% 90% at 100% 10%, rgba(251,191,36,0.35), transparent 60%), linear-gradient(180deg, var(--primitive-purple-100) 0%, var(--primitive-gold-100) 55%, var(--color-bg-sunken) 100%)',
        borderBottomLeftRadius: 'var(--radius-3xl)',
        borderBottomRightRadius: 'var(--radius-3xl)',
        boxShadow: 'var(--shadow-md)',
        paddingBottom: 'var(--space-8)',
      }"
    >
      <TopBar :user-name="homeUser.name" :city="homeUser.city" :temperature="homeUser.temperature" />
      <QuickActionsHub />
      <TodayCards :reading-progress="readingProgress" :listening-progress="listeningProgress" />
    </div>

    <AyahOfDayBanner :ayah-text="ayahOfDay.text" :reference="ayahOfDay.reference" />
    <RecommendedGrid :items="recommendedItems" />
    <TopReciters :reciters="topReciters" />
    <BottomNav />
  </div>
</template>
