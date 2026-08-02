<script setup lang="ts">
import { BookOpen, Search, Radio, Headphones, BookMarked, Globe2, ChevronDown } from 'lucide-vue-next';

interface QuickAction {
  icon: any;
  label: string;
  sublabel: string;
}

const leftActions: QuickAction[] = [
  { icon: BookOpen, label: 'أقرأ', sublabel: 'المصحف' },
  { icon: Search, label: 'أبحث', sublabel: 'عن أي شيء' },
  { icon: Radio, label: 'راديو', sublabel: 'إذاعات مباشرة' },
];

const rightActions: QuickAction[] = [
  { icon: Headphones, label: 'أستمع', sublabel: 'القراء والتلاوات' },
  { icon: BookMarked, label: 'أتدبر', sublabel: 'تفسير وعلوم' },
  { icon: Globe2, label: 'تعرف', sublabel: 'على الإسلام' },
];
</script>

<template>
  <div class="relative flex items-center justify-center qa-wrapper" :style="{ padding: 'var(--space-10) var(--space-8)' }">
    <div class="flex flex-col gap-6" :style="{ marginInlineEnd: 'var(--space-10)' }">
      <button
        v-for="action in leftActions"
        :key="action.label"
        class="flex flex-col items-center justify-center text-center"
        :style="{
          width: '92px',
          height: '92px',
          borderRadius: 'var(--radius-full)',
          background: 'var(--color-glass-surface)',
          boxShadow: 'var(--shadow-glass)',
          border: '1px solid var(--color-glass-border)',
        }"
      >
        <component :is="action.icon" :size="20" :style="{ color: 'var(--color-brand-primary)' }" />
        <span :style="{ fontSize: 'var(--font-size-xs)', fontWeight: 'var(--font-weight-semibold)', color: 'var(--color-text-primary)', marginTop: 'var(--space-1)' }">{{ action.label }}</span>
        <span :style="{ fontSize: '10px', color: 'var(--color-text-tertiary)' }">{{ action.sublabel }}</span>
      </button>
    </div>

    <div
      class="flex flex-col items-center justify-center text-center qa-center-circle"
      :style="{
        width: '320px',
        height: '320px',
        borderRadius: 'var(--radius-full)',
        background: 'var(--color-glass-surface-strong)',
        boxShadow: 'var(--shadow-glass)',
        border: '1px solid var(--color-glass-border)',
        padding: 'var(--space-8)',
      }"
    >
      <p :style="{ fontSize: 'var(--font-size-lg)', fontWeight: 'var(--font-weight-bold)', color: 'var(--color-text-primary)', marginBottom: 'var(--space-4)', lineHeight: 'var(--line-height-tight)' }">
        ماذا تريد أن تفعل مع القرآن اليوم؟
      </p>
      <div
        class="flex items-center w-full"
        :style="{
          background: 'var(--color-bg-base)',
          borderRadius: 'var(--radius-full)',
          padding: 'var(--space-3) var(--space-5)',
          boxShadow: 'var(--shadow-sm)',
        }"
      >
        <span :style="{ color: 'var(--color-text-tertiary)', fontSize: 'var(--font-size-sm)', flex: '1', textAlign: 'right' }">
          ابحث عن آية... أو كلمة... أو قارئ...
        </span>
        <Search :size="18" :style="{ color: 'var(--color-text-tertiary)' }" />
      </div>
      <ChevronDown :size="18" :style="{ color: 'var(--color-text-tertiary)', marginTop: 'var(--space-3)' }" />
    </div>

    <div class="flex flex-col gap-6" :style="{ marginInlineStart: 'var(--space-10)' }">
      <button
        v-for="action in rightActions"
        :key="action.label"
        class="flex flex-col items-center justify-center text-center"
        :style="{
          width: '92px',
          height: '92px',
          borderRadius: 'var(--radius-full)',
          background: 'var(--color-glass-surface)',
          boxShadow: 'var(--shadow-glass)',
          border: '1px solid var(--color-glass-border)',
        }"
      >
        <component :is="action.icon" :size="20" :style="{ color: 'var(--color-brand-primary)' }" />
        <span :style="{ fontSize: 'var(--font-size-xs)', fontWeight: 'var(--font-weight-semibold)', color: 'var(--color-text-primary)', marginTop: 'var(--space-1)' }">{{ action.label }}</span>
        <span :style="{ fontSize: '10px', color: 'var(--color-text-tertiary)' }">{{ action.sublabel }}</span>
      </button>
    </div>
  </div>
</template>

<style scoped>
@media (max-width: 767px) {
  .qa-wrapper {
    flex-wrap: wrap;
    gap: var(--space-4);
    padding: var(--space-6) var(--space-4) !important;
  }
  .qa-center-circle {
    width: 100% !important;
    max-width: 280px !important;
    height: auto !important;
    aspect-ratio: 1 / 1;
    padding: var(--space-6) !important;
    order: -1;
  }
  .qa-center-circle p {
    font-size: var(--font-size-base) !important;
  }
}
</style>
