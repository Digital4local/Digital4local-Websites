<?php
/**
 * Digital4Local - Unified Database Engine (PDO MySQL & SQLite)
 * Provides centralized DB connection, automatic table creation, initial data migration,
 * and high-performance CRUD functions for Pages, Blogs, Leads, Settings, and Authentication.
 */

require_once __DIR__ . '/../config/database.php';

if (!function_exists('get_db')) {
    /**
     * Returns singleton PDO database instance
     */
    function get_db() {
        static $pdo = null;
        static $driver_used = null;
        if ($pdo !== null) {
            return $pdo;
        }

        $config = require __DIR__ . '/../config/database.php';
        $driver = strtolower($config['driver'] ?? 'mysql');

        // 1. Attempt MySQL Connection if selected
        if ($driver === 'mysql') {
            $my = $config['mysql'];
            $host = $my['host'] ?? '127.0.0.1';
            $port = $my['port'] ?? 3306;
            $dbname = $my['database'] ?? 'digital4local_db';
            $user = $my['username'] ?? 'root';
            $pass = $my['password'] ?? '';
            $charset = $my['charset'] ?? 'utf8mb4';

            try {
                $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}";
                $pdo = new PDO($dsn, $user, $pass, $my['options'] ?? []);
                $driver_used = 'mysql';
            } catch (PDOException $e) {
                // If database doesn't exist (error 1049), try creating it automatically
                if (strpos($e->getMessage(), 'Unknown database') !== false || $e->getCode() == 1049) {
                    try {
                        $dsn_no_db = "mysql:host={$host};port={$port};charset={$charset}";
                        $root_pdo = new PDO($dsn_no_db, $user, $pass, $my['options'] ?? []);
                        $root_pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbname}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                        unset($root_pdo);

                        $pdo = new PDO($dsn, $user, $pass, $my['options'] ?? []);
                        $driver_used = 'mysql';
                    } catch (Exception $ex) {
                        // Fallback to SQLite if MySQL permission denied
                        $pdo = null;
                    }
                } else {
                    $pdo = null;
                }
            }
        }

        // 2. Fallback to SQLite if MySQL failed or driver was sqlite
        if ($pdo === null) {
            $sq = $config['sqlite'] ?? ['path' => __DIR__ . '/../config/database.sqlite'];
            $sqlite_path = $sq['path'];
            $dir = dirname($sqlite_path);
            if (!is_dir($dir)) {
                @mkdir($dir, 0775, true);
            }
            $pdo = new PDO("sqlite:" . $sqlite_path, null, null, $sq['options'] ?? [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            $driver_used = 'sqlite';
        }

        // 3. Initialize schema and seed data if not yet present
        init_db_schema($pdo, $driver_used);

        return $pdo;
    }
}

/**
 * Initializes tables and seeds existing JSON data seamlessly
 */
