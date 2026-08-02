# مشروع: منصة القرآن الكريم العالمية

> هذا الملف هو المرجع الرسمي للمشروع. عند بدء أي محادثة جديدة،
> ارفع هذا الملف أولاً حتى يتم استكمال العمل من نفس النقطة.

---

## 1. الرؤية (Vision)

بناء أفضل منصة عالمية للقرآن الكريم، بجودة تصميم تضاهي
Spotify و Apple Music و Apple VisionOS.

**المتطلبات الأساسية:**
- سريعة جداً وقابلة للتوسع لسنوات (Production Ready)
- تعمل على Web / Android / iOS
- متعددة اللغات (12 لغة) مع دعم كامل RTL / LTR
- تصميم Premium (Glass Morphism, Soft Shadows, Apple-like Motion)

---

## 2. Tech Stack

| الطبقة       | التقنية        |
|--------------|----------------|
| Backend      | Laravel 13     |
| Frontend     | Vue 3 + TypeScript |
| Bridge       | Inertia.js     |
| Build Tool   | Vite           |
| Styling      | Tailwind CSS v4|
| State        | Pinia          |
| Runtime      | PHP 8.3 / Node.js |

---

## 3. الهوية البصرية (UI Style)

- Glass Morphism
- Soft Shadows
- Smooth / Apple-like Motion
- VisionOS Feeling
- Spotify-level Simplicity
- Minimal / Modern / Elegant

---

## 4. نظام التوطين (Localization)

- 12 لغة، كل لغة تحدد تلقائياً: الخط (Font) / الاتجاه (Direction) /
  الترجمات (Translations) / اللوكال (Locale).
- **قاعدة صارمة:** ممنوع أي `if(language == "ar")` داخل المكونات.
  كل شيء يمر عبر نظام موحّد (data-locale / data-dir على وسم html
  + composable مركزي مثل useLocale).
- خط العربية: **Cairo**. خطوط اللغات الأخرى مختارة حسب الأنسب لكل لغة
  (Inter / Noto Nastaliq Urdu / Vazirmatn / Noto Sans Bengali /
  Noto Sans Devanagari / Noto Sans SC).
- نص المصحف نفسه له خط عثماني مستقل (Hafs) بمعزل عن لغة الواجهة.

---

## 5. حالة الإنجاز الحالية (Milestone Status)

### ✅ Milestone 1 - Design Tokens System (مكتمل)

الملف: `resources/js/design/styles/variables.css`

تم بناؤه عبر 5 سكربتات PowerShell:

| # | السكربت | المحتوى | الحالة |
|---|---------|---------|--------|
| 1 | `01-setup-and-colors.ps1` | بنية المجلدات + Color System (Light/Dark) | ✅ |
| 2 | `02-typography-and-radius.ps1` | Typography (12 لغة) + Radius System | ✅ |
| 3 | `03-shadows-and-blur.ps1` | Shadow System + Blur System (Glass) | ✅ |
| 4 | `04-spacing-and-breakpoints.ps1` | Spacing + Breakpoints + Motion/Easing | ✅ |
| 5 | `05-project-reference.ps1` | هذا الملف المرجعي | ✅ |

**الأنظمة المُنجزة داخل variables.css:**
- Color System: `var(--color-text-primary)` وأخواتها (طبقتين: primitive + semantic، مع دعم كامل لـ dark theme عبر `[data-theme="dark"]`)
- Radius System: `var(--radius-xl)` (مقياس مسمّى من xs إلى full)
- Shadow System: `var(--shadow-glass)` (ظلال طبقية ناعمة + ظلال زجاجية)
- Blur System: `var(--glass-blur)` (مقياس مسمّى sm/base/lg/xl)
- Spacing: `var(--space-6)` (مقياس مبني على 4px، بأسماء خطوات وليس أرقام حرة)
- Breakpoints: مسماة (mobile/tablet/desktop/wide/ultrawide) - موثقة في CSS ومطلوب تكرارها في `tokens/breakpoints.ts`
- إضافات تكميلية: Motion/Easing tokens + Z-index scale (لازمة لـ Apple-like Motion ولتفادي فوضى الـ z-index)

### ⬜ Milestone 2 - Breakpoints Runtime Bridge (لم يبدأ)
إنشاء `resources/js/design/tokens/breakpoints.ts` بنفس القيم
الموثقة في CSS، ليُستخدم في Tailwind config وفي أي منطق JS/TS
يحتاج معرفة الـ breakpoint الحالي (matchMedia composable).

### ⬜ Milestone 3 - Locale Engine (لم يبدأ)
بناء composable `useLocale` + ملف تعريف اللغات الـ12 (كود اللغة،
الاسم، الاتجاه، اسم الخط) + منطق ضبط `data-locale` و `data-dir`
على `<html>` تلقائياً دون أي شرط داخل المكونات.

### ⬜ Milestone 4 - تحويل تصميم الشاشة الرئيسية (Today) إلى كود
تحويل تصميم HTML + CSS الذي أُرسل كمرجع بصري إلى:
1. HTML + CSS مستقل (proof of concept)
2. مكونات Vue (Components) قابلة لإعادة الاستخدام
3. ربطها بـ Vue + Inertia
4. التكامل مع Laravel (Controllers / Routes / Data)
5. اختبار الأداء والاستجابة (Responsive testing)

---

## 6. قواعد صارمة يجب الالتزام بها دائماً

1. لا قيم مباشرة (hardcoded) في أي مكون - كل شيء عبر `var(--token)`.
2. لا `if(language == ...)` في أي مكون - النظام يقرر تلقائياً.
3. أي إضافة جديدة للـ Design Tokens يجب أن تتبع نفس النمط:
   Primitive value -> Semantic token.
