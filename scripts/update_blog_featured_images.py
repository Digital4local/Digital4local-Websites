import os
import shutil
import json

base_dir = os.path.join(os.path.dirname(__file__), '..')
blog_assets_dir = os.path.join(base_dir, 'assets', 'images', 'blog')
os.makedirs(blog_assets_dir, exist_ok=True)

artifact_dir = r'C:\Users\ASUS\.gemini\antigravity-ide\brain\5091e1b8-b173-4f9a-aa13-94d3d1d49b85'

mapping = {
    'top-10-digital-marketing-companies-india': 'blog_1_top_digital_marketing_1788347680877.jpg',
    'top-marketing-companies-india': 'blog_2_top_marketing_companies_1788347702988.jpg',
    'best-digital-marketing-company-india': 'blog_3_best_digital_marketing_1788347741978.jpg',
    'smm-full-form-what-does-smm-mean': 'blog_4_smm_full_form_1788347833628.jpg',
    'types-of-seo-explained': 'blog_5_types_of_seo_1788347858030.jpg',
    'seo-vs-sem-difference': 'blog_6_seo_vs_sem_clean_1788347904736.jpg'
}

for slug, src_name in mapping.items():
    src_path = os.path.join(artifact_dir, src_name)
    dst_path = os.path.join(blog_assets_dir, f'{slug}.jpg')
    if os.path.exists(src_path):
        shutil.copyfile(src_path, dst_path)
        print(f"Copied {src_name} -> assets/images/blog/{slug}.jpg")
    else:
        print(f"ERROR: {src_path} not found!")

# Update site_settings.json
settings_path = os.path.join(base_dir, 'config', 'site_settings.json')
with open(settings_path, 'r', encoding='utf-8') as f:
    settings = json.load(f)

for post in settings.get('blog_posts', []):
    slug = post.get('slug')
    if slug in mapping:
        img_url = f'assets/images/blog/{slug}.jpg'
        post['featured_image'] = img_url
        print(f"Set {slug} -> {img_url}")

with open(settings_path, 'w', encoding='utf-8') as f:
    json.dump(settings, f, indent=4)

print("Updated site_settings.json successfully!")
