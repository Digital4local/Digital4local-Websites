import os
from PIL import Image, ImageChops

clients_dir = os.path.join(os.path.dirname(__file__), '..', 'assets', 'images', 'clients')

def trim(im, border_color=None, tolerance=25):
    if im.mode != 'RGBA':
        im = im.convert('RGBA')
    
    # Get corner pixel color if not provided
    if border_color is None:
        border_color = im.getpixel((0, 0))
    
    bg = Image.new(im.mode, im.size, border_color)
    diff = ImageChops.difference(im, bg)
    
    # Also handle transparent pixels
    # Find bounding box
    bbox = None
    # Check non-background pixels
    width, height = im.size
    min_x, min_y, max_x, max_y = width, height, 0, 0
    has_content = False
    
    pixels = im.load()
    br, bg_g, bb, ba = border_color
    
    for y in range(height):
        for x in range(width):
            r, g, b, a = pixels[x, y]
            is_bg = False
            if a < 30:
                is_bg = True
            elif ba > 200 and abs(r - br) < tolerance and abs(g - bg_g) < tolerance and abs(b - bb) < tolerance:
                is_bg = True
            elif r > 240 and g > 240 and b > 240 and abs(r - g) < 10 and abs(r - b) < 10:
                # White/near-white
                is_bg = True
            
            if not is_bg:
                has_content = True
                if x < min_x: min_x = x
                if x > max_x: max_x = x
                if y < min_y: min_y = y
                if y > max_y: max_y = y
                
    if has_content and max_x >= min_x and max_y >= min_y:
        pad = 8
        min_x = max(0, min_x - pad)
        min_y = max(0, min_y - pad)
        max_x = min(width - 1, max_x + pad)
        max_y = min(height - 1, max_y + pad)
        return (min_x, min_y, max_x + 1, max_y + 1)
    return None

def process_all():
    files = os.listdir(clients_dir)
    for fname in files:
        fpath = os.path.join(clients_dir, fname)
        if not os.path.isfile(fpath):
            continue
        try:
            im = Image.open(fpath)
            orig_size = im.size
            
            # Special handling for maxira_solar (cream background)
            if 'maxira' in fname.lower():
                # Corner color is cream
                bbox = trim(im, border_color=im.getpixel((0, 0)), tolerance=20)
            elif 'sunmoon' in fname.lower():
                # Dark background
                # Let's find content on black
                width, height = im.size
                pixels = im.convert('RGBA').load()
                min_x, min_y, max_x, max_y = width, height, 0, 0
                has_content = False
                for y in range(height):
                    for x in range(width):
                        r, g, b, a = pixels[x, y]
                        # Look for bright pixels (orange sun / white text)
                        if r > 50 or g > 50 or b > 50:
                            has_content = True
                            if x < min_x: min_x = x
                            if x > max_x: max_x = x
                            if y < min_y: min_y = y
                            if y > max_y: max_y = y
                if has_content:
                    pad = 12
                    min_x = max(0, min_x - pad)
                    min_y = max(0, min_y - pad)
                    max_x = min(width - 1, max_x + pad)
                    max_y = min(height - 1, max_y + pad)
                    bbox = (min_x, min_y, max_x + 1, max_y + 1)
                else:
                    bbox = None
            else:
                bbox = trim(im)
            
            if bbox:
                cropped = im.crop(bbox)
                print(f"Cropped {fname}: {orig_size} -> {cropped.size} (bbox: {bbox})")
                
                # If PNG, preserve transparency
                if fname.lower().endswith('.png'):
                    cropped.save(fpath, 'PNG', optimize=True)
                else:
                    # Save as RGB JPEG
                    if cropped.mode != 'RGB':
                        # Create white background
                        bg = Image.new('RGB', cropped.size, (255, 255, 255))
                        if cropped.mode == 'RGBA':
                            bg.paste(cropped, mask=cropped.split()[3])
                        else:
                            bg.paste(cropped)
                        bg.save(fpath, 'JPEG', quality=95)
                    else:
                        cropped.save(fpath, 'JPEG', quality=95)
            else:
                print(f"No crop for {fname}")
        except Exception as e:
            print(f"Error processing {fname}: {e}")

if __name__ == '__main__':
    process_all()
