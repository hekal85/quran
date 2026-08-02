<script setup lang="ts">
import { Bell, Cloud } from 'lucide-vue-next';

defineProps<{
  userName: string;
  city: string;
  temperature: number;
}>();
</script>

<template>
  <header class="flex items-center justify-between" :style="{ padding: 'var(--space-6) var(--space-8) 0' }">
    <div class="flex items-center gap-2" :style="{ color: 'var(--color-text-secondary)' }">
      <Cloud :size="20" />
      <div class="text-sm leading-tight">
        <div :style="{ fontWeight: 'var(--font-weight-semibold)', color: 'var(--color-text-primary)' }">{{ temperature }}°</div>
        <div>{{ city }}</div>
      </div>
    </div>

    <div class="text-center">
      <h1 :style="{ fontSize: 'var(--font-size-xl)', fontWeight: 'var(--font-weight-bold)', color: 'var(--color-text-primary)' }">
        صباح الخير يا {{ userName }} 🌿
      </h1>
      <p :style="{ color: 'var(--color-text-secondary)', fontSize: 'var(--font-size-sm)' }">
        نسأل الله أن يجعل يومك مباركاً
      </p>
    </div>

    <button
      class="flex items-center justify-center"
      :style="{
        width: '44px',
        height: '44px',
        borderRadius: 'var(--radius-full)',
        background: 'var(--color-glass-surface)',
        boxShadow: 'var(--shadow-sm)',
        border: '1px solid var(--color-glass-border)',
      }"
    >
      <Bell :size="20" :style="{ color: 'var(--color-text-secondary)' }" />
    </button>
  </header>
</template>
