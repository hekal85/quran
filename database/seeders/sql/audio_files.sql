-- ============================================
-- الملفات الصوتية (باستخدام UUID للحصول على checksum فريد)
-- ============================================

-- 1. تلاوات سورة الفاتحة بأسلوب ترتيل
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,7]",
    "320",
    320,
    120,
    4800000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/hafs/surah_001.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(10,20,30,40,50,60,70)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 1
AND rw.name_english = "Hafs"
AND m.name_english = "Hafs Uthmani"
AND rs.name_english = "Tartil"
AND r.name_english IN ("Abdul Basit", "Mustafa Ismail", "Mohammad Al-Minshawi", "Mahmoud Al-Husary")
LIMIT 10;

-- 2. تلاوات سورة البقرة بأسلوب تجويد
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,286]",
    "192",
    192,
    1800,
    28000000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/hafs/surah_002.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(5,15,25,35,45,55,65)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 2
AND rw.name_english = "Hafs"
AND m.name_english = "Hafs Uthmani"
AND rs.name_english = "Tajweed"
AND r.name_english IN ("Abdul Basit", "Mahmoud Al-Husary", "Mohammad Al-Minshawi")
LIMIT 6;

-- 3. تلاوات سورة الرحمن بأسلوب ترتيل
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,78]",
    "128",
    128,
    600,
    9600000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/hafs/surah_055.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(8,18,28,38,48,58,68)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 55
AND rw.name_english = "Hafs"
AND m.name_english = "Hafs Uthmani"
AND rs.name_english = "Tartil"
AND r.name_english IN ("Abdul Basit", "Mohammad Al-Minshawi", "Mahmoud Al-Husary")
LIMIT 6;

-- 4. تلاوات سورة الملك بأسلوب تجويد
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,30]",
    "320",
    320,
    180,
    7200000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/hafs/surah_067.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(12,22,32,42,52,62,72)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 67
AND rw.name_english = "Hafs"
AND m.name_english = "Hafs Uthmani"
AND rs.name_english = "Tajweed"
AND r.name_english IN ("Abdul Basit", "Mohammad Al-Minshawi")
LIMIT 4;

-- 5. تلاوات بأسلوب "معلم" (بطيء للتكرار)
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,7]",
    "128",
    128,
    240,
    9600000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/teacher/surah_001.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(5,10,15,20,25,30,35)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 1
AND rw.name_english = "Hafs"
AND m.name_english = "Hafs Uthmani"
AND rs.name_english = "Teacher"
AND r.name_english IN ("Mohammad Al-Minshawi", "Mustafa Ismail", "Mahmoud Al-Husary")
LIMIT 6;

-- 6. تلاوات برواية ورش
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,7]",
    "192",
    192,
    130,
    5200000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/warsh/surah_001.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(10,20,30,40,50,60,70)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 1
AND rw.name_english = "Warsh"
AND m.name_english = "Warsh Uthmani"
AND rs.name_english = "Tartil"
AND r.name_english IN ("Abdul Basit", "Mahmoud Al-Husary")
LIMIT 4;

-- 7. تلاوات سورة يس بأسلوب ترتيل
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,83]",
    "192",
    192,
    420,
    8400000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/hafs/surah_036.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(15,25,35,45,55,65,75)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 36
AND rw.name_english = "Hafs"
AND m.name_english = "Hafs Uthmani"
AND rs.name_english = "Tartil"
AND r.name_english IN ("Abdul Basit", "Mahmoud Al-Husary", "Mohammad Al-Minshawi", "Mustafa Ismail")
LIMIT 8;

-- 8. تلاوات سورة الكهف بأسلوب تجويد
INSERT INTO audio_files (
    reciter_id, riwayah_id, moshaf_id, surah_id, recitation_style_id, verses_range,
    quality, bitrate, duration, size, format,
    storage_driver, path, checksum,
    meta_data, is_verified, published_at, created_at, updated_at
)
SELECT 
    r.id,
    rw.id,
    m.id,
    s.id,
    rs.id,
    "[1,110]",
    "320",
    320,
    780,
    15600000,
    "mp3",
    "local",
    CONCAT("/audio/", r.name_english, "/hafs/surah_018.mp3"),
    SHA2(CONCAT(r.id, s.id, UUID()), 256),
    JSON_OBJECT("waveform", JSON_ARRAY(20,30,40,50,60,70,80)),
    1,
    NOW(),
    NOW(),
    NOW()
FROM reciters r
CROSS JOIN surahs s
CROSS JOIN riwayat rw
CROSS JOIN moshafs m
CROSS JOIN recitation_styles rs
WHERE s.surah_number = 18
AND rw.name_english = "Hafs"
AND m.name_english = "Hafs Uthmani"
AND rs.name_english = "Tajweed"
AND r.name_english IN ("Abdul Basit", "Mahmoud Al-Husary")
LIMIT 4;

-- ============================================
-- إجمالي الملفات المضافة: ~48 ملف صوتي
-- ============================================