<script setup lang="ts">
interface Reciter { name: string; }
defineProps<{ reciters: Reciter[] }>();
</script>

<template>
  <section :style="{ margin: 'var(--space-8) var(--space-8) var(--space-24)' }">
    <div class="flex items-center justify-between" :style="{ marginBottom: 'var(--space-4)' }">
      <h2 :style="{ fontSize: 'var(--font-size-lg)', fontWeight: 'var(--font-weight-bold)', color: 'var(--color-text-primary)' }">
        القراء الأكثر استماعاً
      </h2>
      <a href="#" :style="{ fontSize: 'var(--font-size-sm)', color: 'var(--color-text-link)' }">عرض الكل</a>
    </div>
    <div class="flex" :style="{ gap: 'var(--space-6)', overflowX: 'auto' }">
      <div v-for="reciter in reciters" :key="reciter.name" class="flex flex-col items-center text-center" :style="{ minWidth: '80px' }">
        <div
          class="flex items-center justify-center"
          :style="{
            width: '64px', height: '64px', borderRadius: 'var(--radius-full)',
            background: 'linear-gradient(160deg, var(--primitive-neutral-700), var(--primitive-neutral-900))',
            color: 'var(--primitive-neutral-0)', fontWeight: 'var(--font-weight-bold)',
            fontSize: 'var(--font-size-lg)', marginBottom: 'var(--space-2)',
          }"
        >
          {{ reciter.name.charAt(0) }}
        </div>
        <span :style="{ fontSize: 'var(--font-size-sm)', color: 'var(--color-text-primary)' }">{{ reciter.name }}</span>
      </div>
    </div>
  </section>
</template>