4. كل مكون يجب أن يعمل بصرياً في كل من Light/Dark وفي RTL/LTR
   دون أي تعديل في كوده.

---

## 7. كيفية الاستكمال في محادثة جديدة

عند العودة لاستكمال هذا المشروع، ارفع هذا الملف وقل:
"كمّل من Milestone [رقم الـ Milestone] في PROJECT_REFERENCE.md"،
وسيتم استكمال العمل بنفس المعايير والقواعد الموثقة أعلاه.

آخر تحديث: يُنشأ تلقائياً عند تشغيل هذا السكربت.

---

## Milestone 2 - Project Foundation Setup (مكتمل)

تم تأسيس المشروع فعلياً عبر 5 سكربتات (06 إلى 10):

| # | السكربت | المحتوى | الحالة |
|---|---------|---------|--------|
| 6 | `06-create-laravel-project.ps1` | تثبيت Laravel + inertiajs/inertia-laravel + HandleInertiaRequests Middleware | ✅ |
| 7 | `07-install-frontend-packages.ps1` | Vue 3, @inertiajs/vue3, Pinia, TypeScript, Tailwind v4 | ✅ |
| 8 | `08-configure-vite-typescript-tailwind.ps1` | vite.config.ts, tsconfig.json, ربط app.css بـ variables.css | ✅ |
| 9 | `09-configure-inertia-app-entry.ps1` | app.ts, app.blade.php, routes/web.php, صفحة Home.vue تجريبية | ✅ |
| 10 | `10-verify-and-run.ps1` | هذا التحقق + تحديث هذا الملف | ✅ |

**تم التأكد من:**
- Laravel يعمل ومربوط بـ Inertia من جهة الـ Backend.
- Vue 3 + TypeScript + Pinia مربوطين من جهة الـ Frontend.
- Tailwind v4 يستورد `variables.css` بنجاح (نفس الملف من Milestone 1، لم يُعَدَّل).
- صفحة `Home.vue` التجريبية تثبت حياً أن الألوان / الظلال / الزجاج (Glass) /
  الخطوط / المسافات تعمل جميعاً عبر `var(--token)`، وأن التبديل بين
  Light/Dark يعمل فعلياً عبر `data-theme` على وسم `<html>`.

### ⬜ Milestone 3 - Locale Engine (التالي)
بناء `resources/js/design/tokens/breakpoints.ts` + composable
`useLocale` لتفعيل نظام الـ12 لغة فعلياً (data-locale / data-dir
تلقائياً بدل القيمة الثابتة "light" الموجودة الآن في app.blade.php).

### ملاحظة: خطة موسّعة مستقبلية
تم استلام مستند "الخطة الشاملة الكاملة لمشروع Quran" ويحتوي على رؤية
أوسع بكثير (20 رواية، تفاسير متعددة، AI Recommendations، Emotion
Mapping، Riwaya Genetics، Geo-Mapping، Blockchain Verification،
تطبيق موبايل native، إلخ) مقسّمة على 6 مراحل (MVP Phase 1 إلى Phase 6).
هذا المستند **مرجع لمراحل لاحقة جداً** ولا يُبنى منه شيء الآن.
الأولوية الحالية والصحيحة هي استكمال الأساس (Milestone 3 فما بعد)
قبل أي توسع في المحتوى أو الذكاء الاصطناعي.

---

## Milestone 3 - Homepage UI (مكتمل)

تم بناء الصفحة الرئيسية مطابقة لتصميم الصورة المرجعية (نسخة الويب فقط
حالياً)، عبر 4 سكربتات (11 إلى 14):

| # | السكربت | المحتوى | الحالة |
|---|---------|---------|--------|
| 11 | `11-install-ui-dependencies.ps1` | lucide-vue-next + خطوط Cairo/Inter عبر Google Fonts | ✅ |
| 12 | `12-create-home-components-part1.ps1` | بيانات تجريبية + TopBar + QuickActionsHub + TodayCards | ✅ |
| 13 | `13-create-home-components-part2.ps1` | AyahOfDayBanner + RecommendedGrid + TopReciters + BottomNav | ✅ |
| 14 | `14-assemble-home-page-and-verify.ps1` | تجميع Home.vue + تحقق نهائي + هذا التحديث | ✅ |

**قرار مهم موثّق:** الصور الفوتوغرافية (خلفية المسجد، الشلال) وصور
القراء الحقيقية استُبدلت بـ Gradients من نفس نظام الألوان + أفاتار
بأول حرف من الاسم، لتفادي استخدام صور غير مرخّصة أو صور أشخاص
حقيقيين. باقي عناصر التصميم (التخطيط، الأزرار الدائرية الستة،
البطاقات الثلاث، آية اليوم، اخترناه لك، القراء، شريط التنقل) مطابقة
100% للصورة المرجعية. أماكن الصور الحقيقية موثّقة في الكود ويمكن
استبدالها لاحقاً بسطر واحد لكل مكان.

كل المكونات مبنية فوق نظام الـ Design Tokens من Milestone 1 (بدون أي
قيمة لون/مسافة/ظل مباشرة في الكود).

### ⬜ Milestone 4 - التالي (اقتراح)
- نسخة الموبايل (Responsive) لنفس الصفحة الرئيسية.
- `useLocale` composable لتفعيل الـ12 لغة فعلياً على الصفحة.
- ربط الصفحة ببيانات حقيقية من Laravel بدل الـ dummy data.
