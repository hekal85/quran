-- ============================================
-- أنواع المصاحف (حسب الرواية والخط)
-- ============================================
INSERT INTO moshafs (riwayah_id, name_arabic, name_english, script_type, total_pages, total_lines_per_page, is_active, created_at, updated_at) VALUES
((SELECT id FROM riwayat WHERE name_english = "Hafs" LIMIT 1), "مصحف حفص - الخط العثماني", "Hafs Uthmani", "Uthmani", 604, 15, 1, NOW(), NOW()),
((SELECT id FROM riwayat WHERE name_english = "Hafs" LIMIT 1), "مصحف حفص - الخط البسيط", "Hafs Simple", "Simple", 604, 15, 1, NOW(), NOW()),
((SELECT id FROM riwayat WHERE name_english = "Warsh" LIMIT 1), "مصحف ورش - الخط العثماني", "Warsh Uthmani", "Uthmani", 604, 15, 1, NOW(), NOW()),
((SELECT id FROM riwayat WHERE name_english = "Qalon" LIMIT 1), "مصحف قالون - الخط العثماني", "Qalon Uthmani", "Uthmani", 604, 15, 1, NOW(), NOW()),
((SELECT id FROM riwayat WHERE name_english = "Al-Duri" LIMIT 1), "مصحف الدوري - الخط العثماني", "Al-Duri Uthmani", "Uthmani", 604, 15, 1, NOW(), NOW()),
((SELECT id FROM riwayat WHERE name_english = "Hafs" LIMIT 1), "مصحف المدينة النبوية", "Madinah Moshaf", "Uthmani", 604, 15, 1, NOW(), NOW()),
((SELECT id FROM riwayat WHERE name_english = "Hafs" LIMIT 1), "مصحف مجمع الملك فهد", "King Fahd Moshaf", "Uthmani", 604, 15, 1, NOW(), NOW()),
((SELECT id FROM riwayat WHERE name_english = "Hafs" LIMIT 1), "مصحف التجويد الملون", "Tajweed Colored", "Uthmani", 604, 15, 1, NOW(), NOW());