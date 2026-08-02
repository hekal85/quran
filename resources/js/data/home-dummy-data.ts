// ==================================================================
// بيانات تجريبية (Dummy Data) للصفحة الرئيسية
// ستُستبدل لاحقاً بطلبات فعلية من الـ Backend (Laravel API)
// ==================================================================

export const homeUser = {
  name: 'محمود',
  city: 'القاهرة',
  temperature: 24,
};

export const readingProgress = {
  surah: 'سورة البقرة',
  remaining: 'باقي 4 آيات',
  percent: 96,
};

export const listeningProgress = {
  surah: 'سورة يوسف',
  reciter: 'المنشاوي',
  percent: 38,
};

export const ayahOfDay = {
  text: 'أَلَا بِذِكْرِ اللَّهِ تَطْمَئِنُّ الْقُلُوبُ',
  reference: 'سورة الرعد - الآية 28',
};

// ملاحظة: كل gradient هنا مكانه محدد بوضوح، تقدر تستبدله بصورة حقيقية
// لاحقاً عبر تغيير الخاصية إلى: background-image: url('/path/to/image.jpg')
export const recommendedItems = [
  { title: 'تلاوات خاشعة', subtitle: '32 تلاوة', gradient: 'linear-gradient(160deg, #4b5563, #111827)' },
  { title: 'المصحف المعلم', subtitle: 'مصحف مجود', gradient: 'linear-gradient(160deg, var(--primitive-gold-600), var(--primitive-gold-800))' },
  { title: 'تفسير القرآن', subtitle: 'أشهر التفاسير', gradient: 'linear-gradient(160deg, #475569, #1e293b)' },
  { title: 'قصص الأنبياء', subtitle: '28 قصة', gradient: 'linear-gradient(160deg, var(--primitive-emerald-700), var(--primitive-emerald-900))' },
  { title: 'أسماء الله الحسنى', subtitle: '99 اسم', gradient: 'linear-gradient(160deg, #78350f, #1c1917)' },
];

// أسماء القراء نصوص فقط (بدون صور حقيقية) - أول حرف من الاسم يُستخدم كأفاتار مؤقت
export const topReciters = [
  { name: 'عبد الباسط عبد الصمد' },
  { name: 'المنشاوي' },
  { name: 'الشيخ ماهر المعيقلي' },
  { name: 'سعد الغامدي' },
  { name: 'أحمد العجمي' },
  { name: 'ياسر الدوسري' },
];
