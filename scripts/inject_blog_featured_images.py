import os
import glob

base_dir = os.path.join(os.path.dirname(__file__), '..')
blog_dir = os.path.join(base_dir, 'blog')

files = glob.glob(os.path.join(blog_dir, '*.php'))

for fpath in files:
    fname = os.path.basename(fpath)
    if fname == 'index.php':
        continue
    
    with open(fpath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    target = '<article class="lg:col-span-3 space-y-6 text-base text-[#475569] leading-relaxed article-body-content">'
    
    img_block = """
        <?php if (!empty($post['featured_image'])): ?>
        <div class="w-full rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-sm mb-6">
          <img src="../<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-auto object-cover max-h-[460px]" />
        </div>
        <?php endif; ?>"""
    
    if target in content and 'max-h-[460px]' not in content:
        new_content = content.replace(target, target + img_block)
        with open(fpath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {fname} with featured image banner!")
    else:
        print(f"Skipped {fname}")

print("All dedicated blog files updated successfully!")
