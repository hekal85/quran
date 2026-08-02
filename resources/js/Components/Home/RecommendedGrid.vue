<script setup lang="ts">
interface RecommendedItem {
  title: string;
  subtitle: string;
  gradient: string;
}

defineProps<{ items: RecommendedItem[] }>();
</script>

<template>
  <section :style="{ margin: 'var(--space-8) var(--space-8) 0' }">
    <h2 :style="{ fontSize: 'var(--font-size-lg)', fontWeight: 'var(--font-weight-bold)', color: 'var(--color-text-primary)', marginBottom: 'var(--space-4)' }">
      اخترناه لك
    </h2>
    <div class="flex" :style="{ gap: 'var(--space-4)', overflowX: 'auto' }">
      <div
        v-for="item in items"
        :key="item.title"
        class="flex flex-col justify-end"
        :style="{
          minWidth: '160px', height: '140px',
          borderRadius: 'var(--radius-lg)',
          padding: 'var(--space-4)',
          background: item.gradient,
          color: 'var(--primitive-neutral-0)',
        }"
      >
        <p :style="{ fontWeight: 'var(--font-weight-semibold)' }">{{ item.title }}</p>
        <p :style="{ fontSize: 'var(--font-size-xs)', opacity: '0.8' }">{{ item.subtitle }}</p>
      </div>
    </div>
  </section>
</template>
