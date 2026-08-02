<script setup lang="ts">
import { Heart, Headphones, BookOpen, Share2 } from 'lucide-vue-next';

defineProps<{
  ayahText: string;
  reference: string;
}>();
</script>

<template>
  <section
    class="flex items-center justify-between"
    :style="{
      margin: 'var(--space-6) var(--space-8) 0',
      padding: 'var(--space-10) var(--space-8)',
      borderRadius: 'var(--radius-3xl)',
      background: 'radial-gradient(160% 100% at 100% 0%, rgba(251,191,36,0.30), transparent 55%), linear-gradient(135deg, var(--primitive-emerald-50), var(--primitive-gold-50))',
      border: '1px solid rgba(255,255,255,0.6)',
      boxShadow: 'var(--shadow-lg)',
    }"
  >
    <button :style="{ color: 'var(--color-text-tertiary)', background: 'none', border: 'none' }">
      <Heart :size="20" />
    </button>

    <div class="text-center" :style="{ flex: '1' }">
      <p :style="{ fontSize: 'var(--font-size-xl)', fontWeight: 'var(--font-weight-semibold)', color: 'var(--color-mushaf-text)', lineHeight: 'var(--line-height-mushaf)' }">
        ﴿ {{ ayahText }} ﴾
      </p>
      <p :style="{ fontSize: 'var(--font-size-sm)', color: 'var(--color-text-secondary)', marginTop: 'var(--space-2)' }">{{ reference }}</p>
    </div>

    <div class="flex items-center" :style="{ gap: 'var(--space-4)', color: 'var(--color-text-secondary)' }">
      <button :style="{ background: 'none', border: 'none', display: 'flex', flexDirection: 'column', alignItems: 'center', gap: '2px' }">
        <Headphones :size="18" />
        <span :style="{ fontSize: '11px' }">استمع</span>
      </button>
      <button :style="{ background: 'none', border: 'none', display: 'flex', flexDirection: 'column', alignItems: 'center', gap: '2px' }">
        <BookOpen :size="18" />
        <span :style="{ fontSize: '11px' }">تفسير</span>
      </button>
      <button :style="{ background: 'none', border: 'none', display: 'flex', flexDirection: 'column', alignItems: 'center', gap: '2px' }">
        <Share2 :size="18" />
        <span :style="{ fontSize: '11px' }">مشاركة</span>
      </button>
    </div>
  </section>
</template>

