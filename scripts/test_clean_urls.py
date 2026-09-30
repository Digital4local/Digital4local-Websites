import urllib.request
import urllib.error

class NoRedirectHandler(urllib.request.HTTPRedirectHandler):
    def http_error_301(self, req, fp, code, msg, headers):
        return fp
    def http_error_302(self, req, fp, code, msg, headers):
        return fp

opener = urllib.request.build_opener(NoRedirectHandler)

print("--- Test 1: Direct access to /blog-single.php?slug=seo-vs-sem-difference ---")
req = urllib.request.Request('http://127.0.0.1:8080/blog-single.php?slug=seo-vs-sem-difference')
res = opener.open(req)
print("Status:", getattr(res, 'status', getattr(res, 'code', None)))
print("Location Header:", res.headers.get('Location'))

print("\n--- Test 2: Direct access to /blog-single.php?slug=local-seo-for-solar-installers ---")
req = urllib.request.Request('http://127.0.0.1:8080/blog-single.php?slug=local-seo-for-solar-installers')
res = opener.open(req)
print("Status:", getattr(res, 'status', getattr(res, 'code', None)))
print("Location Header:", res.headers.get('Location'))

print("\n--- Test 3: Clean URL access to /blog/seo-vs-sem-difference ---")
with urllib.request.urlopen('http://127.0.0.1:8080/blog/seo-vs-sem-difference') as res:
    print("Status:", res.status)
    body = res.read().decode('utf-8')
    print("Contains SEO vs SEM:", 'SEO vs SEM' in body)
    canonical_lines = [line.strip() for line in body.splitlines() if 'canonical' in line]
    print("Canonical URL line:", canonical_lines)

print("\n--- Test 4: Blog listing page /blog.php ---")
with urllib.request.urlopen('http://127.0.0.1:8080/blog.php') as res:
    print("Status:", res.status)
    body = res.read().decode('utf-8')
    print("Contains clean blog link:", 'href="blog/' in body)
    print("No blog-single.php in links:", 'blog-single.php' not in body)

print("\n--- Test 5: Sitemap sitemap.php ---")
with urllib.request.urlopen('http://127.0.0.1:8080/sitemap.php') as res:
    print("Status:", res.status)
    body = res.read().decode('utf-8')
    print("Contains clean sitemap URL:", '<loc>https://digital4local.com/blog/' in body)
    print("No ?slug= in sitemap:", '?slug=' not in body)