if (!function_exists('init_db_schema')) {
    function init_db_schema(PDO $pdo, $driver = 'mysql') {
        static $initialized = false;
        if ($initialized) return;

        $is_mysql = ($driver === 'mysql');
        $pk_def = $is_mysql ? "INT AUTO_INCREMENT PRIMARY KEY" : "INTEGER PRIMARY KEY AUTOINCREMENT";
        $text_type = $is_mysql ? "LONGTEXT" : "TEXT";

        // Table 1: admins
        $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
            id {$pk_def},
            admin_id VARCHAR(50) UNIQUE,
            username VARCHAR(100) UNIQUE,
            email VARCHAR(191) UNIQUE,
            password_hash VARCHAR(255) NOT NULL,
            name VARCHAR(100),
            role VARCHAR(50) DEFAULT 'Super Admin',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Table 2: blog_posts
        $pdo->exec("CREATE TABLE IF NOT EXISTS blog_posts (
            id {$pk_def},
            slug VARCHAR(191) UNIQUE,
            title VARCHAR(255) NOT NULL,
            category VARCHAR(100) DEFAULT 'Local SEO',
            status VARCHAR(50) DEFAULT 'published',
            author VARCHAR(100) DEFAULT 'Abhishek Raikwar',
            author_title VARCHAR(255) DEFAULT 'Founder, Digital4Local',
            date DATE,
            read_time VARCHAR(50) DEFAULT '6 Min Read',
            featured_image VARCHAR(255),
            excerpt TEXT,
            content_html {$text_type},
            highlights TEXT,
            faqs {$text_type},
            focus_keyword VARCHAR(255),
            meta_title VARCHAR(255),
            meta_description TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Table 3: pages
        $pdo->exec("CREATE TABLE IF NOT EXISTS pages (
            id {$pk_def},
            page_key VARCHAR(100) UNIQUE,
            page_type VARCHAR(50) DEFAULT 'standard',
            title VARCHAR(255),
            url VARCHAR(255),
            status VARCHAR(50) DEFAULT 'published',
            badge VARCHAR(100),
            hero_title VARCHAR(255),
            hero_highlight VARCHAR(255),
            hero_subheading TEXT,
            meta_title VARCHAR(255),
            meta_description TEXT,
            focus_keyword VARCHAR(255),
            featured_image VARCHAR(255),
            content_html {$text_type},
            faqs {$text_type},
            custom_data {$text_type},
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Table 4: site_settings
        $pdo->exec("CREATE TABLE IF NOT EXISTS site_settings (
            id {$pk_def},
            setting_key VARCHAR(100) UNIQUE,
            setting_value {$text_type},
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Table 5: leads
        $pdo->exec("CREATE TABLE IF NOT EXISTS leads (
            id {$pk_def},
            lead_id VARCHAR(100) UNIQUE,
            name VARCHAR(100),
            email VARCHAR(191),
            phone VARCHAR(50),
            company VARCHAR(150),
            website VARCHAR(255),
            industry VARCHAR(100),
            source VARCHAR(100),
            message TEXT,
            ip_address VARCHAR(50),
            status VARCHAR(50) DEFAULT 'New',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Table 6: security_lockouts
        $pdo->exec("CREATE TABLE IF NOT EXISTS security_lockouts (
            id {$pk_def},
            lockout_key VARCHAR(100) UNIQUE,
            ip_address VARCHAR(50),
            identifier VARCHAR(100),
            attempts INT DEFAULT 0,
            last_attempt_time INT DEFAULT 0,
            first_attempt_time INT DEFAULT 0,
            locked_until INT DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Table 7: location_pages
        $pdo->exec("CREATE TABLE IF NOT EXISTS location_pages (
            id {$pk_def},
            slug VARCHAR(191) UNIQUE,
            city VARCHAR(100) DEFAULT 'Bhopal',
            state VARCHAR(100) DEFAULT 'Madhya Pradesh',
            country VARCHAR(100) DEFAULT 'India',
            is_hub TINYINT(1) DEFAULT 0,
            schema_type VARCHAR(100) DEFAULT 'ProfessionalService',
            h1 VARCHAR(255) NOT NULL,
            badge VARCHAR(255),
            hero_direct_answer TEXT,
            hero_subtitle TEXT,
            hero_motif VARCHAR(50) DEFAULT 'combined',
            last_updated VARCHAR(50),
            primary_keyword VARCHAR(255),
            meta_title VARCHAR(255),
            meta_description TEXT,
            related_slugs TEXT,
            recent_insights_tags TEXT,
            cta TEXT,
            author TEXT,
            sections {$text_type},
            faqs {$text_type},
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Seed initial data from JSON if tables are empty
        seed_db_from_json($pdo);

        $initialized = true;
    }
}

/**
 * Seeds Database from existing JSON files on first run
 */
if (!function_exists('seed_db_from_json')) {
    function seed_db_from_json(PDO $pdo) {
        $settings_file = __DIR__ . '/../config/site_settings.json';
        $auth_file = __DIR__ . '/../config/admin_auth.json';
        $leads_file = __DIR__ . '/../config/leads.json';

        // 1. Seed Admins
        $stmt = $pdo->query("SELECT COUNT(*) FROM admins");
        if ((int)$stmt->fetchColumn() === 0 && file_exists($auth_file)) {
            $auth_raw = @file_get_contents($auth_file);
            $auth_data = @json_decode($auth_raw, true);
            if (!empty($auth_data['users'])) {
                $ins = $pdo->prepare("INSERT INTO admins (admin_id, username, email, password_hash, name, role) VALUES (?, ?, ?, ?, ?, ?)");
                foreach ($auth_data['users'] as $u) {
                    $ins->execute([
                        $u['id'] ?? 'USR-001',
                        $u['username'] ?? 'admin',
                        $u['email'] ?? 'admin@digital4local.com',
                        $u['password_hash'] ?? '',
                        $u['name'] ?? 'Abhishek Raikwar',
                        $u['role'] ?? 'Super Admin'
                    ]);
                }
            }
        }

        // 2. Seed Site Settings, Pages, and Blog Posts from site_settings.json
        if (file_exists($settings_file)) {
            $settings_raw = @file_get_contents($settings_file);
            $settings = @json_decode($settings_raw, true) ?: [];

            // Seed Global Settings Sections
            $stmt = $pdo->query("SELECT COUNT(*) FROM site_settings");
            if ((int)$stmt->fetchColumn() === 0) {
                $ins_setting = $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value) VALUES (?, ?)");
                $sections = ['brand', 'hero', 'contact', 'pricing', 'seo', 'footer', 'active_page_key'];
                foreach ($sections as $sec) {
                    if (isset($settings[$sec])) {
                        $ins_setting->execute([$sec, json_encode($settings[$sec], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)]);
                    }
                }
            }

            // Seed Pages
            $stmt = $pdo->query("SELECT COUNT(*) FROM pages");
            if ((int)$stmt->fetchColumn() === 0 && !empty($settings['pages'])) {
                $ins_page = $pdo->prepare("INSERT INTO pages (page_key, page_type, title, url, status, badge, hero_title, hero_highlight, hero_subheading, meta_title, meta_description, focus_keyword, featured_image, content_html, faqs) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                foreach ($settings['pages'] as $pk => $p) {
                    $ptype = (strpos($pk, 'custom_') === 0) ? 'custom' : ((strpos($pk, 'services_') === 0) ? 'service' : ((strpos($pk, 'industries_') === 0) ? 'industry' : 'standard'));
                    $faqs_json = isset($p['faqs']) ? (is_string($p['faqs']) ? $p['faqs'] : json_encode($p['faqs'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) : '[]';

                    $ins_page->execute([
                        $pk,
                        $ptype,
                        $p['title'] ?? ucwords(str_replace(['services_', 'industries_', '_', '-'], ' ', $pk)),
                        $p['url'] ?? '',
                        $p['status'] ?? 'published',
                        $p['badge'] ?? '',
                        $p['hero_title'] ?? '',
                        $p['hero_highlight'] ?? '',
                        $p['hero_subheading'] ?? '',
                        $p['meta_title'] ?? '',
                        $p['meta_description'] ?? '',
                        $p['focus_keyword'] ?? '',
                        $p['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png',
                        $p['content_html'] ?? '',
                        $faqs_json
                    ]);
                }
            }

            // Seed Blog Posts
            $stmt = $pdo->query("SELECT COUNT(*) FROM blog_posts");
            if ((int)$stmt->fetchColumn() === 0 && !empty($settings['blog_posts'])) {
                $ins_blog = $pdo->prepare("INSERT INTO blog_posts (slug, title, category, status, author, author_title, date, read_time, featured_image, excerpt, content_html, highlights, faqs, focus_keyword, meta_title, meta_description) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                foreach ($settings['blog_posts'] as $b) {
                    $slug = $b['slug'] ?? '';
                    if (empty($slug)) continue;

                    $hl_json = isset($b['highlights']) ? (is_array($b['highlights']) ? json_encode($b['highlights'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$b['highlights']) : '[]';
                    $faqs_json = isset($b['faqs']) ? (is_array($b['faqs']) ? json_encode($b['faqs'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$b['faqs']) : '[]';

                    $ins_blog->execute([
                        $slug,
                        $b['title'] ?? 'Untitled Article',
                        $b['category'] ?? 'Local SEO',
                        $b['status'] ?? 'published',
                        $b['author'] ?? 'Abhishek Raikwar',
                        $b['author_title'] ?? 'Founder, Digital4Local',
                        $b['date'] ?? date('Y-m-d'),
                        $b['read_time'] ?? '6 Min Read',
                        $b['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png',
                        $b['excerpt'] ?? '',
                        $b['content_html'] ?? '',
                        $hl_json,
                        $faqs_json,
                        $b['focus_keyword'] ?? '',
                        $b['meta_title'] ?? '',
                        $b['meta_description'] ?? ''
                    ]);
                }
            }
        }

        // 3. Seed Leads
        $stmt = $pdo->query("SELECT COUNT(*) FROM leads");
        if ((int)$stmt->fetchColumn() === 0 && file_exists($leads_file)) {
            $leads_raw = @file_get_contents($leads_file);
            $leads_data = @json_decode($leads_raw, true) ?: [];
            if (!empty($leads_data) && is_array($leads_data)) {
                $ins_lead = $pdo->prepare("INSERT INTO leads (lead_id, name, email, phone, company, website, industry, source, message, ip_address, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                foreach ($leads_data as $l) {
                    $ins_lead->execute([
                        $l['id'] ?? ('LEAD-' . bin2hex(random_bytes(4))),
                        $l['name'] ?? '',
                        $l['email'] ?? '',
                        $l['phone'] ?? '',
                        $l['company'] ?? '',
                        $l['website'] ?? '',
                        $l['industry'] ?? 'General',
                        $l['source'] ?? 'Lead Form',
                        $l['message'] ?? '',
                        $l['ip_address'] ?? '127.0.0.1',
                        $l['status'] ?? 'New',
                        $l['date'] ?? date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        // 4. Seed Location Cluster Pages
        $stmt = $pdo->query("SELECT COUNT(*) FROM location_pages");
        if ((int)$stmt->fetchColumn() === 0) {
            $data_dir = __DIR__ . '/../data';
            if (is_dir($data_dir)) {
                $cities = scandir($data_dir);
                $ins_loc = $pdo->prepare("INSERT INTO location_pages (slug, city, state, country, is_hub, schema_type, h1, badge, hero_direct_answer, hero_subtitle, hero_motif, last_updated, primary_keyword, meta_title, meta_description, related_slugs, recent_insights_tags, cta, author, sections, faqs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                foreach ($cities as $c) {
                    if ($c === '.' || $c === '..' || !is_dir($data_dir . '/' . $c)) continue;
                    $files = scandir($data_dir . '/' . $c);
                    foreach ($files as $f) {
                        if (substr($f, -5) === '.json') {
                            $raw = @file_get_contents($data_dir . '/' . $c . '/' . $f);
                            $d = @json_decode($raw, true);
                            if (!empty($d) && is_array($d)) {
                                $slug = $d['slug'] ?? substr($f, 0, -5);
                                $ins_loc->execute([
                                    $slug,
                                    $d['city'] ?? ucfirst($c),
                                    $d['state'] ?? 'Madhya Pradesh',
                                    $d['country'] ?? 'India',
                                    !empty($d['isHub']) ? 1 : 0,
                                    $d['schemaType'] ?? 'ProfessionalService',
                                    $d['h1'] ?? ucwords(str_replace('-', ' ', $slug)),
                                    $d['badge'] ?? strtoupper($c) . ' AGENCY HUB',
                                    $d['heroDirectAnswer'] ?? '',
                                    $d['heroSubtitle'] ?? '',
                                    $d['heroMotif'] ?? 'combined',
                                    $d['lastUpdated'] ?? date('F Y'),
                                    $d['primaryKeyword'] ?? '',
                                    $d['metaTitle'] ?? '',
                                    $d['metaDescription'] ?? '',
                                    json_encode($d['relatedSlugs'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                                    json_encode($d['recentInsightsTags'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                                    json_encode($d['cta'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                                    json_encode($d['author'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                                    json_encode($d['sections'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                                    json_encode($d['faqs'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}

// =========================================================================
// HIGH-LEVEL DATABASE CRUD FUNCTIONS (Pages, Blogs, Settings, Leads, Auth)
// =========================================================================

/**
 * Get Site Setting Section (e.g. brand, hero, pricing, contact, seo, footer)
 */
function db_get_setting($section_key, $default = []) {
    try {
        $pdo = get_db();
        $stmt = $pdo->prepare("SELECT setting_value FROM site_settings WHERE setting_key = ?");
        $stmt->execute([$section_key]);
        $val = $stmt->fetchColumn();
        if ($val !== false) {
            $decoded = json_decode($val, true);
            if ($decoded !== null) {
                return $decoded;
            }
            return $val;
        }
    } catch (Exception $e) {
        // Return default on error
    }
    return $default;
}

/**
 * Save Site Setting Section
 */
function db_set_setting($section_key, $value) {
    $pdo = get_db();
    $val_str = is_array($value) ? json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$value;
    $stmt = $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value, updated_at) VALUES (?, ?, CURRENT_TIMESTAMP)
        ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value), updated_at = CURRENT_TIMESTAMP");
    try {
        return $stmt->execute([$section_key, $val_str]);
    } catch (Exception $e) {
        // SQLite fallback
        $del = $pdo->prepare("DELETE FROM site_settings WHERE setting_key = ?");
        $del->execute([$section_key]);
        $ins = $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value, updated_at) VALUES (?, ?, CURRENT_TIMESTAMP)");
        return $ins->execute([$section_key, $val_str]);
    }
}

/**
 * Get Page Config
 */
function db_get_page_config($page_key) {
    $pdo = get_db();
    $stmt = $pdo->prepare("SELECT * FROM pages WHERE page_key = ?");
    $stmt->execute([$page_key]);
    $row = $stmt->fetch();
    if ($row) {
        if (!empty($row['faqs'])) {
            $dec = json_decode($row['faqs'], true);
            $row['faqs'] = is_array($dec) ? $dec : [];
        } else {
            $row['faqs'] = [];
        }
        if (!empty($row['custom_data'])) {
            $dec = json_decode($row['custom_data'], true);
            if (is_array($dec)) {
                $row = array_merge($dec, $row);
            }
        }
        return $row;
    }
    return null;
}

/**
 * Get All Pages
 */
function db_get_all_pages() {
    $pdo = get_db();
    $stmt = $pdo->query("SELECT * FROM pages ORDER BY id ASC");
    $rows = $stmt->fetchAll();
    $pages = [];
    foreach ($rows as $row) {
        if (!empty($row['faqs'])) {
            $dec = json_decode($row['faqs'], true);
            $row['faqs'] = is_array($dec) ? $dec : [];
        } else {
            $row['faqs'] = [];
        }
        $pages[$row['page_key']] = $row;
    }
    return $pages;
}

/**
 * Save Page Config
 */
function db_save_page($page_key, array $data) {
    $pdo = get_db();
    $existing = db_get_page_config($page_key);

    $title = $data['title'] ?? ($existing['title'] ?? ucwords(str_replace(['services_', 'industries_', '_', '-'], ' ', $page_key)));
    $url = $data['url'] ?? ($existing['url'] ?? '');
    $status = $data['status'] ?? ($existing['status'] ?? 'published');
    $badge = $data['badge'] ?? ($existing['badge'] ?? '');
    $hero_title = $data['hero_title'] ?? ($existing['hero_title'] ?? $title);
    $hero_highlight = $data['hero_highlight'] ?? ($existing['hero_highlight'] ?? '');
    $hero_subheading = $data['hero_subheading'] ?? ($existing['hero_subheading'] ?? '');
    $meta_title = $data['meta_title'] ?? ($existing['meta_title'] ?? ($title . ' | Digital4Local'));
    $meta_description = $data['meta_description'] ?? ($existing['meta_description'] ?? '');
    $focus_keyword = $data['focus_keyword'] ?? ($existing['focus_keyword'] ?? $title);
    $featured_image = $data['featured_image'] ?? ($existing['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png');
    $content_html = $data['content_html'] ?? ($existing['content_html'] ?? '');
    
    $faqs = $data['faqs'] ?? ($existing['faqs'] ?? []);
    $faqs_json = is_array($faqs) ? json_encode($faqs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$faqs;
    
    $ptype = (strpos($page_key, 'custom_') === 0) ? 'custom' : ((strpos($page_key, 'services_') === 0) ? 'service' : ((strpos($page_key, 'industries_') === 0) ? 'industry' : 'standard'));

    if ($existing) {
        $stmt = $pdo->prepare("UPDATE pages SET title = ?, url = ?, status = ?, badge = ?, hero_title = ?, hero_highlight = ?, hero_subheading = ?, meta_title = ?, meta_description = ?, focus_keyword = ?, featured_image = ?, content_html = ?, faqs = ?, updated_at = CURRENT_TIMESTAMP WHERE page_key = ?");
        return $stmt->execute([$title, $url, $status, $badge, $hero_title, $hero_highlight, $hero_subheading, $meta_title, $meta_description, $focus_keyword, $featured_image, $content_html, $faqs_json, $page_key]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO pages (page_key, page_type, title, url, status, badge, hero_title, hero_highlight, hero_subheading, meta_title, meta_description, focus_keyword, featured_image, content_html, faqs, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        return $stmt->execute([$page_key, $ptype, $title, $url, $status, $badge, $hero_title, $hero_highlight, $hero_subheading, $meta_title, $meta_description, $focus_keyword, $featured_image, $content_html, $faqs_json]);
    }
}

/**
 * Delete Custom Page
 */
function db_delete_page($page_key) {
    $pdo = get_db();
    $stmt = $pdo->prepare("DELETE FROM pages WHERE page_key = ?");
    return $stmt->execute([$page_key]);
}

/**
 * Get All Blog Posts
 */
function db_get_all_blogs($only_published = false) {
    $pdo = get_db();
    $sql = "SELECT * FROM blog_posts";
    if ($only_published) {
        $sql .= " WHERE status = 'published'";
    }
    $sql .= " ORDER BY date DESC, id DESC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
    
    $posts = [];
    foreach ($rows as $row) {
        if (!empty($row['faqs'])) {
            $dec = json_decode($row['faqs'], true);
            $row['faqs'] = is_array($dec) ? $dec : [];
        } else {
            $row['faqs'] = [];
        }
        if (!empty($row['highlights'])) {
            $dec = json_decode($row['highlights'], true);
            $row['highlights'] = is_array($dec) ? $dec : explode("\n", (string)$row['highlights']);
        } else {
            $row['highlights'] = [];
        }
        $posts[] = $row;
    }
    return $posts;
}

/**
 * Get Single Blog Post by Slug
 */
function db_get_blog_by_slug($slug) {
    $pdo = get_db();
    $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE slug = ?");
    $stmt->execute([$slug]);
    $row = $stmt->fetch();
    if ($row) {
        if (!empty($row['faqs'])) {
            $dec = json_decode($row['faqs'], true);
            $row['faqs'] = is_array($dec) ? $dec : [];
        } else {
            $row['faqs'] = [];
        }
        if (!empty($row['highlights'])) {
            $dec = json_decode($row['highlights'], true);
            $row['highlights'] = is_array($dec) ? $dec : explode("\n", (string)$row['highlights']);
        } else {
            $row['highlights'] = [];
        }
        return $row;
    }
    return null;
}

/**
 * Save / Update Blog Post
 */
function db_save_blog(array $data, $original_slug = null) {
    $pdo = get_db();
    $target_slug = $data['slug'] ?? '';
    if (empty($target_slug)) {
        $target_slug = 'article-' . time();
    }
    $lookup_slug = !empty($original_slug) ? $original_slug : $target_slug;
    $existing = db_get_blog_by_slug($lookup_slug);

    $title = $data['title'] ?? ($existing['title'] ?? ucwords(str_replace('-', ' ', $target_slug)));
    $category = $data['category'] ?? ($existing['category'] ?? 'Local SEO');
    $status = $data['status'] ?? ($existing['status'] ?? 'published');
    $author = $data['author'] ?? ($existing['author'] ?? 'Abhishek Raikwar');
    $author_title = $data['author_title'] ?? ($existing['author_title'] ?? 'Founder, Digital4Local');
    $date = !empty($data['date']) ? $data['date'] : ($existing['date'] ?? date('Y-m-d'));
    $read_time = $data['read_time'] ?? ($existing['read_time'] ?? '6 Min Read');
    $featured_image = $data['featured_image'] ?? ($existing['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png');
    $excerpt = $data['excerpt'] ?? ($existing['excerpt'] ?? '');
    $content_html = $data['content_html'] ?? ($existing['content_html'] ?? '');
    $focus_keyword = $data['focus_keyword'] ?? ($existing['focus_keyword'] ?? $title);
    $meta_title = $data['meta_title'] ?? ($existing['meta_title'] ?? ($title . ' | Digital4Local Blog'));
    $meta_description = $data['meta_description'] ?? ($existing['meta_description'] ?? $excerpt);

    // Format highlights
    $highlights = $data['highlights'] ?? ($existing['highlights'] ?? []);
    if (isset($data['highlights_text'])) {
        $h_lines = array_map('trim', explode("\n", $data['highlights_text']));
        $highlights = array_values(array_filter($h_lines, function($l) { return !empty($l); }));
    }
    $highlights_json = is_array($highlights) ? json_encode($highlights, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$highlights;

    // Format FAQs
    $faqs = $data['faqs'] ?? ($existing['faqs'] ?? []);
    if (is_string($faqs)) {
        $dec = json_decode($faqs, true);
        if (is_array($dec)) $faqs = $dec;
    }
    if (is_array($faqs)) {
        $faqs = array_values(array_filter($faqs, function($f) {
            return (!empty(trim($f['q'] ?? '')) || !empty(trim($f['a'] ?? '')));
        }));
    }
    $faqs_json = json_encode($faqs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    if ($existing) {
        $stmt = $pdo->prepare("UPDATE blog_posts SET slug = ?, title = ?, category = ?, status = ?, author = ?, author_title = ?, date = ?, read_time = ?, featured_image = ?, excerpt = ?, content_html = ?, highlights = ?, faqs = ?, focus_keyword = ?, meta_title = ?, meta_description = ?, updated_at = CURRENT_TIMESTAMP WHERE slug = ?");
        return $stmt->execute([$target_slug, $title, $category, $status, $author, $author_title, $date, $read_time, $featured_image, $excerpt, $content_html, $highlights_json, $faqs_json, $focus_keyword, $meta_title, $meta_description, $lookup_slug]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO blog_posts (slug, title, category, status, author, author_title, date, read_time, featured_image, excerpt, content_html, highlights, faqs, focus_keyword, meta_title, meta_description, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        return $stmt->execute([$target_slug, $title, $category, $status, $author, $author_title, $date, $read_time, $featured_image, $excerpt, $content_html, $highlights_json, $faqs_json, $focus_keyword, $meta_title, $meta_description]);
    }
}

/**
 * Delete Blog Post
 */
function db_delete_blog($slug) {
    $pdo = get_db();
    $stmt = $pdo->prepare("DELETE FROM blog_posts WHERE slug = ?");
    return $stmt->execute([$slug]);
}

/**
 * Save Incoming Lead
 */
function db_save_lead(array $lead) {
    $pdo = get_db();
    $stmt = $pdo->prepare("INSERT INTO leads (lead_id, name, email, phone, company, website, industry, source, message, ip_address, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([
        $lead['id'] ?? ('LEAD-' . date('Ymd-His') . '-' . bin2hex(random_bytes(3))),
        $lead['name'] ?? '',
        $lead['email'] ?? '',
        $lead['phone'] ?? '',
        $lead['company'] ?? '',
        $lead['website'] ?? '',
        $lead['industry'] ?? 'General',
        $lead['source'] ?? 'Lead Form',
        $lead['message'] ?? '',
        $lead['ip_address'] ?? '127.0.0.1',
        $lead['status'] ?? 'New',
        $lead['date'] ?? date('Y-m-d H:i:s')
    ]);
}

/**
 * Get All Leads
 */
function db_get_leads($limit = 500) {
    $pdo = get_db();
    $stmt = $pdo->prepare("SELECT * FROM leads ORDER BY id DESC LIMIT ?");
    $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Authenticate Admin User by Username or Email
 */
function db_get_admin_by_identifier($identifier) {
    $pdo = get_db();
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ? OR email = ?");
    $stmt->execute([$identifier, $identifier]);
    return $stmt->fetch();
}

/**
 * Update Admin Password
 */
function db_update_admin_password($user_id, $new_password_hash) {
    $pdo = get_db();
    $stmt = $pdo->prepare("UPDATE admins SET password_hash = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ? OR admin_id = ? OR username = ?");
    return $stmt->execute([$new_password_hash, $user_id, $user_id, $user_id]);
}

/**
 * Check Login Brute Force Lockout
 */
function db_check_login_bruteforce($ip, $identifier) {
    $pdo = get_db();
    $key = md5(strtolower(trim($identifier)) . '_' . $ip);
    $stmt = $pdo->prepare("SELECT * FROM security_lockouts WHERE lockout_key = ?");
    $stmt->execute([$key]);
    $rec = $stmt->fetch();

    if ($rec && isset($rec['attempts'], $rec['last_attempt_time'])) {
        $window = 15 * 60; // 15 mins
        $elapsed = time() - (int)$rec['last_attempt_time'];
        if ($elapsed < $window && (int)$rec['attempts'] >= 5) {
            return [
                'allowed' => false,
                'remaining_seconds' => $window - $elapsed,
                'attempts' => (int)$rec['attempts']
            ];
        }
    }
    return ['allowed' => true, 'remaining_seconds' => 0];
}

/**
 * Record Failed Login Attempt
 */
function db_record_failed_login($ip, $identifier) {
    $pdo = get_db();
    $key = md5(strtolower(trim($identifier)) . '_' . $ip);
    $now = time();

    $stmt = $pdo->prepare("SELECT attempts FROM security_lockouts WHERE lockout_key = ?");
    $stmt->execute([$key]);
    $existing = $stmt->fetch();

    if ($existing) {
        $attempts = (int)$existing['attempts'] + 1;
        $up = $pdo->prepare("UPDATE security_lockouts SET attempts = ?, last_attempt_time = ?, updated_at = CURRENT_TIMESTAMP WHERE lockout_key = ?");
        $up->execute([$attempts, $now, $key]);
    } else {
        $ins = $pdo->prepare("INSERT INTO security_lockouts (lockout_key, ip_address, identifier, attempts, last_attempt_time, first_attempt_time, created_at, updated_at) VALUES (?, ?, ?, 1, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $ins->execute([$key, $ip, substr($identifier, 0, 100), $now, $now]);
    }
}

/**
 * Clear Login Lockout
 */
function db_clear_login_lockout($ip, $identifier) {
    $pdo = get_db();
    $key = md5(strtolower(trim($identifier)) . '_' . $ip);
    $stmt = $pdo->prepare("DELETE FROM security_lockouts WHERE lockout_key = ?");
    $stmt->execute([$key]);
}

/**
 * Check Lead Submission Rate Limit
 */
function db_check_lead_rate_limit($ip, $max_submissions = 5, $window_seconds = 600) {
    $pdo = get_db();
    $key = 'lead_' . md5($ip);
    $now = time();

    $stmt = $pdo->prepare("SELECT * FROM security_lockouts WHERE lockout_key = ?");
    $stmt->execute([$key]);
    $rec = $stmt->fetch();

    if (!$rec || ($now - (int)$rec['first_attempt_time'] > $window_seconds)) {
        $del = $pdo->prepare("DELETE FROM security_lockouts WHERE lockout_key = ?");
        $del->execute([$key]);
        $ins = $pdo->prepare("INSERT INTO security_lockouts (lockout_key, ip_address, attempts, first_attempt_time, last_attempt_time, created_at, updated_at) VALUES (?, ?, 1, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $ins->execute([$key, $ip, $now, $now]);
        return true;
    }

    $count = (int)$rec['attempts'] + 1;
    if ($count > $max_submissions) {
        return false;
    }

    $up = $pdo->prepare("UPDATE security_lockouts SET attempts = ?, last_attempt_time = ?, updated_at = CURRENT_TIMESTAMP WHERE lockout_key = ?");
    $up->execute([$count, $now, $key]);
    return true;
}

// =========================================================================
// LOCATION CLUSTER DATABASE CRUD ENGINE
// =========================================================================

/**
 * Get Location Page from Database
 */
function db_get_location_page($slug, $city = 'bhopal') {
    try {
        $pdo = get_db();
        $clean_slug = str_replace('location_', '', $slug);
        $stmt = $pdo->prepare("SELECT * FROM location_pages WHERE slug = ? OR slug = ?");
        $stmt->execute([$clean_slug, $slug]);
        $row = $stmt->fetch();
        if ($row) {
            $data = [
                'slug' => $row['slug'],
                'city' => $row['city'],
                'state' => $row['state'],
                'country' => $row['country'],
                'isHub' => !empty($row['is_hub']),
                'schemaType' => $row['schema_type'] ?? 'ProfessionalService',
                'h1' => $row['h1'],
                'badge' => $row['badge'],
                'heroDirectAnswer' => $row['hero_direct_answer'],
                'heroSubtitle' => $row['hero_subtitle'],
                'heroMotif' => $row['hero_motif'],
                'lastUpdated' => $row['last_updated'],
                'primaryKeyword' => $row['primary_keyword'],
                'metaTitle' => $row['meta_title'],
                'metaDescription' => $row['meta_description'],
                'relatedSlugs' => json_decode($row['related_slugs'] ?? '[]', true) ?: [],
                'recentInsightsTags' => json_decode($row['recent_insights_tags'] ?? '[]', true) ?: [],
                'cta' => json_decode($row['cta'] ?? '{}', true) ?: [],
                'author' => json_decode($row['author'] ?? '{}', true) ?: [],
                'sections' => json_decode($row['sections'] ?? '[]', true) ?: [],
                'faqs' => json_decode($row['faqs'] ?? '[]', true) ?: []
            ];
            return $data;
        }
    } catch (Exception $e) {
        // Fallback
    }
    return null;
}

/**
 * Get All Location Pages from Database
 */
function db_get_all_location_pages() {
    $pages = [];
    try {
        $pdo = get_db();
        $stmt = $pdo->query("SELECT * FROM location_pages ORDER BY is_hub DESC, id ASC");
        $rows = $stmt->fetchAll();
        foreach ($rows as $row) {
            $key = 'location_' . $row['slug'];
            $pages[$key] = [
                'key' => $key,
                'slug' => $row['slug'],
                'city' => strtolower($row['city'] ?? 'bhopal'),
                'title' => $row['h1'] ?? ucwords(str_replace('-', ' ', $row['slug'])),
                'badge' => $row['badge'] ?? (strtoupper($row['city'] ?? 'BHOPAL') . ' HUB'),
                'url' => $row['slug'] . '/',
                'is_hub' => !empty($row['is_hub']),
                'type' => 'Location Cluster (' . ucfirst($row['city'] ?? 'Bhopal') . ')'
            ];
        }
    } catch (Exception $e) {
        // Fallback
    }
    return $pages;
}

/**
 * Save / Update Location Page in Database
 */
function db_save_location_page($slug, $city, array $data) {
    try {
        $pdo = get_db();
        $clean_slug = str_replace('location_', '', $slug);
        $existing = db_get_location_page($clean_slug, $city);

        $loc_city = $data['city'] ?? ($existing['city'] ?? ucfirst($city));
        $loc_state = $data['state'] ?? ($existing['state'] ?? 'Madhya Pradesh');
        $loc_country = $data['country'] ?? ($existing['country'] ?? 'India');
        $is_hub = !empty($data['isHub']) ? 1 : (!empty($existing['isHub']) ? 1 : 0);
        $schema_type = $data['schemaType'] ?? ($existing['schemaType'] ?? 'ProfessionalService');
        $h1 = $data['h1'] ?? ($existing['h1'] ?? ucwords(str_replace('-', ' ', $clean_slug)));
        $badge = $data['badge'] ?? ($existing['badge'] ?? strtoupper($city) . ' AGENCY HUB');
        $hero_direct_answer = $data['heroDirectAnswer'] ?? ($existing['heroDirectAnswer'] ?? '');
        $hero_subtitle = $data['heroSubtitle'] ?? ($existing['heroSubtitle'] ?? '');
        $hero_motif = $data['heroMotif'] ?? ($existing['heroMotif'] ?? 'combined');
        $last_updated = $data['lastUpdated'] ?? ($existing['lastUpdated'] ?? date('F Y'));
        $primary_keyword = $data['primaryKeyword'] ?? ($existing['primaryKeyword'] ?? $h1);
        $meta_title = $data['metaTitle'] ?? ($existing['metaTitle'] ?? ($h1 . ' | Digital4Local'));
        $meta_description = $data['metaDescription'] ?? ($existing['metaDescription'] ?? '');

        $related_slugs = isset($data['relatedSlugs']) ? (is_array($data['relatedSlugs']) ? json_encode($data['relatedSlugs'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$data['relatedSlugs']) : json_encode($existing['relatedSlugs'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $recent_insights_tags = isset($data['recentInsightsTags']) ? (is_array($data['recentInsightsTags']) ? json_encode($data['recentInsightsTags'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$data['recentInsightsTags']) : json_encode($existing['recentInsightsTags'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $cta = isset($data['cta']) ? (is_array($data['cta']) ? json_encode($data['cta'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$data['cta']) : json_encode($existing['cta'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $author = isset($data['author']) ? (is_array($data['author']) ? json_encode($data['author'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$data['author']) : json_encode($existing['author'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $sections = isset($data['sections']) ? (is_array($data['sections']) ? json_encode($data['sections'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$data['sections']) : json_encode($existing['sections'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $faqs = isset($data['faqs']) ? (is_array($data['faqs']) ? json_encode($data['faqs'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string)$data['faqs']) : json_encode($existing['faqs'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        if ($existing) {
            $stmt = $pdo->prepare("UPDATE location_pages SET city = ?, state = ?, country = ?, is_hub = ?, schema_type = ?, h1 = ?, badge = ?, hero_direct_answer = ?, hero_subtitle = ?, hero_motif = ?, last_updated = ?, primary_keyword = ?, meta_title = ?, meta_description = ?, related_slugs = ?, recent_insights_tags = ?, cta = ?, author = ?, sections = ?, faqs = ?, updated_at = CURRENT_TIMESTAMP WHERE slug = ?");
            return $stmt->execute([$loc_city, $loc_state, $loc_country, $is_hub, $schema_type, $h1, $badge, $hero_direct_answer, $hero_subtitle, $hero_motif, $last_updated, $primary_keyword, $meta_title, $meta_description, $related_slugs, $recent_insights_tags, $cta, $author, $sections, $faqs, $clean_slug]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO location_pages (slug, city, state, country, is_hub, schema_type, h1, badge, hero_direct_answer, hero_subtitle, hero_motif, last_updated, primary_keyword, meta_title, meta_description, related_slugs, recent_insights_tags, cta, author, sections, faqs, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
            return $stmt->execute([$clean_slug, $loc_city, $loc_state, $loc_country, $is_hub, $schema_type, $h1, $badge, $hero_direct_answer, $hero_subtitle, $hero_motif, $last_updated, $primary_keyword, $meta_title, $meta_description, $related_slugs, $recent_insights_tags, $cta, $author, $sections, $faqs]);
        }
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Delete Location Page from Database
 */
function db_delete_location_page($slug, $city = 'bhopal') {
    try {
        $pdo = get_db();
        $clean_slug = str_replace('location_', '', $slug);
        $stmt = $pdo->prepare("DELETE FROM location_pages WHERE slug = ?");
        return $stmt->execute([$clean_slug]);
    } catch (Exception $e) {
        return false;
    }
}

