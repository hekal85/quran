<script setup lang="ts">
import { MoreHorizontal, Bookmark, Library, Search, BookOpen, Home } from 'lucide-vue-next';
</script>

<template>
  <nav
    class="flex items-center justify-around"
    :style="{
      position: 'fixed', bottom: '0', left: '0', right: '0',
      background: 'var(--color-bg-elevated)',
      boxShadow: 'var(--shadow-lg)',
      padding: 'var(--space-3) var(--space-6)',
      zIndex: 'var(--z-sticky)',
    }"
  >
    <button class="flex flex-col items-center" :style="{ background: 'none', border: 'none', color: 'var(--color-text-tertiary)', gap: '2px' }">
      <MoreHorizontal :size="20" />
      <span :style="{ fontSize: '11px' }">المزيد</span>
    </button>
    <button class="flex flex-col items-center" :style="{ background: 'none', border: 'none', color: 'var(--color-text-tertiary)', gap: '2px' }">
      <Bookmark :size="20" />
      <span :style="{ fontSize: '11px' }">المجموعات</span>
    </button>
    <button class="flex flex-col items-center" :style="{ background: 'none', border: 'none', color: 'var(--color-text-tertiary)', gap: '2px' }">
      <Library :size="20" />
      <span :style="{ fontSize: '11px' }">المكتبة</span>
    </button>
    <button
      class="flex flex-col items-center justify-center"
      :style="{
        width: '52px', height: '52px', borderRadius: 'var(--radius-full)',
        background: 'var(--color-brand-primary)', color: 'var(--color-text-inverse)',
        marginTop: '-24px', boxShadow: 'var(--shadow-glow-primary)', border: '4px solid var(--color-bg-elevated)',
      }"
    >
      <Home :size="20" />
    </button>
    <button class="flex flex-col items-center" :style="{ background: 'none', border: 'none', color: 'var(--color-text-tertiary)', gap: '2px' }">
      <Search :size="20" />
      <span :style="{ fontSize: '11px' }">البحث</span>
    </button>
    <button class="flex flex-col items-center" :style="{ background: 'none', border: 'none', color: 'var(--color-text-tertiary)', gap: '2px' }">
      <BookOpen :size="20" />
      <span :style="{ fontSize: '11px' }">المصحف</span>
    </button>
  </nav>
</template>
