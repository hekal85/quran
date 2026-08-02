<script setup lang="ts">
import { BookOpen, Headphones, Sparkles } from 'lucide-vue-next';

defineProps<{
  readingProgress: { surah: string; remaining: string; percent: number };
  listeningProgress: { surah: string; reciter: string; percent: number };
}>();
</script>

<template>
  <section class="grid grid-cols-3 gap-4" :style="{ padding: '0 var(--space-8)', marginTop: 'var(--space-6)' }">
    <div
      class="flex flex-col"
      :style="{
        background: 'var(--color-bg-elevated)',
        borderRadius: 'var(--radius-xl)',
        padding: 'var(--space-5)',
        boxShadow: 'var(--shadow-md)',
      }"
    >
      <div class="flex items-center justify-between" :style="{ marginBottom: 'var(--space-3)' }">
        <span :style="{ fontWeight: 'var(--font-weight-semibold)', color: 'var(--color-text-primary)' }">أكمل وردك</span>
        <BookOpen :size="18" :style="{ color: 'var(--color-brand-primary)' }" />
      </div>
      <div
        :style="{
          width: '48px', height: '64px',
          background: 'linear-gradient(160deg, var(--primitive-emerald-700), var(--primitive-emerald-900))',
          borderRadius: 'var(--radius-sm)',
          marginBottom: 'var(--space-3)',
        }"
      ></div>
      <p :style="{ fontWeight: 'var(--font-weight-bold)', color: 'var(--color-text-primary)' }">{{ readingProgress.surah }}</p>
      <p :style="{ fontSize: 'var(--font-size-sm)', color: 'var(--color-text-secondary)', marginBottom: 'var(--space-2)' }">{{ readingProgress.remaining }}</p>
      <div :style="{ height: '6px', background: 'var(--color-progress-track)', borderRadius: 'var(--radius-full)', marginBottom: 'var(--space-3)' }">
        <div :style="{ height: '100%', width: readingProgress.percent + '%', background: 'var(--color-progress-fill)', borderRadius: 'var(--radius-full)' }"></div>
      </div>
      <button
        :style="{
          background: 'var(--color-brand-primary)', color: 'var(--color-text-inverse)',
          borderRadius: 'var(--radius-full)', padding: 'var(--space-2) var(--space-4)',
          fontSize: 'var(--font-size-sm)', fontWeight: 'var(--font-weight-semibold)', border: 'none',
        }"
      >
        متابعة القراءة
      </button>
    </div>

    <div
      class="flex flex-col"
      :style="{
        background: 'var(--color-bg-elevated)',
        borderRadius: 'var(--radius-xl)',
        padding: 'var(--space-5)',
        boxShadow: 'var(--shadow-md)',
      }"
    >
      <div class="flex items-center justify-between" :style="{ marginBottom: 'var(--space-3)' }">
        <span :style="{ fontWeight: 'var(--font-weight-semibold)', color: 'var(--color-text-primary)' }">أكمل استماعك</span>
        <Headphones :size="18" :style="{ color: 'var(--color-brand-secondary)' }" />
      </div>
      <div
        class="flex items-center justify-center"
        :style="{
          width: '48px', height: '48px', borderRadius: 'var(--radius-full)',
          background: 'var(--primitive-neutral-800)', marginBottom: 'var(--space-3)',
          color: 'var(--primitive-neutral-0)', fontWeight: 'var(--font-weight-bold)',
        }"
      >
        {{ listeningProgress.reciter.charAt(0) }}
      </div>
      <p :style="{ fontWeight: 'var(--font-weight-bold)', color: 'var(--color-text-primary)' }">{{ listeningProgress.surah }}</p>
      <p :style="{ fontSize: 'var(--font-size-sm)', color: 'var(--color-text-secondary)', marginBottom: 'var(--space-2)' }">{{ listeningProgress.reciter }}</p>
      <div :style="{ height: '6px', background: 'var(--color-progress-track)', borderRadius: 'var(--radius-full)', marginBottom: 'var(--space-3)' }">
        <div :style="{ height: '100%', width: listeningProgress.percent + '%', background: 'var(--primitive-blue-500)', borderRadius: 'var(--radius-full)' }"></div>
      </div>
      <button
        :style="{
          background: 'transparent', color: 'var(--primitive-blue-500)',
          borderRadius: 'var(--radius-full)', padding: 'var(--space-2) var(--space-4)',
          fontSize: 'var(--font-size-sm)', fontWeight: 'var(--font-weight-semibold)',
          border: '1px solid var(--primitive-blue-500)',
        }"
      >
        استمرار الاستماع
      </button>
    </div>

    <div
      class="flex flex-col justify-between"
      :style="{
        background: 'radial-gradient(140% 120% at 15% 0%, rgba(232,205,255,0.45), transparent 60%), linear-gradient(160deg, var(--primitive-purple-600), var(--primitive-purple-900))',
        borderRadius: 'var(--radius-2xl)',
        padding: 'var(--space-6)',
        boxShadow: 'var(--shadow-glow-purple)',
        border: '1px solid rgba(255,255,255,0.12)',
        color: 'var(--primitive-neutral-0)',
      }"
    >
      <div class="flex items-center justify-between">
        <span :style="{ fontWeight: 'var(--font-weight-semibold)' }">رحلة اليوم</span>
        <Sparkles :size="18" />
      </div>
      <div>
        <p :style="{ fontSize: 'var(--font-size-lg)', fontWeight: 'var(--font-weight-bold)', marginBottom: 'var(--space-1)' }">الطمأنينة</p>
        <p :style="{ fontSize: 'var(--font-size-sm)', opacity: '0.85', marginBottom: 'var(--space-4)' }">رحلة من 7 آيات مختارة لراحة قلبك</p>
      </div>
      <button
        :style="{
          background: 'rgba(255,255,255,0.2)', color: 'var(--primitive-neutral-0)',
          borderRadius: 'var(--radius-full)', padding: 'var(--space-2) var(--space-4)',
          fontSize: 'var(--font-size-sm)', fontWeight: 'var(--font-weight-semibold)',
          border: '1px solid rgba(255,255,255,0.4)', alignSelf: 'flex-start',
        }"
      >
        ابدأ الرحلة ✨
      </button>
    </div>
  </section>
</template>

